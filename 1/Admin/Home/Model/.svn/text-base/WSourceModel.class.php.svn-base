<?php
namespace Home\Model;
use Think\Model;
class WSourceModel extends Model{
    /**---------------------------------------------------------------------
     * 新增上传资源
     * @param array $data 上传媒体数据
     * @return int  1添加成功,-1添加失败
     */
    public function save_source($data){
        $source = M('W_source');
        $ret    = $source->data($data)->add();

        if($ret){
            return 1;
        }else{
            return -1;
        }
    }
}