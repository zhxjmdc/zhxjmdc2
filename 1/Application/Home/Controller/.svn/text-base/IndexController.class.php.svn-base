<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\ArticleModel;
use Home\Model\ColumnModel;
use Home\Model\ArticletypeModel;
use Home\Model\ShareModel;
use Home\Model\JottingModel;
class IndexController extends Controller {
    protected $article;
    protected $column;
    protected $articletype;
    protected $jotting;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->article     = new ArticleModel();
        $this->column      = new ColumnModel();
        $this->articletype = new ArticletypeModel();
        $this->jotting     = new JottingModel();
        $this->share       = new ShareModel();
    }

    /**---------------------------------------------------------------------------------------
     * 头部栏目-首页-显示页
     * @return [type] [description]
     */
    public function index(){
        $header       = $this->column->get_column(1);            //头部栏目
        $recent_data  = $this->article->get_sider_article();     //侧边栏-文章
        $tags_data    = $this->articletype->get_sider_type();    //侧边栏-标签
        $data_article = $this->article->get_article('all','',5); //首页文章
        $article_total= $this->article->article_total_count();   //已发表文章数

        foreach ($data_article['article'] as $key => $value) {
            foreach ($value as $k => $v) {
                if($k == 'path'){
                    if(!empty($value[$k])){
                        $value[$k] = '<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="" src="'.C('QINIU_HOST').$v.'">';
                    }
                }
            }
            $data_article['article'][$key] = $value;
        }

        $data = array(
            'article' => $data_article['article'],
            'Page'    => $data_article['show'],
            'header'  => $header['column'],
            'tags'    => $tags_data['tags'],
            'recent'  => $recent_data['recent'],
            'total'   => $article_total
            );

        $this->assign($data)->display('Index/home');
    }

    /**---------------------------------------------------------------------------------------
     * 头部栏目-文章-显示页
     * @return [type] [description]
     */
    public function article(){
        $aid = I('aid');

        $header       = $this->column->get_column(1);          //头部栏目
        $recent_data  = $this->article->get_sider_article();   //侧边栏-文章
        $tags_data    = $this->articletype->get_sider_type();  //侧边栏-标签
        $article_total= $this->article->article_total_count();   //已发表文章数

        $data = array(
            'header'  => $header['column'],
            'tags'    => $tags_data['tags'],
            'recent'  => $recent_data['recent'],
            'aid'     => $aid,
            'total'   => $article_total
            );

        $this->assign($data)->display('Index/article');
    }

    /**---------------------------------------------------------------------------------------
     * 头部栏目-Demo-显示页
     * @return [type] [description]
     */
    public function demo(){
        $header       = $this->column->get_column(1);              //头部栏目
        $share_data   = $this->share->get_share();
        
        $data = array(
            'header'  => $header['column'],
            'share'   => $share_data['share']
            );

        $this->assign($data)->display('Index/demo');
    }

    /**---------------------------------------------------------------------------------------
     * 头部栏目-生活-显示页
     * @return [type] [description]
     */
    public function life(){
        $header       = $this->column->get_column(1);              //头部栏目
        $jotting_data = $this->jotting->get_jotting('all','','8');

        //图片地址替换
        foreach ($jotting_data['jotting'] as $key => $value) {
            foreach ($value as $k => $v) {
                if($k == 'path'){
                    if($value[$k]){
                        $value[$k] = '<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="" src="'.C('QINIU_HOST').$v.'">';
                    }
                }
            }
            $jotting_data['jotting'][$key] = $value;
        }

        //所有随笔数据俩俩一组
        $arr   = array();
        $num = 0;
        $i   = 0;
        foreach ($jotting_data['jotting'] as $k => $v) {
            array_push($arr, $jotting_data['jotting'][$num]);
            $num++;

            if($k % 2 != 0) {
                $jotting[$i] = $arr;
                $arr   = array();
                $i++;
            }
        }
        //单数是特殊处理
        $length = count($jotting_data['jotting']);
        if($length % 2 != 0){
            $jotting[$i]['0'] = $jotting_data['jotting'][$length-1];
        }
        $jotting_data['jotting'] = $jotting;

        $data = array(
            'header'  => $header['column'],
            'jotting' => $jotting_data['jotting'],
            'Page'    => $jotting_data['show'],
            );

        $this->assign($data)->display('Index/life');
    }

    /**---------------------------------------------------------------------------------------
     * 头部栏目-留言板-显示页
     * @return [type] [description]
     */
    public function guestbook(){
        $header = $this->column->get_column(1);              //头部栏目

        $data = array(
            'header'  => $header['column']
            );
        $this->assign($data)->display('Index/guestbook');
    }

    public function aa(){
        $this->display("Index/demo");
    }
}