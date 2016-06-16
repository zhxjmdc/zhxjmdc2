<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\ColumnModel;
use Home\Model\ArticleModel;

class ColumnController extends CommonController {
    protected $column;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->column  = new ColumnModel();
    }

    /**-----------------------------------------------------------------------------------
     * 主页-栏目列表显示页
     * @return [type] [description]
     */
    public function column_list_page(){
        $column_data = $this->column->get_colunm('all');

        // 开启状态
        foreach ($column_data['column'] as $key => $value) {
            foreach ($value as $k => $v) {
                if($k == 'status'){
                    if($v == 1){
                        $value[$k] = '<span class="badge status-open">开启</span>';
                    }else{
                        $value[$k] = '<span class="badge">关闭</span>';
                    }
                }else if($k == 'type'){
                    if($v == 0){
                        $value[$k] = '普通';
                    }else if($v == 1){
                        $value[$k] = '头部';
                    }else if($v == 2){
                        $value[$k] = '页脚';
                    }
                }
            }
            $column_data['column'][$key] = $value;
        }

        $data = array(
            'column' => $column_data['column']
            );

        $this->assign($data)->display('Index/Home/column_list');
    }

    /**-----------------------------------------------------------------------------------
     * 主页-栏目添加显示页
     * @return [type] [description]
     */
    public function column_add_page(){
        $column_data = $this->column->get_colunm('all');

        $data = array(
            'column' => $column_data['column']
            );

        $this->assign($data)->display('Index/Home/column_add');
    }

    /**-----------------------------------------------------------------------------------
     * 主页-栏目添加操作
     * @param [string] $[name]          [栏目名称]
     * @param [string] $[href]          [栏目模板文件名]
     * @param [int]    $[status]        [栏目开启状态]
     * @param [int]    $[column_order]  [权重，默认50]
     * @return [type] [description]
     */
    public function column_add(){
    	$params = $_POST;
        $order  = $params['column_order'];

        //栏目权重默认50
    	if(empty($order) || !is_numeric($order)){
    		$params['column_order'] = 50;
    	}

    	$ret = $this->column->column_add($params);

        $this->redirect('Home/column/column_list_page');
    }

    /**-----------------------------------------------------------------------------------
     * 主页-栏目删除操作
     * @param [int] $[id] [栏目cid]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function column_del(){
        $cid = I('post.id');
        $ret = $this->column->column_del($cid);
        
        $this->ajaxReturn($ret);
    }

    /**---------------------------------------------------------------------------------------
     * 栏目排序
     * @param  [json] [data]  [栏目ID:cid,栏目顺序：column_order]
     * @return [int] [$res]   [1更新成功，0更新失败]
     */
    public function column_order(){
        $data = json_decode($_POST['data'],true);

        //获取需要批量更新的主键，数据
        $saveWhere['cid'] = array(); //需要更新的数据主键ID
        $saveData  = array();        //需要更新的数据数据
        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                if($k == 'cid'){
                    $saveWhere['cid'][$key] = $v;
                }else if($k == 'column_order'){
                    $saveData[$key]['column_order'] = $v;
                }
            }
        }

        $res = $this->column->column_order($saveWhere, $saveData, 'column');
        if($res == 1){
            $this->ajaxReturn($res);
        }else if($res == 0){
            $this->ajaxReturn($res);
        }
    }
    
    /**-----------------------------------------------------------------------------------
     * 主页-栏目状态操作
     * @param [int] $[id]     [栏目cid]
     * @param [int] $[status] [栏目开启状态]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function column_change_status(){
        $cid    = I('post.id');
        $status = I('post.status');
        
        $ret = $this->column->column_change_status($cid, $status);

        $data = array(
            'ret'     => $ret,
            'status' => (int)$status
            );
        $this->ajaxReturn($data);
    }

    /**-----------------------------------------------------------------------------------
     * 主页-栏目修改显示页
     * @param [int] $[cid] [栏目cid]
     * @return [type] [description]
     */
    public function column_edit_page(){
        $cid = I('get.cid');
        $column_data = $this->column->get_colunm('one',$cid);

        $data = array(
            'column' => $column_data['column']
            );

        $this->assign($data)->display('Index/Home/column_edit');
    }

    /**-----------------------------------------------------------------------------------
     * 主页-栏目添加操作
     * @param [string] $[name]          [栏目名称]
     * @param [string] $[href]          [栏目模板文件名]
     * @param [int]    $[status]        [栏目开启状态]
     * @param [int]    $[column_order]  [权重，默认50]
     * @return [type] [description]
     */
    public function column_edit(){
        $params = $_POST;
        $order  = $params['column_order'];

        //栏目权重默认50
        if(empty($order) || !is_numeric($order)){
            $params['column_order'] = 50;
        }

        $ret = $this->column->column_edit($params);

        $this->redirect('Home/column/column_list_page');
    }
}