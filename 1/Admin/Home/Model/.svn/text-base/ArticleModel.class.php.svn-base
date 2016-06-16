<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{
	//频道模型关联模型
	protected $_link = array(
		'article_data'=>array(
			'mapping_type'  =>self::HAS_ONE,
			'foreign_key'   =>'arid',
			'mapping_name'  =>'article_data',
			'mapping_fields'=>'arid',
			'as_fields'     =>'arid'
		),
		'articletype'=>array(
			'mapping_type'  =>self::BELONGS_TO,
			'foreign_key'   =>'aid',
			'mapping_name'  =>'articletype',
			'mapping_fields'=>'typename',
			'as_fields'     =>'typename'
		),
        'articlepic'=>array(
            'mapping_type'  =>self::HAS_ONE,
            'foreign_key'   =>'arid',
            'mapping_name'  =>'articlepic',
            'mapping_fields'=>'path',
            'as_fields'     =>'path'
        )
	);
	
	/**---------------------------------------------------------------------------------------
	 * 获取文章信息
	 * @param  [string] $type   [all 已发布所有文章]
	 * param   [int]    $arid   [文章arid]
	 * param   [int]    $status [1已发布，0草稿箱]
	 * @return [type]       [description]
	 */
	public function get_Article($type,$arid = '',$status = ''){
		$article = D('Article');
		if($type == 'all'){
			$map['status'] = $status;
			$article_data  = $article->relation('articletype')->where($map)->order('time desc')->select();
		}else if($type == 'one'){
			$map['arid'] = $arid;
			$article_data = $article->relation(true)->where($map)->find();
		}

		$data = array(
	  		'article' => $article_data
	    );

	    return $data;
	}

	/**-----------------------------------------------------------------------------------
	 * [文章添加操作]
	 * @param [string] $[title]    [栏目标题]
     * @param [string] $[content]  [文章内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[describe] [文章描述]
     * @param [string] $[path]     [配图文件名]
	 * @return [int]   [1操作成功 0操作失败]
	 */
	public function article_add($data){
		$article = D('Article');
        $path    = $data['path'];
		// 关联写入(去除多余数据)
		$data['article_data'] = array(
			'arid' => ''
			);
        unset($data['path']);
		$arid = $article->relation('article_data')->add($data);

        //创建配图
        $articlepic = M('Articlepic');
        $pic_map['arid'] = $arid;
        $pic_map['path'] = $path;
        $ret = $articlepic->data($pic_map)->add();

		if($ret){
			return 1;
		}else{
			return 0;
		}
	}

	/**-----------------------------------------------------------------------------------
	 * [文章删除操作]
	 * @param  [type] $arid [文章arid]
	 * @return [int]   [1操作成功 0操作失败]
	 */
	public function article_del($arid){
        $article = M('Article');
        $map['arid'] = $arid;
		$ret = $article->where($map)->delete();

		if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
	 * [文章修改操作]
	 * @param [int]    $[arid]     [文章arid]
	 * @param [string] $[title]    [栏目标题]
     * @param [string] $[content]  [文章内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[describe] [文章描述]
     * @param [string] $[path]     [配图路径]
     * @param [int]    $[aid]      [分类]
	 * @return [int]   [1操作成功 0操作失败]
	 */
	public function article_edit($data){
        // 配图更新
        if(!empty($data['path'])){
            $articlepic = M('Articlepic');
            $map['arid'] = $data['arid'];
            $articlepic->where($map)->save($data);
        }

        // 基本信息更新
        $article = M('Article');
        $ret = $article->save($data);

		if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
	 * 文章无限级分类
	 * @param  int   $pid    初始值为0，表示从根类开始查找  
	 * @param  array $array  临时保存字、子类数组，方便递归查找
	 * @param  int   $i      类别显示前的空格数
	 * @return array $array  所有类别
	 */
	public function group_article($pid = 0,&$array = array(),$i=-4) {
		$articletype = M('Articletype');
		$data = $articletype->field('aid,typename')->where('pid ='.$pid)->select();
		$i+=4;
		foreach ($data as $k => $v) {
			$v['typename']= str_repeat('&nbsp;',$i).'┕━'.$v['typename'];
			$array[] = $v;
			$this->group_article($v['aid'],$array,$i);
		}
		return $array;
	}

	/**-----------------------------------------------------------------------------------
	 * [添加文章分类]
	 * @param [int]    $[pid]      [分类父节点]
     * @param [string] $[img]      [分类配图]
     * @param [string] $[typename] [分类名称]
     * @param [string] $[alias]    [分类别名]
     * @param [string] $[describe] [分类描述]
	 * @return [array]   [分类数据]
	 */
	public function article_type_add($data){
        $articletype = M('Articletype');

        $ret = $articletype->data($data)->add();
        
        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
     * 主页-文章分类删除操作
     * @param [int]    $[aid]      [分类id]
     * @return [type] [description]
     */
    public function article_type_del($aid){
        $articletype = M('Articletype');
        $map['aid'] = $aid;
        $ret = $articletype->where($map)->delete();

        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
     * 主页-文章分类编辑操作
     * @param [int]    $[pid]      [分类父节点]
     * @param [string] $[img]      [分类配图]
     * @param [string] $[typename] [分类名称]
     * @param [string] $[alias]    [分类别名]
     * @param [string] $[describe] [分类描述]
     * @return [type] [description]
     */
    public function article_type_edit($data){
        $articletype = M('Articletype');
        $map['aid'] = $data['aid'];
        $ret = $articletype->where($map)->save($data);

        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
     * 主页-文章草稿箱-重新发布操作
     * @param [int]    $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_publish($arid){
    	$article = M('Article');
        $map['arid']    = $arid;
        $data['status'] = '1';
        $ret = $article->where($map)->save($data);

        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
     * 主页-文章列表-移至草稿箱操作
     * @param [int]    $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_drafts($arid){
    	$article = M('Article');
        $map['arid']    = $arid;
        $data['status'] = '0';
        $ret = $article->where($map)->save($data);

        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
	 * [添加文章分类]
	 * @param [string]  $[name]       [连载标题]
     * @param [string]  $[create_time][发布时间]
     * @param [string]  $[describe]   [连载描述]
	 * @return [type] [description]
	 */
	public function serialize_add($data){
        $serialize = M('Serialize');

        $ret = $serialize->data($data)->add();
        
        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
     * 获取连载文章信息
     * @param  [string] $type [all 所有连载信息，one指定连载信息]
     * @return [type] [description]
     */
    public function get_serialize($type, $sid = ''){
    	$serialize = M('Serialize');

    	if($type == 'all'){
    		$serialize_data = $serialize->select();
    	}else if($type == 'one'){
    		$map['sid'] = $sid;
    		$serialize_data = $serialize->where($map)->find();
    	}
    	
    	$data = array(
	  		'serialize' => $serialize_data
	    );

	    return $data;
    }

    /**-----------------------------------------------------------------------------------
     * 主页-文章连载删除操作
     * @param [int]   $[sid]      [连载sid]
     * @return [type] [description]
     */
    public function article_serialize_del($sid){
        $serialize = M('Serialize');
        $map['sid'] = $sid;
        $ret = $serialize->where($map)->delete();

        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
     * 获取连载所有文章信息
     * @param [array] $[map] [所有文章arid的数组，逗号隔开]
     * @return [type] [description]
     */
    public function get_serialize_article($article_map){
    	$article = D('Article');

    	$map['arid']  = array('in',$article_map);
    	$article_data = $article->relation('articletype')->where($map)->select();

    	$data = array(
	  		'article' => $article_data
	    );

	    return $data;
    }

    /**-----------------------------------------------------------------------------------
     * 移除连载中指定文章
     * @param  [int] $sid  [连载sid]
     * @param  [int] $arid [移除的文章arid]
     * @return [type]       [description]
     */
    public function article_serialize_remove($sid, $arid){
    	$serialize = M('Serialize');

    	//获取该连载下所有文章
    	$group_data = $serialize->field('group')->where('sid ='.$sid)->find();
    	$group = explode(',', $group_data['group']);
    	
    	//移除指定文章
    	foreach ($group as $k => $v) {
    		if($v == $arid){
    			unset($group[$k]);
    		}else{
    			$new_group .= ','.$v;
    		}
    	}
    	$new_group = substr($new_group,1);

    	//更新连载文章
    	$map['group'] = $new_group;
    	$ret = $serialize->where('sid ='.$sid)->save($map);

    	if($ret){
    		return 1;
    	}else{
    		return 0;
    	}
    }

    /**-----------------------------------------------------------------------------------
     * 文章-连载添加新文章
     * @param [int] $[sid]  [文章sid]
     * @param [int] $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_serialize_add($sid, $arid){
        $serialize = M('Serialize');

        //获取该连载下所有文章
        $group_data = $serialize->field('group')->where('sid ='.$sid)->find();
        //添加新文章
        $group_data['group'] .= ','.$arid;
        //更新数据
        $map['group'] = $group_data['group'];
        $ret = $serialize->where('sid ='.$sid)->save($map);

        if($ret == 1){
            return 1;
        }else{
            return 0;
        }
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
	 * 博主已发表文章评论数统计
	 */
	public function comment_total_count(){
		$article_data = M('Article_data');
		$comment_count = $article_data->sum('comment_count');

		return $comment_count;
	}

	/**----------------------------------------------------------------------------------------
	 * 博主已发表文章浏览数统计
	 */
	public function browse_total_count(){
		$article_data = M('Article_data');
		$browse_count = $article_data->sum('browse_count');

		return $browse_count;
	}
}