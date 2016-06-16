<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ShareModel extends RelationModel{
    //频道模型关联模型
    protected $_link = array(
        'share_type'=>array(
            'mapping_type'  =>self::BELONGS_TO,
            'foreign_key'   =>'id',
            'mapping_name'  =>'share_type',
            'mapping_fields'=>'name,img',
            'as_fields'     =>'name,img'
        )
    );

    /**-----------------------------------------------------------------------------------
     * 分享-资源分类删除操作
     * @param [int]    $[id]      [分类id]
     * @param [int]    $[type]    [all所有分类,one指定分类]
     * @return [type] [description]
     */
    public function get_share_type($type, $id){
        $share_type = M('Share_type');

        if($type == 'all'){
            //所有资源分类
            $data = $share_type->select();

        }else if($type == 'one'){
            //指定资源分类
            $map['id'] = $id;
            $data = $share_type->where($map)->find();
        }

        if($data){
            return $data;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * 资源-资源分类删除操作
     * @param [int]    $[id]      [分类id]
     * @return [type] [description]
     */
    public function share_type_del($id){
        $share_type = M('Share_type');
        $map['id']  = $id;
        $ret = $share_type->where($map)->delete();

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * [资源删除操作]
     * @param  [type] $sid [资源sid]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function share_del($sid){
        $share = M('Share');
        $map['sid'] = $sid;
        $ret = $share->where($map)->delete();

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**---------------------------------------------------------------------------------------
     * 获取资源信息
     * @param  [string] $type   [all 已发布所有资源]
     * param   [int]    $sid   [资源sid]
     * @return [type]       [description]
     */
    public function get_share($type,$sid = ''){
        $share = D('Share');
        if($type == 'all'){
            $share_data = $share->relation('share_type')->select();
        }else if($type == 'one'){
            $share_data = $share->relation('share_type')->find();
        }

        $data = array(
            'share' => $share_data
        );

        return $data;
    }

    /**-----------------------------------------------------------------------------------
     *分享-资源添加操作
     * @param [string] $[describe]    [资源描述]
     * @param [string] $[code]        [提取码]
     * @param [string] $[author]      [作者]
     * @param [string] $[time]        [发布时间]
     * @param [string] $[id]          [资源种类]
     * @return [type] [description]
     */
    public function share_add($data){
        $share = M('Share');

        $ret = $share->data($data)->add();

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * [添加资源分类]
     * @param [string] $[img]      [分类配图]
     * @param [string] $[name]     [分类名称]
     * @param [string] $[describe] [分类描述]
     * @return [array]   [分类数据]
     */
    public function share_type_add($data){
        $share_type = M('Share_type');

        $ret = $share_type->data($data)->add();

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**-----------------------------------------------------------------------------------
     * 分享-资源分类编辑操作
     * @param [string] $[img]      [分类配图]
     * @param [string] $[name]     [分类名称]
     * @param [string] $[describe] [分类描述]
     * @return [type] [description]
     */
    public function share_type_edit($data){
        $share_type = M('Share_type');
        $map['id']  = $data['id'];
        $ret = $share_type->where($map)->save($data);

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }
}