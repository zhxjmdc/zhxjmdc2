<?php
namespace Home\Model;
use Think\Model\RelationModel;
class WUserModel extends RelationModel{
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
     * 获取微信的accessToken,需要上传到服务器，本地可能不成功
     * @return string $arr['access_token'] 密钥access_token
     */
    public function get_access_token(){
        /*请求URL地址*/
        $appid  = C('APPID');
        $secret = C('SECRET');
        $url    = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;

        $ch = curl_init();                              /*初始化*/
        /*针对https抓取*/
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);/*跳过证书检查*/
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); /*从证书中检查SSL加密算法是否存在*/
        curl_setopt($ch, CURLOPT_URL, $url);            /*设置提交的页面*/
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    /*返回抓取的内容*/
        $data = curl_exec($ch);
        if(curl_errno($ch)){
            var_dump(curl_error($ch));
        }
        curl_close($ch);
        $arr = json_decode($data,true);
        return $arr['access_token'];
    }

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