<?php
namespace Home\Model;
use Think\Model\RelationModel;
class CommentModel extends RelationModel{
	//频道模型关联模型
	protected $_link = array(
		'article'=>array(
			'mapping_type'  =>self::BELONGS_TO,
			'foreign_key'   =>'arid',
			'mapping_name'  =>'article',
			'mapping_fields'=>'title',
			'as_fields'     =>'title'
		)
	);

	/**----------------------------------------------------------------------------------------
	 * 获取文章评论信息
	 * @param  [string] $type  [all所有评论，one指定cid评论]
	 * @param  [int]    $cid   [评论cid]
	 * @param  [int]    $check [0未审核过，1审核过，2待回复]
	 * @return [type]        [description]
	 */
	public function get_comment($type, $cid = '', $check = ''){
		$comment = D('Comment');

		if($type == 'all'){
			$map['check'] = $check;
			$comment_data = $comment->relation('article')->where($map)->select();
		}else if($type == 'one'){
			$map['cid'] = $cid; 
			$comment_data = $comment->field('content')->where($map)->find();
		}

		return $comment_data;
	}

	/**----------------------------------------------------------------------------------------
	 * 评论删除操作
	 * @param  [type] $cid [指定评论cid]
	 * @return [type]      [description]
	 */
	public function comment_del($cid){
		$comment = M('Comment');

		$map['cid'] = $cid;
		$ret = $comment->where($map)->delete();

		if($ret == 1){
			return 1;
		}else{
			return 0;
		}
	}

	/**----------------------------------------------------------------------------------------
	 * 评论审核操作
	 * @param  [int] $cid   [指定评论cid]
	 * @param  [int] $check [审核后状态,0待回复，1审核过，2待回复]
	 * @return [type]        [description]
	 */
	public function comment_check($cid, $check){
		$comment = M('Comment');

		$map['cid']    = $cid;
		$data['check'] = $check;

		$ret = $comment->where($map)->save($data);

		if($ret == 1){
			return 1;
		}else{
			return 0;
		}
	}
}