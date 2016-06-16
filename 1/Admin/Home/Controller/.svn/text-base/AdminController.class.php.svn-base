<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\AdminModel;

class AdminController extends CommonController {
    protected $admin;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->admin = new AdminModel();
    }

    /**-----------------------------------------------------------------------------------
     * 管理员-个人资料显示页
     * @return [type] [description]
     */
    public function bloger_message_page(){
    	$this->display('Index/Bloger/bloger_message');
    }
}