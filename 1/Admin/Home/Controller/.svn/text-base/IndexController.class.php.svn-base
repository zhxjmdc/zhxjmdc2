<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\ArticleModel;

class IndexController extends CommonController {
    protected $article;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->article     = new ArticleModel();
    }

    /**---------------------------------------------------------------------------------------
     * 登陆验证
     */
    public function index(){
        if(isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
            //后台主页
            $article_count = $this->article->article_total_count();
            $comment_count = $this->article->comment_total_count();
            $browse_count  = $this->article->browse_total_count();

            $data = array(
                'article_count' => $article_count,
                'comment_count' => $comment_count,
                'browse_count'  => $browse_count
            );

            $this->assign($data)->display('Index/index');

        }else{
            $this->redirect('Home/Login/index');
        }
    }

    /**---------------------------------------------------------------------------------------
     * 退出
     */
    public function login_out(){
        session(null);
        $this->redirect('Home/Login/index');
    }        
}