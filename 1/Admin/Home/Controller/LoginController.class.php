<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	/**-------------------------------------------------------------------------------------
	 * 后台登陆显示页
	 * @return [type] [description]
	 */
    public function index(){
        $this->display("Index/login");
    }


    /**-------------------------------------------------------------------------------------
     * 登录验证
     * @return [type] [description]
     */
    public function login() {
		if(!$_POST) {
			E("页面不存在");
		}

		$username = I('post.username');
    	$password = I('post.password');

        // 用户名与密码验证
	    $admin         = M('Admin');
		$map['admin']  = $username;
		$admin_data    = $admin->field('admin,pwd')->where($map)->find();

		if(!$admin_data || $admin_data['pwd'] != str_md5($password)) {
			$data = array(
				'title' => '用户名或密码错误',
				'toast' => '请重新尝试...'
			);

			$this->assign('error',$data)->display('Index/500');
		}else{
			//保存SESSION值
			session('[start]');
			session('username',$username);
			session('pwd',$password);

			//重定向到后台操作页面
			$this->redirect("Home/Index/index");
		}
	}
}