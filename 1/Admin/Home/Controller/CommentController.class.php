<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\CommentModel;

class CommentController extends CommonController {
    protected $comment;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->comment  = new CommentModel();
    }

    /**---------------------------------------------------------------------------------------
     * 最新评论显示页
     * @return [type] [description]
     */
    public function comment_new_page(){
    	$comment_data = $this->comment->get_comment('all','','0');

    	//获取父级评论
    	foreach ($comment_data as $key => $value) {
    		foreach ($value as $k => $v) {
    			if($k == 'pcid'){
    				if($v != '0'){
    					$pcid_comment = $this->comment->get_comment('one',$v);
    					$value['pcid_comment'] = $pcid_comment['content'];
    				}else{
    					$value['pcid_comment'] = "";
    				}
    			}
    		}
    		$comment_data[$key] = $value;
    	}

    	$this->assign('comment',$comment_data)->display("Index/Comment/comment_new");
    }

    /**---------------------------------------------------------------------------------------
     * 评论-最新评论-评论删除操作
     * @param [int]   $[cid] [评论cid]
     * @return [type] [description]
     */
    public function comment_del(){
    	$cid = I('post.cid');
    	$ret = $this->comment->comment_del($cid);

    	if($ret == 1){
    		$this->ajaxReturn(1);
		}else{
			$this->ajaxReturn(0);
		}
    }

    /**---------------------------------------------------------------------------------------
     * 等待回复显示页
     * @return [type] [description]
     */
    public function comment_wait_page(){
    	$comment_data = $this->comment->get_comment('all','','2');
    	$this->assign('comment',$comment_data)->display("Index/Comment/comment_wait");
    }

    /**---------------------------------------------------------------------------------------
     * 历史评论显示页
     * @return [type] [description]
     */
    public function comment_history_page(){
    	$comment_data = $this->comment->get_comment('all','','2');
    	$this->assign('comment',$comment_data)->display("Index/Comment/comment_history");
    }

    /**
     * 评论-最新评论-移至待回复操作
     * @return [type] [description]
     */
    public function comment_wait(){
        $cid = I('get.cid');
        $ret = $this->comment->comment_check($cid,'2');

        if($ret == 1){
            $this->redirect('Home/Comment/comment_new_page');
        }else{
            $this->error('移至待回复失败，请重试');
        }
    }

    /**
     * 评论-最新评论-审核通过操作
     * @return [type] [description]
     */
    public function comment_checked(){
    	$cid = I('get.cid');
    	$ret = $this->comment->comment_check($cid,'1');

    	if($ret == 1){
    		$this->redirect('Home/Comment/comment_new_page');
		}else{
			$this->error('审核失败，请重试');
		}
    }
}