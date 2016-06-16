<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\ArticleModel;
use Home\Model\ColumnModel;
use Home\Model\ArticletypeModel;
class ArticleController extends Controller {
    protected $article;
    protected $column;
    protected $articletype;

    /**---------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->article = new ArticleModel();
        $this->column  = new ColumnModel();
        $this->articletype = new ArticletypeModel();
    }

    /**----------------------------------------------------------------------------------------
     * 查看指定文章详情
     * @param  [int] $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_detail(){
    	$arid = I('get.arid');
    	
        //文章浏览次数
        if(!isset($_COOKIE['click_'.$arid])){
            //设置cookie，次数加一
            cookie('click_'.$arid,$arid,86400);
            $this->article->article_PV_add($arid);
        }
        

    	$data_article = $this->article->get_article('one', $arid);   //文章详细信息
    	$data_comment = $this->article->get_article_comment($arid);  //文章评论
        $header       = $this->column->get_column(1);                //头部栏目
        $recent_data  = $this->article->get_sider_article();         //侧边栏-文章
        $tags_data    = $this->articletype->get_sider_type();        //侧边栏-标签
        $article_total= $this->article->article_total_count();       //已发表文章数

    	$data = array(
    		'article' => $data_article['article'],
    		'comment' => $data_comment,
            'header'  => $header['column'],
            'tags'    => $tags_data['tags'],
            'recent'  => $recent_data['recent'],
            'total'   => $article_total
    		);
    	$this->assign($data)->display('Index/detail');
    }

    /**----------------------------------------------------------------------------------------
     * 用户对文章发表评论
     * @param  [int] $[arid]     [文章arid]
     * @param  [int] $[username] [用户名]
     * @param  [int] $[email]    [邮箱]
     * @param  [int] $[content]  [内容]
     * @return [type] [1 成功， 0失败]
     */
    public function article_comment_add(){
        $params = $_POST;

        //文章评论数量
        $this->article->comment_count_add($params['arid']);

        $params['time']     = time();               //评论时间
        $params['head_pic'] = '/Public/Images/header/0.jpg';//评论者头像,默认头像
        $params['pcid']     = '0';                  //顶级评论
        $ret = $this->article->article_comment_add($params);

        if($ret != 0){
            $params['time'] = date("Y年 n月 j日 H:i",$params['time']);
            $params['cid']  = $ret['ret'];
            $this->ajaxReturn($params);
        }else{
            $this->ajaxReturn(0);
        }
    }

    /**----------------------------------------------------------------------------------------
     * 用户间文章回复评论
     * @param  [int] $[arid]     [文章arid]
     * @param  [int] $[username] [用户名]
     * @param  [int] $[email]    [邮箱]
     * @param  [int] $[content]  [内容]
     * @param  [int] $[pcid]     [父级评论pcid]
     * @return [type] [1 成功， 0失败]
     */
    public function article_comment_son_add(){
        $params = $_POST;

        //文章评论数量
        $this->article->comment_count_add($params['arid']);
        
        $params['time']     = time();               //评论时间
        $params['head_pic'] = '/Public/Images/header/0.jpg';//评论者头像,默认头像
        $ret = $this->article->article_comment_add($params);

        if($ret != 0){
            $params['time']   = date("Y年 n月 j日 H:i",$params['time']);
            $params['cid']    = $ret['ret'];
            $params['parent'] = $ret['parent'];

            $this->ajaxReturn($params);
        }else{
            $this->ajaxReturn(0);
        }
    }

    /**----------------------------------------------------------------------------------------
     * 点击加载更多文章
     * @param [int] $[文章分类aid]  [aid]
     * @param [int] $[条数起始位置] [last]
     * @param [int] $[条数数量]     [amount]
     * @return [type] [description]
     */
    public function click_get_more(){
        $aid    = I('get.aid');
        $last   = I('post.last');
        $amount = I('post.amount');

        if(empty($aid)){
            // 所有文章
            $data = $this->article->click_get_more($last,$amount);
            $article_data = $data['article'];
            $count = $data['count'];
        }else{
            //指定分类文章
            $article_data = $this->articletype->get_type_article($aid);

            $count        = count($article_data); 
            //截取相应数量
            $article_data = array_slice($article_data,$last,$amount);
        }
        
        // 显示格式替换
        foreach ($article_data as $key => $value) {
            foreach ($value as $k => $v) {
                if($k == 'title'){
                    $value[$k] = "<a href='".__MODULE__."/Article/article_detail?arid=".$value[arid]."'>".$v."</a>";
                }if($k == 'time'){
                    $value[$k] = date("Y年m月j日",$v);
                }else if($k == 'content'){
                    $value[$k] = mb_substr($v, 0, 125, 'utf-8')."......";
                }
            }
            $article_data[$key] = $value; 
        }

        $data = array(
            'count' => $count,
            'data'  => $article_data
            );

        $this->ajaxReturn($data);
        
    }

    public function aa(){
        $article_total_count = $this->article->article_total_count();
    }
}