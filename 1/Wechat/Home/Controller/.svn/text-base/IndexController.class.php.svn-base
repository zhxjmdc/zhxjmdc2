<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\WUserModel;
class IndexController extends Controller {
    protected $user;

    /**---------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->user = new WUserModel();
    }

    /**-----------------------------------------------------------------------------------
     * 接入微信订阅号
     */
    public function insert_wechat(){
        $wechat = new\Org\Wechat\wechatCallbackapiTest();

        if($_GET['echostr']){
            /*存在，接入操作*/
            $wechat->valid(C('TOKEN'));
        }else{
            /*不存在，接入后操作*/
            $this->responseMsg();
        }
    }


    /**-----------------------------------------------------------------------------------
     * 接入公众号后操作
     */
    public function responseMsg(){
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

            $fromUsername = $postObj->FromUserName;  //开发者微信号
            $toUsername   = $postObj->ToUserName;    //发送方帐号（一个OpenID）
            $keyword      = trim($postObj->Content); //用户关键字
            $time         = time();                  //系统时间
            $event        = $postObj->Event;         //获取事件类型
            $msgType      = $postObj->MsgType;       //用户发送的消息类型
            $eventKey     = $postObj->EventKey;      //与自定义菜单中的key的值
            $Recognition  = $postObj->Recognition;   //语音识别消息内容

            //创建自定义菜单
            echo $this->create_menu();

            //存入关注用户的基本信息
            $this->user_save_message((string)$fromUsername);

            //订阅事件 subscribe(订阅)、unsubscribe(取消订阅)推送文本消息
            if($event == 'subscribe'){
                $msgType    = "text";
                $contentStr = "欢迎关注救命稻草，回复123456获取信息\n1.文本消息\n2.图片消息\n3.语音消息\n4.视频消息\n5.音乐消息\n6.图文消息";

                //扫描参数二维码事件
                if(substr($eventKey,0,8) == 'qrscene_'){
                    $code = str_replace(qrscene_,'',$eventKey);
                    $contentStr.= "\n您的关注方式是参数二维码,所属参数:".$code;
                }

                $data = array(
                    'fromUsername' => $fromUsername,
                    'toUsername'   => $toUsername,
                    'time'         => $time,
                    'msgType'      => $msgType,
                    'contentStr'   => $contentStr
                );

                $this->send_user_message($data);
            }

            //接收用户消息
//            if(isset($msgType)){
//                switch ($msgType){
//                    case 'text':       $msgType = "text"; $contentStr = "你的文本消息已经收到！^_^"; break;
//                    case 'image':      $msgType = "text"; $contentStr = "你的图片已经收到！^_^"; break;
//                    case 'voice':      $msgType = "text"; $contentStr = "你的语音已经收到！^_^"; break;
//                    case 'shortvideo': $msgType = "text"; $contentStr = "你的小视频已经收到！^_^"; break;
//                    case 'location':   $msgType = "text"; $contentStr = "你的地理位置已经收到！^_^"; break;
//                    case 'link':       $msgType = "text"; $contentStr = "你的链接已经收到！^_^"; break;
//                }
//
//                $data = array(
//                    'fromUsername' => $fromUsername,
//                    'toUsername'   => $toUsername,
//                    'time'         => $time,
//                    'msgType'      => $msgType,
//                    'contentStr'   => $contentStr
//                );
//
//                $this->send_user_message($data);
//            }

            //语音识别
            if($msgType == 'voice' && isset($Recognition) && !empty($Recognition)){
                $msgType    = "text";
                $contentStr = $Recognition;
                $data = array(
                    'fromUsername' => $fromUsername,
                    'toUsername'   => $toUsername,
                    'time'         => $time,
                    'msgType'      => $msgType,
                    'contentStr'   => $contentStr
                );
                $this->send_user_message($data);
            }

            //$keyword关键字回复消息1.文本消息,2.图片消息,3.语音消息,4.视频消息,5.音乐消息,6.图文消息
            if(isset($keyword)){
                switch ($keyword){
                    case '1':
                        $msgType    = "text";
                        $contentStr = "今天你很赞!!!";
                        $data = array(
                            'fromUsername' => $fromUsername,
                            'toUsername'   => $toUsername,
                            'time'         => $time,
                            'msgType'      => $msgType,
                            'contentStr'   => $contentStr
                        ); break;
                    case '2':; break;
                    case '3':; break;
                    case '4':; break;
                    case '5':
                        $msgType    = "music";
                        $data = array(
                            'fromUsername' => $fromUsername,
                            'toUsername'   => $toUsername,
                            'time'         => $time,
                            'msgType'      => $msgType
                        ); break;
                    case '6':
                        $msgType    = "news";
                        $data = array(
                            'fromUsername' => $fromUsername,
                            'toUsername'   => $toUsername,
                            'time'         => $time,
                            'msgType'      => $msgType
                        ); break;
                }

                $this->send_user_message($data);
            }
        }else {
            echo "";
            exit;
        }
    }

    /**-----------------------------------------------------------------------------------
     * 向用户发送消息
     * @param array $data 发送消息数据
     */
    public function send_user_message($data){
        switch ($data['msgType']){
            //发送文本消息
            case 'text':
                $textTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <Content><![CDATA[%s]]></Content>
                <FuncFlag>0</FuncFlag>
                </xml>";

                $resultStr  = sprintf($textTpl, $data['fromUsername'], $data['toUsername'], $data['time'], $data['msgType'], $data['contentStr']);
                echo $resultStr; break;

            //图片消息
            case 'image':
                $textTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <Image>
                <MediaId></MediaId>
                </Image>
                </xml>";

                $resultStr  = sprintf($textTpl, $data['fromUsername'], $data['toUsername'], $data['time'], $data['msgType']);
                echo $resultStr; break;

            //语音消息
            case 'voice':; break;

            //视频消息
            case 'video':; break;

            //音乐消息
            case 'music':
                $textTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <Music>
                <Title>Nobody Listen</Title>
                <Description>推荐歌曲</Description>
                <MusicUrl>http://zhxjmdc.applinzi.com/Wechat/Template/Music/NobodyListen.mp3</MusicUrl>
                <HQMusicUrl>http://zhxjmdc.applinzi.com/Wechat/Template/Music/NobodyListen.mp3</HQMusicUrl>
                </Music>
                </xml>";
                /*<ThumbMediaId></ThumbMediaId>没有删除此节点*/

                $resultStr  = sprintf($textTpl, $data['fromUsername'], $data['toUsername'], $data['time'], $data['msgType']);
                echo $resultStr; break;

            //图文消息
            case 'news':
                $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <ArticleCount>2</ArticleCount>
                    <Articles>
                    <item>
                    <Title>微信公众平台开发一</Title> 
                    <Description>基本配置需求</Description>
                    <PicUrl>http://zhxjmdc.applinzi.com/Public/Images/a8.jpg</PicUrl>
                    <Url>http://zhxjmdc.applinzi.com/index.php/Home/Article/article_detail?arid=1</Url>
                    </item>
                    <item>
                    <Title>微信公众平台开发二</Title>
                    <Description>关注，关键字推送图文</Description>
                    <PicUrl>http://zhxjmdc.applinzi.com/Public/Images/a8.jpg</PicUrl>
                    <Url>http://zhxjmdc.applinzi.com/index.php/Home/Article/article_detail?arid=2</Url>
                    </item>
                    </Articles>
                    </xml>";

                $resultStr  = sprintf($textTpl, $data['fromUsername'], $data['toUsername'], $data['time'], $data['msgType']);
                echo $resultStr; break;

            default:;
        }
    }
    
    /**-----------------------------------------------------------------------------------
     * 创建自定义菜单
     */
    public function create_menu(){
        $access_token = $this->user->get_access_token();

        $data = '{
            "button": [
            {
                "name": "小功能", 
                "sub_button": [
                {
                    "type": "view", 
                    "name": "快递查询", 
                    "url" : "http://www.baidu.com"
                }, 
                {
                    "type": "click", 
                    "name": "线下活动", 
                    "key" : "jmdc"
                }]
            },
            {
                "type": "view", 
                "name": "下载app", 
                "url" : "http://www.baidu.com"
            },
            {
                "type": "view", 
                "name": "下载app", 
                "url" : "http://www.baidu.com"
            }]
        }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token);
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

    /**-----------------------------------------------------------------------------------
     * 存入用户基本信息
     * @param string $openid      用户openid(string转换)
     */
    public function user_save_message($openid){
        $ret         = $this->user->is_exist_user($openid);
        //拉取用户基本信息
        $userMessage = $this->getUserMessage($openid);

        if($ret == 0){
            //不存在,添加
            $this->user->add_user($userMessage);
        }else if($ret == 1){
            //已存在,更新
            $this->user->update_user($userMessage);
        }
    }
}