<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ShareModel extends RelationModel
{
    //频道模型关联模型
    protected $_link = array(
        'share_type' => array(
            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'id',
            'mapping_name' => 'share_type',
            'mapping_fields' => 'name,img',
            'as_fields' => 'name,img'
        )
    );

    /**---------------------------------------------------------------------------------------
     * 获取所有资源信息
     * @return [type]       [description]
     */
    public function get_share(){
        $share = D('Share');
        $share_data = $share->relation('share_type')->select();


        $data = array(
            'share' => $share_data
        );

        return $data;
    }
}