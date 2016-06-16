<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\JottingModel;

class JottingController extends CommonController{
    protected $jotting;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct()
    {
        parent::__construct();
        $this->jotting = new JottingModel();
    }

    /**---------------------------------------------------------------------------------------
     * 随笔列表-显示页
     */
    public function jotting_list_page(){
        $jotting_data = $this->jotting->get_jotting('all','','1');

        $data = array(
            'jotting' => $jotting_data['jotting']
        );

        $this->assign($data)->display('Index/Jotting/jotting_list');
    }

    /**---------------------------------------------------------------------------------------
     * 随笔添加-显示页
     */
    public function jotting_add_page(){
        $this->display('Index/Jotting/jotting_add');
    }

    /**---------------------------------------------------------------------------------------
     * 随笔草稿箱-显示页
     */
    public function jotting_drafts_page(){
        $jotting_data = $this->jotting->get_jotting('all','','0');

        $data = array(
            'jotting' => $jotting_data['jotting']
        );

        $this->assign($data)->display('Index/Jotting/jotting_drafts');
    }

    /**-----------------------------------------------------------------------------------
     * 随笔-随笔修改显示页
     * @return [type] [description]
     */
    public function jotting_edit_page(){
        $jid = I('get.jid');
        $jotting_data = $this->jotting->get_jotting('one', $jid);
        //配图地址拼接
        $jotting_data['jotting']['path'] = C('QINIU_HOST').$jotting_data['jotting']['path'];
        $data = array(
            'jotting'  => $jotting_data['jotting'],
        );

        $this->assign($data)->display('Index/Jotting/jotting_edit');
    }

    /**-----------------------------------------------------------------------------------
     * 随笔-随笔添加操作
     * @param [string] $[content]  [随笔内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[path]     [配图文件名]
     * @return [type] [description]
     */
    public function jotting_add(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['time'])){
            $params['time'] = time();
        }else{
            $params['time'] = strtotime($params['time']);
        }

        if(empty($params['author'])){
            $params['author'] = C('DEFAULT_AUTHOR');
        }else if(empty($params['path'])){
            $params['path'] = '';
        }

        $ret = $this->jotting->jotting_add($params);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 随笔-随笔添加并保存到草稿箱操作
     * @param [string] $[content]  [随笔内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @return [type] [description]
     */
    public function jotting_add_drafts(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['time'])){
            $params['time'] = time();
        }else{
            $params['time'] = strtotime($params['time']);
        }

        if(empty($params['author'])){
            $params['author'] = C('DEFAULT_AUTHOR');
        }
        //存为草稿箱
        $params['status'] = '0';

        $ret = $this->jotting->jotting_add($params);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 随笔-随笔列表-移至草稿箱操作
     * @param [int]    $[jid] [随笔jid]
     * @return [type] [description]
     */
    public function jotting_drafts(){
        $jid = I('get.jid');
        $ret = $this->jotting->jotting_drafts($jid);

        $this->redirect('Home/Jotting/jotting_drafts_page');
    }

    /**-----------------------------------------------------------------------------------
     * 随笔-随笔删除操作
     * @param [int]    $[jid] [随笔jid]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function jotting_del(){
        $jid = I('post.jid');
        $ret = $this->jotting->jotting_del($jid);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 随笔-随笔草稿箱-重新发布操作
     * @param [int]    $[jid] [随笔jid]
     * @return [type] [description]
     */
    public function jotting_publish(){
        $jid = I('get.jid');
        $ret = $this->jotting->jotting_publish($jid);

        $this->redirect('Home/Jotting/jotting_list_page');
    }

    /**-----------------------------------------------------------------------------------
     * 随笔-随笔修改操作
     * @param [int]    $[jid]     [随笔jid]
     * @param [string] $[content]  [文章内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[path]     [配图路径]
     * @return [type] [description]
     */
    public function jotting_edit(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['time'])){
            $params['time'] = time();
        }else{
            $params['time'] = strtotime($params['time']);
        }

        if(empty($params['path'])){
            unset($params['path']);
        }

        $ret = $this->jotting->jotting_edit($params);

        if($ret == 1){
            $url = U('Home/Jotting/jotting_edit_page',array('jid'=>$params['jid']));
            $this->ajaxReturn($url);
        }else{
            $this->ajaxReturn($ret);
        }
    }
}