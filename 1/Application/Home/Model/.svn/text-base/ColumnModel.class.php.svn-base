<?php
namespace Home\Model;
use Think\Model;
class ColumnModel extends Model{
	/**
	 * 获取栏目
	 * @param  $type [int]   [栏目类型1头部，2页脚] 
	 * @return $data [array] [栏目信息] 
	 */
	public function get_column($type){
		$column = M('Column');

		$map['type']         = $type;
		$map['status'] = '1';
	    $data_column = $column->field('name,href')->where($map)->order('column_order')->select();

	   	$data = array(
	  		'column' => $data_column
	    );

	    return $data;
	}
}