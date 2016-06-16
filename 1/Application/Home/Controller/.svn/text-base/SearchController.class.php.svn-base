<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\ArticleModel;
use Home\Model\ColumnModel;
use Home\Model\ArticletypeModel;

class SearchController extends Controller {
    protected $article;
    protected $column;
    protected $articletype;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->article     = new ArticleModel();
        $this->column      = new ColumnModel();
        $this->articletype = new ArticletypeModel();
    }

    /**---------------------------------------------------------------------------------------
     * 关键词搜索
     * @param string 关键词
     */
    public function keyword_search(){
        $value = I('post.value');
        $value = preg_replace('/[\s]+/is'," ",$value);
        $arr   = explode(' ',trim($value));

        $article_data = $this->article->keyword_search($arr);   //搜索结果
        $header       = $this->column->get_column(1);          //头部栏目
        $recent_data  = $this->article->get_sider_article();   //侧边栏-文章
        $tags_data    = $this->articletype->get_sider_type();  //侧边栏-标签
        $article_total= $this->article->article_total_count(); //已发表文章数

        //关键字高亮
        $article_data = $this->article->keywordFilter($arr,$article_data);


        $data = array(
            'header'  => $header['column'],
            'tags'    => $tags_data['tags'],
            'recent'  => $recent_data['recent'],
            'total'   => $article_total,
            'article' => $article_data,
            'count'   => count($article_data)
        );
        
        $this->assign($data)->display('Index/search');
    }
}