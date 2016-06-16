<?php
namespace Home\Model;
use Think\Model\RelationModel;
class JottingModel extends RelationModel{
    /**------------------------------------------------------------------------
     * 获取随笔信息
     * @param  [string] $type       [all 已发布所有文章,recent 最近文章，one指定id文章]
     * @param  [int]    $arid       [文章的arid]
     * @param  [int]    $page_count [分页，每页显示的数量]
     * @param  [int]    $status     [1已发布]
     * @return [type]       [description]
     */
    public function get_jotting($type,$jid = '',$page_count){
        $jotting = M('Jotting');
        if($type == 'all'){
            $map['status'] = '1';
            // 分页
            $count = $jotting->where($map)->count();
            $Page  = new \Think\Page($count,$page_count);
            $limit = $Page->firstRow.','.$Page->listRows;
            $show  = $Page->show();
            $jotting_data  = $jotting->where($map)->limit($limit)->order('time desc')->select();

            $data = array(
                'show' => $show,
                'jotting' => $jotting_data
            );

        }

        return $data;
    }
}