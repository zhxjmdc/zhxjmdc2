<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
    /**---------------------------------------------------------------------------------------
     * 登陆session验证
     * @return [type] [description]
     */
    public function _initialize()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['pwd'])) {
            $this->redirect('Home/Login/index');
        }
    }
}