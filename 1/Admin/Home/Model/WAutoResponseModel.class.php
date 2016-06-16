<?php
namespace Home\Model;
use Think\Model;
class WAutoResponseModel extends Model{
    /**---------------------------------------------------------------------------------------
     * 被添加回复资源保存操作
     * @param  string type    回复类型
     * @param  string content 回复内容
     * @return int 1
     */
    public function auto_response_save($data){
        $response      = M('w_auto_response');
        $r_map['type'] = $data['type'];
        $rid = $response->field('rid')->where($r_map)->find();

        if($rid){
            //更新
            $map['rid'] = $rid['rid'];
            $ret = $response->where($map)->save($data);
        }else{
            //添加
            $ret = $response->data($data)->add();
        }

        if($ret){
            return 1;
        }else{
            return 0;
        }
    }

    /**---------------------------------------------------------------------------------------
     * 微信-被添加自动回复资源-清空
     */
    public function auto_response_del(){
        $Model = new Model();
        $sql   = 'truncate table `'.C('DB_PREFIX').'w_auto_response`';
        $ret   = $Model->execute($sql);

        if($ret !== false){
            return 1;
        }else{
            return 0;
        }
    }

    /**---------------------------------------------------------------------------------------
     * 微信-被添加自动回复资源-获取
     * @return string 资源内容
     */
    public function get_auto_response(){
        $response = M('w_auto_response');
        $data     = $response->field('content')->find();

        return $data['content'];
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