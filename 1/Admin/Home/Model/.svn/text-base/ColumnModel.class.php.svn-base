<?php
namespace Home\Model;
use Think\Model;
class ColumnModel extends Model{
	/**-----------------------------------------------------------------------------------
	 * 获取栏目信息
	 * @param  [string] $type [all 所有栏目]
	 * @param  [string] $type [one 指定cid栏目]
	 * @return [type]       [description]
	 */
	public function get_colunm($type, $cid=''){
		$column = M('Column');
		if($type == 'all'){
			$column_data = $column->order('column_order')->select();
		}else if($type == 'one'){
			$map['cid'] = $cid;
			$column_data = $column->where($map)->find();
		}

		$data = array(
	  		'column' => $column_data
	    );

	    return $data;
	}

	/**-----------------------------------------------------------------------------------
	 * [栏目添加操作]
	 * @param [string] $[name]          [栏目名称]
     * @param [int]    $[status]        [栏目开启状态]
     * @param [int]    $[column_order]  [权重，默认50]
	 * @return [int]   [1操作成功 0操作失败]
	 */
	public function column_add($data){
		$column = M('Column');
		$ret = $column->data($data)->add();

		if($ret){
			return 1;
		}else{
			return 0;
		}
	}

	/**---------------------------------------------------------------------------------------
	 * 栏目顺序更新
	 * @param  [array]  $saveWhere [需要更新的数据主键ID]
     * @param  [array]  &$saveData [需要更新的数据数据]
     * @param  [string] $tableName [更新的数据表名]
	 * @return [int]               [1更新成功，0更新失败]
	 */
	public function column_order($saveWhere, $saveData, $tableName){
		$data = saveAll($saveWhere, $saveData, $tableName);
		if($data){
			return 1;
		}else{
			return 0;
		}
	}

	/**-----------------------------------------------------------------------------------
	 * [栏目删除操作]
	 * @param  [type] $cid [description]
	 * @return [int]   [1操作成功 0操作失败]
	 */
	public function column_del($cid){
        $column = M('Column');
        $map['cid'] = $cid;
		$ret = $column->where($map)->delete();

		if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
     * 主页-栏目状态操作
     * @param [int] $[id]     [栏目cid]
     * @param [int] $[status] [栏目开启状态]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function column_change_status($cid,$status){
        $column = M('Column');
        $map['cid']     = $cid;
        $data['status'] = $status;
		$ret = $column->where($map)->save($data);

        if($ret){
			return 1;
		}else{
			return 0;
		}
    }

    /**-----------------------------------------------------------------------------------
	 * [栏目添加操作]
	 * @param [string] $[name]          [栏目名称]
     * @param [int]    $[status]        [栏目开启状态]
     * @param [int]    $[column_order]  [权重，默认50]
	 * @return [int]   [1操作成功 0操作失败]
	 */
	public function column_edit($data){
		$column = M('Column');
		$ret = $column->data($data)->save();
		
		if($ret){
			return 1;
		}else{
			return 0;
		}
	}
}