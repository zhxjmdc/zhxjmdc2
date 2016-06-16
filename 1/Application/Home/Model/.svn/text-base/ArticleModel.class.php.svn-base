<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{
	//频道模型关联模型
	protected $_link = array(
		'articletype'=>array(
			'mapping_type'  =>self::BELONGS_TO,
			'foreign_key'   =>'aid',
			'mapping_name'  =>'articletype',
			'mapping_fields'=>'typename',
			'as_fields'     =>'typename'
		),
		'article_data'=>array(
			'mapping_type'  =>self::HAS_ONE,
			'foreign_key'   =>'arid',
			'mapping_name'  =>'article_data',
			'mapping_fields'=>'comment_count,browse_count',
			'as_fields'     =>'comment_count,browse_count'
		),
		'articlepic'=>array(
			'mapping_type'  =>self::HAS_ONE,
			'foreign_key'   =>'arid',
			'mapping_name'  =>'articlepic',
			'mapping_fields'=>'path',
			'as_fields'     =>'path'
		)
	);

	/**------------------------------------------------------------------------
	 * 获取文章信息
	 * @param  [string] $type       [all 已发布所有文章,recent 最近文章，one指定id文章]
	 * @param  [int]    $arid       [文章的arid]
	 * @param  [int]    $page_count [分页，每页显示的数量]
	 * @param  [int]    $status     [1已发布]
	 * @return [type]       [description]
	 */
	public function get_article($type,$arid = '',$page_count){
		$article = D('Article');
		if($type == 'all'){
			$map['status'] = '1';
			// 分页
			$count = $article->where($map)->count();
			$Page  = new \Think\Page($count,$page_count);
	        $limit = $Page->firstRow.','.$Page->listRows;
	        $show  = $Page->show();
			$article_data  = $article->relation(true)->where($map)->limit($limit)->order('time desc')->select();

			$data = array(
				'show' => $show,
				'article' => $article_data
		    );

		}else if($type == 'one'){
			$map['arid'] = $arid;
			$article_data = $article->relation(true)->where($map)->find();

			$data = array(
				'article' => $article_data
		    );

		}else if($type == 'recent'){
			$map['arid'] = $arid;
			$article_data = $article->where($map)->find();
		}

	    return $data;
	}

	/**
	 * 文章评论无限级分类
	 * @param  int   $cid    初始值为第一条父级评论cid，表示从根类开始查找  
	 * @param  array $array  临时保存子类数组，方便递归查找
	 * @return array $array['son']  所有子评论
	 */
	public function article_comment($cid,&$array = array('son'=>array())) {
		$comment = M('comment');
		$data = $comment->where('pcid ='.$cid)->order('time desc')->select();
        foreach ($data as $k => $v) {
        	//子评论添加父评论name,cid元素
        	$parent_data = $comment->where('cid ='.$cid)->find();
        	$v['parent'] = $parent_data['name'];
        	//递归查找父评论所都子评论
        	$array['son'][] = $v;
        	$son_data = $this->article_comment($v['cid'],$array);
        }
        return $array['son'];
	}

	public function get_article_comment($arid){
		$comment = M('comment');
		//获取文章所有顶级评论
		$map['arid'] = $arid;
		$map['pcid'] = '0';
		$data_top_comment = $comment->where($map)->order('time desc')->select();

		//循环顶级评论，添加子评论元素son
        foreach ($data_top_comment as $key => $value) {
            //父级评论表情替换
            // foreach ($value as $k => $v) {
            //     if($k == 'content'){
            //         $value[$k] = QQface_Replace($value[$k]);
            //     }
            //     $comment_data[$key] = $value; 
            // }
            // 子评论添加父评论名称parent，父评论cid
            $$data_top_comment[$key]['parent'] = $value['name'];
            $$data_top_comment[$key]['parentid'] = $value['cid'];

            $data_son_comment = $this->article_comment($value['cid']);
            
            //子级评论表情替换
            // foreach ($data as $i => $j) {
            //     foreach ($j as $ke => $va) {
            //         if($ke == 'content'){
            //             $j[$ke] = QQface_Replace($j[$ke]);
            //         } 
            //     }
            //     $data[$i] = $j;
            // }
            $data_top_comment[$key]['son'] = $data_son_comment;
        }


		return $data_top_comment;
	}

	/**----------------------------------------------------------------------------------------
	 * 用户对文章发表评论/回复
	 * @param  [int] $[arid]     [文章arid]
     * @param  [int] $[username] [用户名]
     * @param  [int] $[email]    [邮箱]
     * @param  [int] $[content]  [内容]
     * @return [type] [1 成功， 0失败]
	 */
	public function article_comment_add($data){
		$comment = M('Comment');
		$ret     = $comment->data($data)->add();

		$data_comments['ret'] = $ret;  //插入评论的cid

		if(isset($data['pcid'])){
			// 获取父级评论名称
			$map['cid'] = $data['pcid'];
		    $data_comment = $comment->field('name')->where($map)->find();

		    $data_comments['parent'] = $data_comment['name'];  //插入评论的cid
		}
		
		if($ret){
			return $data_comments;
		}else{
			return 0;
		}
	}

	/**----------------------------------------------------------------------------------------
	 * 侧边栏-最近文章
	 * @return [type] [description]
	 */
	public function get_sider_article(){
		//最近文章
		$article = M('Article');
		$recent_article = $article->field('arid,title')->where('status = 1')->order('time')->limit('6')->select();
		
		$data = array(
			'recent' => $recent_article
			);

		return $data;
	}

	/**----------------------------------------------------------------------------------------
	 * 点击加载更多文章
	 * @param [int] $[last]   [起始位置]
	 * @param [int] $[amount] [每页显示条数]
	 * @return [type] [description]
	 */
	public function click_get_more($last,$amount){
		$article = D('Article');
		$firstRow = $last;    //起始位置
		$listRows = $amount;  //每页显示条数

	    $limit = $firstRow.','.$listRows;

	    // 获取文章数量
	    $map['status'] = '1'; 
	    $count = $article->relation(true)->where($map)->count();
		$article_data  = $article->relation(true)->where($map)->limit($limit)->order('time desc')->select();
		
		$data = array(
			'count'   => $count,
			'article' => $article_data
			);
		return $data;
	}

	/**----------------------------------------------------------------------------------------
	 * 文章pv浏览量统计（加一）
	 * @param  [int] $arid  [文章arid]
	 * @return [type]       [description]
	 */
	public function article_PV_add($arid){
		$article_data = M('Article_data');

		$map['arid'] = $arid;
		$article_data->where($map)->setInc('browse_count',1); 
	}

	/**----------------------------------------------------------------------------------------
	 * 文章评论数量统计（加一）
	 * @param  [int] $arid  [文章arid]
	 * @return [type]       [description]
	 */
	public function comment_count_add($arid){
		$article_data = M('Article_data');

		$map['arid'] = $arid;
		$article_data->where($map)->setInc('comment_count',1); 
	}

	/**----------------------------------------------------------------------------------------
	 * 博主已发表文章数量统计
	 * @return [int]       [已发表文章数量 1已发表 0草稿箱]
	 */
	public function article_total_count(){
		$article = M('Article');

		$map['status'] = '1';
		$article_count = $article->where($map)->count(); 

		return $article_count;
	}

	/**----------------------------------------------------------------------------------------
	 * 关键词搜索
	 * @param array [arr]    	[多个关键词]
	 * @param int  [status] 	[已发表文章数量 1已发表 0草稿箱]
	 * @param int [arid]    	[文章id]
	 * @param int [aid]    		[文章所属类型id]
	 * @param string [title]    [标题]
	 * @param string [content]  [内容]
	 * @param string [describe] [描述]
	 * @param string [time]     [发表时间]
	 * @return int [$data查询结果]
	 */
	public function keyword_search($arr){
		$where = array();
		foreach ($arr as $k => $v){
			array_push($where,array('like','%'.$v.'%'));
		}
		array_push($where,'or');

		$article = D('Article');
		$map['title']  = $where;
		$map['status'] = '1';
		$data = $article->field('arid,aid,title,content,describe,time')->where($map)->relation('articletype')->select();

		return $data;
	}

	/**-------------------------------------------------------------------
	 * 关键字高亮显示
	 * @param  [array]  $keyword  一维数据 关键字
	 * @param  [array]  $data     二维数据
	 * @return [array]  $data     二维数据
	 */
	public function keywordFilter($keyword,$data){
		foreach ($data as $key => $value) {
			foreach ($value as $k => $v) {
				if($k == 'title'){
					foreach($keyword as $word_key => $word_val){
						$met  = "<font color='red'><b>".$word_val."</b></font>";
						$mode = '/'.$word_val.'/i';
						$value[$k] = preg_replace($mode,$met,$value[$k]);
					}
				}
			}
			$data[$key] = $value;
		}
		return $data;
	}
}