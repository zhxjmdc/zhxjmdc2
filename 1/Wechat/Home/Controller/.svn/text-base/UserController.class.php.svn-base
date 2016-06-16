<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\WUserModel;
class UserController extends Controller{
    protected $user;

    /**---------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct(){
        parent::__construct();
        $this->user = new WUserModel();
    }

    /**---------------------------------------------------------------------------
     * 获取分组列表
     * @return array $groups 分组列表名称,id,用户数
     */
    public function get_group(){
        $access_token = $this->user->get_access_token();
        $url = 'https://api.weixin.qq.com/cgi-bin/groups/get?access_token='.$access_token;

        $group = request($url,'','GET');

        $arr = json_decode($group,true);
        print_r($arr['groups']);
    }

    /**---------------------------------------------------------------------------
     * 创建分组
     * @return string $name   新增分组名称
     * @return array  $groups 新增分组名称,id,用户数
     */
    public function create_group($name){
        $access_token = $this->user->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/groups/create?access_token='.$access_token;

        $data = '{"group":{"name":"'.$name.'"}}';

        $group = request($url,$data,'POST');

        $arr = json_decode($group,true);
        print_r($arr['groups']);
    }

    /**---------------------------------------------------------------------------
     * 修改分组名称
     * @param int    $id   分组id
     * @param string $name 修改名称
     */
    public function update_group($id,$name){
        $access_token = $this->user->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/groups/update?access_token='.$access_token;

        $data = '{"group":{"id":'.$id.',"name":"'.$name.'"}}';

        $ret = request($url,$data,'POST');

        print_r($ret);
    }

    /**---------------------------------------------------------------------------
     * 移动单个用户到新分组
     * @param string $openid   用户openid
     * @param int    $groupid  分组id
     */
    public function move_one_group(){
        $openid  = 'oHvh3uOpilZUZEAh6-6sNJWVxrIs';
        $groupid = '101';
        $access_token = $this->user->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token='.$access_token;

        $data = '{"openid":"'.$openid.'","to_groupid":'.$groupid.'}';

        $ret = request($url,$data,'POST');

        print_r($ret);
    }

    /**---------------------------------------------------------------------------
     * 移动批量用户到新分组
     * @param array $openid_arr  用户openid数组,(数字下标)
     * @param int   $groupid     分组id
     */
    public function move_many_group($openid_arr,$groupid){
        $access_token = $this->user->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token='.$access_token;
        $openid_json = json_encode($openid_arr);

        $data = '{"openid_list":'.$openid_json.',"to_groupid":'.$groupid.'}';

        $ret = request($url,$data,'POST');

        print_r($ret);
    }

    /**---------------------------------------------------------------------------
     * 删除分组
     * @param int $groupid 分组id
     */
    public function del_group($groupid){
        $access_token = $this->user->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/groups/delete?access_token='.$access_token;

        $data = '{"group":{"id":'.$groupid.'}}';

        $ret = request($url,$data,'POST');

        print_r($ret);
    }

    /**---------------------------------------------------------------------------
     * 查询用户所在分组
     * @param string $openid   用户openid
     */
    public function find_group($openid){
        $access_token = $this->user->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/groups/getid?access_token='.$access_token;

        $data = '{"openid":"'.$openid.'"}';

        $ret = request($url,$data,'POST');

        print_r($ret);
    }

    /**---------------------------------------------------------------------------
     * 用户管理，获取用户列表（10000以上用户通过next_openid多次获取）
     */
    public function get_user_list(){
        $access_token = $this->user->get_access_token();
        $url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$access_token;

        $data = request($url,'','GET');
        $userList = json_decode($data,true);
        print_r($userList);
    }
}