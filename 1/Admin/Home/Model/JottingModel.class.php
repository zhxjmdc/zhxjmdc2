<?php
namespace Home\Model;
use Think\Model;
class JottingModel extends Model{
    /**---------------------------------------------------------------------------------------
     * 获取随笔信息
     * @param  [string] $type   [all 已发布所有随笔]
     * param   [int]    $jid    [随笔jid]
     * param   [int]    $status [1已发布，0草稿箱]
     * @return [type]       [description]
     */
    public function get_jotting($type,$jid = '',$status = ''){
        $jotting = D('Jotting');
        if($type == 'all'){
            $map['status'] = $status;
            $jotting_data  = $jotting->where($map)->order('time desc')->select();
        }else if($type == 'one'){
            $map['jid'] = $jid;
            $jotting_data = $jotting->where($map)->find();
        }

        $data = array(
            'jotting' => $jotting_data
        );

        return $data;
    }

    /**-----------------------------------------------------------------------------------
     * [随笔添加操作]
     * @param [string] $[content]  [随笔内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[path]     [配图文件名]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function jotting_add($data){
        $jotting = M('Jotting');

        $ret = $jotting->data($data)->add();

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * 主页-随笔列表-移至草稿箱操作
     * @param [int]    $[jid] [随id]
     * @return [type] [description]
     */
    public function jotting_drafts($jid){
        $jotting = M('Jotting');
        $map['jid']     = $jid;
        $data['status'] = '0';
        $ret = $jotting->where($map)->save($data);

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * [随笔删除操作]
     * @param  [type] $jid [随笔jid]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function jotting_del($jid){
        $jotting = M('Jotting');
        $map['jid'] = $jid;
        $ret = $jotting->where($map)->delete();

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * 主页-随笔草稿箱-重新发布操作
     * @param [int]    $[jid] [随笔jid]
     * @return [type] [description]
     */
    public function jotting_publish($jid){
        $jotting = M('Jotting');
        $map['jid']     = $jid;
        $data['status'] = '1';
        $ret = $jotting->where($map)->save($data);

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * [随笔修改操作]
     * @param [int]    $[jid]     [随笔jid]
     * @param [string] $[content]  [文章内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[path]     [配图路径]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function jotting_edit($data){
        // 基本信息更新
        $jotting = M('Jotting');
        $ret = $jotting->save($data);

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }
}