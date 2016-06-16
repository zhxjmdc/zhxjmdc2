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
			'condition'     =>'status = 1',
			'mapping_fields'=>'content,title,arid,time,describe,status',
			'as_fields'     =>'content,title,arid,time,describe,status'
		)
	);

	/**----------------------------------------------------------------------------------------
	 * 获取某种分类所有子节点下的无线级子类的所有文章
	 * @param  int   $cid    初始值为第一条父级评论cid，表示从根类开始查找  
	 * @param  array $array  临时保存子类数组，方便递归查找
	 * @return array $array['son']  所有子评论
	 */
	public function get_type_article($aid,&$array = array()){
		$articletype = D('Articletype');
		$data = $articletype->where('pid ='.$aid)->select();
		
		if(empty($data)){
			// 叶子节点
			$data_son = $articletype->relation('article')->where('aid ='.$aid)->select();
			foreach ($data_son['0']['article'] as $key => $value) {
				$value['typename'] = $data_son['0']['typename'];
				$array[] = $value;
			}

		}else{
			// 非叶子节点
			$data_parent = $articletype->relation('article')->where('aid ='.$aid)->select();
			foreach ($data_parent['0']['article'] as $key => $value) {
			    $value['typename'] = $data_parent['0']['typename'];
				$array[] = $value;
			}

			foreach ($data as $key => $value) {
				foreach ($value as $k => $v) {
					if($k == 'aid'){
						//递归
						$this->get_type_article($v,$array);
					}
				}
			}
		}

        return $array;
	}

	/**----------------------------------------------------------------------------------------
	 * 侧边栏-分类标签
	 * @return [type] [description]
	 */
	public function get_sider_type(){
        $articletype = D('Articletype');
        $type_data = $articletype->relation('article')->select();

        foreach ($type_data as $key => $value) {
            foreach ($value as $k => $v) {
                // 文章数量
                if($k == 'article'){
                    $value['article_count'] = count($value[$k]);
                    unset($value[$k]);
                }
            }
            $type_data[$key] = $value;
        }

        $data = array(
			'tags' => $type_data
			);

		return $data;
    }
}