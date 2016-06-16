<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\WAutoResponseModel;

class WechatCommonController extends Controller{
    protected $response;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct(){
        parent::__construct();
        $this->response = new WAutoResponseModel();
    }

    /**---------------------------------------------------------------------------------------
     * 发送文本信息
     * @param $object      用户基本信息
     * @param $contentStr  文本消息内容
     */
    public function send_user_text($object,$contentStr){
        $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0</FuncFlag>
            </xml>";

        $resultStr  = sprintf($textTpl, $object['fromUsername'], $object['toUsername'], $object['time'], 'text', $contentStr);
        echo $resultStr;
    }

    /**---------------------------------------------------------------------------------------
     * 上传-图片资源
     */
    public function source_upload_image(){
//          print_r($_FILES);
        $name = 'a3.jpg';
        $type = 'image';
        $path = APP_PATH.'/Template/Images/a3.jpg';
        $access_token = $this->response->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$access_token.'&type='.$type;

        $data = array('media'=>'@'.$path);

        $ret_json = request($url,$data,'POST');

        $ret_arr  = json_decode($ret_json,true);
        $ret_arr['name'] = $name;
        $ret = $this->response->save_source($ret_arr);

        print_r($ret_arr);
    }

    /**-----------------------------------------------------------------------------------
     * 用户管理，通过用户openid获取用户基本信息
     * @param string $openid      用户openid
     * @return array $userMessage 用户基本信息
     */
    public function getUserMessage($openid){
        $access_token = $this->user->get_access_token();

        $lang   = 'zh_CN';                        /*zh_CN 简体，zh_TW 繁体，en 英语*/
        $url     = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang='.$lang;

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
        $userMessage = json_decode($data,true);
        return $userMessage;
    }
}