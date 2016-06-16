<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\ShareModel;

class ShareController extends CommonController{
    protected $share;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct()
    {
        parent::__construct();
        $this->share = new ShareModel();
    }

    /**-----------------------------------------------------------------------------------
     * 分享-资源列表-显示页
     * @return [type] [description]
     */
    public function share_list_page(){
        $share_data = $this->share->get_share('all');

        foreach ($share_data['share'] as $key => $value){
            foreach ($value as $k => $v){
                if($k == 'img'){
                    $value[$k] = C('QINIU_HOST').$v;
                }
            }
            $share_data['share'][$key] = $value;
        }

        $data = array(
            'share' => $share_data['share']
        );

        $this->assign($data)->display('Index/Share/share_list');
    }

    /**-----------------------------------------------------------------------------------
     * 分享-资源分类显示-显示页
     * @return [type] [description]
     */
    public function share_type_page(){
        $share_type_data = $this->share->get_share_type('all');

        foreach ($share_type_data as $key => $value){
            foreach ($value as $k => $v){
                if($k == 'img'){
                    $value[$k] = C('QINIU_HOST').$v;
                }
            }
            $share_type_data[$key] = $value;
        }

        $this->assign('type',$share_type_data)->display('Index/Share/share_type');
    }

    /**-----------------------------------------------------------------------------------
     * 分享-资源添加-显示页
     * @return [type] [description]
     */
    public function share_add_page(){
        $share_type_data = $this->share->get_share_type('all');

        $data = array(
            'type' => $share_type_data
        );

        $this->assign($data)->display('Index/Share/share_add');
    }

    /**-----------------------------------------------------------------------------------
     * 分享-资源分类编辑-显示页
     * @param [int] $[id]    [资源分类id]
     * @return [type] [description]
     */
    public function type_edit_page(){
        $id = I('get.id');
        $share_type_data = $this->share->get_share_type('one',$id);        //无限极分类

        $share_type_data['img'] = C('QINIU_HOST').$share_type_data['img']; //地址拼接

        $data = array(
            'type'      => $share_type_data
        );

        $this->assign($data)->display('Index/Share/share_type_edit');
    }

    /**-----------------------------------------------------------------------------------
     *分享-资源添加操作
     * @param [string] $[describe]    [资源描述]
     * @param [string] $[code]        [提取码]
     * @param [string] $[author]      [作者]
     * @param [string] $[time]        [发布时间]
     * @param [string] $[id]          [资源种类]
     * @return [type] [description]
     */
    public function share_add(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['time_stamp'])){
            $params['time_stamp'] = time();
        }else{
            $params['time_stamp'] = strtotime($params['time_stamp']);
        }

        if(empty($params['author'])){
            $params['author'] = C('DEFAULT_AUTHOR');
        }else if(empty($params['path'])){
            $params['path'] = '';
        }

        $ret = $this->share->share_add($params);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 资源列表-资源删除操作
     * @param [int] $[sid] [资源sid]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function share_del(){
        $sid = I('post.sid');
        $ret = $this->share->share_del($sid);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 资源-资源分类添加操作
     * @param [string] $[img]      [分类配图]
     * @param [string] $[name]     [分类名称]
     * @param [string] $[describe] [分类描述]
     * @return [type] [description]
     */
    public function share_type_add(){
        $params = $_POST;

        $this->share->share_type_add($params);

        $this->redirect('Home/Share/share_type_page');
    }

    /**-----------------------------------------------------------------------------------
     * 资源-资源分类删除操作
     * @param [int]    $[id]      [分类id]
     * @return [type] [description]
     */
    public function share_type_del(){
        $id  = I('post.id');
        $ret = $this->share->share_type_del($id);
        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
    * 分享-资源分类编辑操作
    * @param [string] $[img]      [分类配图]
    * @param [string] $[name]     [分类名称]
    * @param [string] $[describe] [分类描述]
    * @return [type] [description]
    */
    public function Share_type_edit(){
        $params = $_POST;
        $ret = $this->share->share_type_edit($params);

        $this->redirect('Home/Share/share_type_page');
    }
}