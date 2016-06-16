<?php
namespace Home\Model;
use Think\Model;
class WUserModel extends Model{
    /**---------------------------------------------------------------------
     * 用户是否存在
     * @param  string $openid 用户openid
     * @return int    0不存在,-1查询出错,1存在
     *
     */
    public function is_exist_user($openid){
        $user = M('WUser');
        $map['openid'] = $openid;
        $ret = $user->where($map)->find();

        if($ret === null){
            return 0;
        }else if($ret === false){
            return -1;
        }else{
            return 1;
        }
    }

    /**---------------------------------------------------------------------
     * 修改用户
     * @param  string data 用户基本信息
     * @return int    1修改成功,-1更新失败
     */
    public function update_user($data){
        $user     = M('WUser');
        $map['openid'] = $data['openid'];
        $ret      = $user->where($map)->save($data);

        if($ret === false){
            return -1;
        }else{
            return 1;
        }
    }

    /**---------------------------------------------------------------------
     * 新增用户
     * @param  string data 用户基本信息
     * @return int    1添加成功,-1添加失败
     */
    public function add_user($data){
        $user = M('WUser');
        $ret  = $user->data($data)->add();

        if($ret){
            return 1;
        }else{
            return -1;
        }
    }

    /**---------------------------------------------------------------------
     * openid获取用户基本信息
     * @param string $openid   用户openid
     * @param string $type     all所有用户,one指定用户
     * @param int    $firstRow 页数
     * @return int   0不存在,-1查询出错,1存在
     *
     */
    public function get_user_message($openid = null, $type,$firstRow){
        $user = M('WUser');

        if($type == 'all'){
            //每页显示条数
            $page_size = '2';
            $count     = $user->where('subscribe = 1')->count();// 查询满足要求的总记录数
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $map['subscribe'] = '1';
            $user_data = $user->field('w_uid,remark,country,province,city,headimgurl,subscribe_time,sex,nickname')
                        ->where($map)->limit($firstRow*$page_size,$page_size)
                        ->select();

            $data = array(
                'list'      => $user_data,
                'page_size' => $page_size,
                'total_num' => $count
            );
        }else if($type == 'one'){

        }

        if($user_data === null){
            return 0;
        }else if($user_data === false){
            return -1;
        }else{
            return $data;
        }
    }
}