<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ArticletypeModel extends RelationModel{
	//频道模型关联模型
	protected $_link = array(
		'article'=>array(
			'mapping_type'  =>self::HAS_MANY,
			'foreign_key'   =>'aid',
			'mapping_name'  =>'article',
			'mapping_fields'=>'arid',
			'as_fields'     =>'arid'
		)
	);

	/**-----------------------------------------------------------------------------------
	 * [获取文章分类]
	 * @param [string]   $[type]     [全部all 顶级分类top 指定aid栏目one]
	 * @return [array]   [分类数据]
	 */
	public function get_type($type, $aid = ''){
        $articletype = D('Articletype');

        if($type == 'all'){
        	// 所有分类
        	$type_data = $articletype->relation('article')->select();
        }else if($type == 'top'){
        	// 顶级栏目分类
        	$map['pid'] = '0';
        	$type_data = $articletype->where($map)->select();
        }else if($type == 'one'){
        	//指定aid分类
        	$map['aid'] = $aid;
        	$type_data = $articletype->where($map)->find();
        }

        return $type_data;
    }
}