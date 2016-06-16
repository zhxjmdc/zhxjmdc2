<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\WUserModel;
class CustomerServiceController extends Controller{
    protected $user;

    /**---------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->user = new WUserModel();
    }

    /**---------------------------------------------------------------------------
     * 客服回复用户文本消息
     * @param string $openid  用户openid
     * @param string $content 用户回复内容
     */
    public function send_text($openid,$content){
        $access_token = $this->user->get_access_token();
        $url    = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;

        $data = '{
            "touser": "'.$openid.'",
            "msgtype":"text",
            "text":
            {
                 "content":"'.$content.'"
            }
        }';

        request($url,$data,'POST');
    }

    /**---------------------------------------------------------------------------
     * 客服回复用户音乐消息
     * @param string $openid  用户openid
     * @param string $content 用户回复内容
     */
    public function send_music(){
        $openid = "oHvh3uOpilZUZEAh6-6sNJWVxrIs";

        $access_token = $this->user->get_access_token();
        $url    = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;

        $data = '{
            "touser":"oHvh3uOpilZUZEAh6",
            "msgtype":"music",
            "music":
            {
              "title":"哈哈哈",
              "description":"哈哈哈",
              "musicurl":"http://zhxjmdc.applinzi.com/Wechat/Template/Music/NobodyListen.mp3",
              "hqmusicurl":"http://zhxjmdc.applinzi.com/Wechat/Template/Music/NobodyListen.mp3"
            }
        }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $tmpInfo;
    }
}
