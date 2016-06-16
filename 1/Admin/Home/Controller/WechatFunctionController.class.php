<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\WAutoResponseModel;
use Home\Model\WUserModel;

class WechatFunctionController extends WechatCommonController{
    protected $response;
    protected $user;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct()
    {
        parent::__construct();
        $this->response = new WAutoResponseModel();
        $this->user     = new WUserModel();
    }

    /**---------------------------------------------------------------------------------------
     * 微信-自动回复-显示页
     */
    public function auto_response_page(){
        $data = array(
            'auto' => 'active',
            'tpl' => 'source_response'
        );
        $this->assign($data)->display('Index/Wechat/autoResponse/auto_response');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-自动回复-显示页
     */
    public function text_response_page(){
        $data = array(
            'text' => 'active',
            'tpl' => 'source_response'
        );

        $this->assign($data)->display('Index/Wechat/autoResponse/auto_response');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-自动回复-显示页
     */
    public function keyword_response_page(){
        $data = array(
            'keyword' => 'active',
            'tpl'     => 'keyword_response',
        );
        $this->assign($data)->display('Index/Wechat/autoResponse/auto_response');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-自定义菜单-显示页
     */
    public function define_menu_page(){
        $data = array(
            'keyword' => 'active',
            'tpl' => 'keyword_response',
        );
        $this->assign($data)->display('Index/Wechat/defineMenu/define_menu');
    }

    public function loadtemp(){
        $type = trim(I('type'));
        if(!in_array($type,array('title','text','img','tpl','scene','follow')))
        {
            echo '错误的模板类型 T_T';
            exit;
        }
        $this->display('temp_'.$type);
    }

    /**---------------------------------------------------------------------------------------
     * 微信-被添加自动回复资源-添加
     * @param  string type    回复类型
     * @param  string content 回复内容
     */
    public function auto_response_save(){
        $params  = $_POST;
        $type    = $params['type'];
        $content = $params['content'];
        if(empty($type) || empty($content)){
            $this->ajaxReturn('0');
        }

        $ret = $this->response->auto_response_save($params);
        if($ret){
            $this->ajaxReturn('1');
        }else{
            $this->ajaxReturn('0');
        }
    }

    /**---------------------------------------------------------------------------------------
     * 微信-被添加自动回复资源-清空
     */
    public function auto_response_del(){
        $ret = $this->response->auto_response_del();
        if($ret){
            $this->ajaxReturn('1');
        }else{
            $this->ajaxReturn('0');
        }
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


    // 自定义接入后操作
    public function responseMsg(){
        //创建自定义菜单
//    	echo $this->createMenu();

        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        /*extract post data*/
        if (!empty($postStr)){
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

            $fromUsername = $postObj->FromUserName;  /*开发者微信号*/
            $toUsername   = $postObj->ToUserName;    /*发送方帐号（一个OpenID）*/
            $keyword      = trim($postObj->Content); /*用户关键字*/
            $time         = time();                  /*系统时间*/
            $event        = $postObj->Event;         /*获取事件类型*/
            $eventkey     = $postObj->EventKey;      /*获取事件关键字，对应报文key数据*/
            $msgType      = $postObj->MsgType;       /*用户发送的消息类型*/

            $textTpl = "<xml>
	                <ToUserName><![CDATA[%s]]></ToUserName>
	                <FromUserName><![CDATA[%s]]></FromUserName>
	                <CreateTime>%s</CreateTime>
	                <MsgType><![CDATA[%s]]></MsgType>
	                <Content><![CDATA[%s]]></Content>
	                <FuncFlag>0</FuncFlag>
	                </xml>";

            //扫描带参数二维码，公众号做出响应(分为关注和未关注两种情况)
//	        if($event == 'subscribe' && substr($eventkey, 0,8) == 'qrscene_'){
//	        	//未关注扫描，关注后触发本事件
//	        	//保存$eventkey的值区分不同二维码$eventkey = 'qrscene_生成二维码的数值'
            $msgType    = "text";
            $contentStr = "您之前未关注过本账号，并且扫描了带参数的二维码";
            $resultStr  = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
//	        }else if($event == 'SCAN'){
//	        	$msgType    = "text";
//			    $contentStr = "您之前关注过本账号，并且扫描了带参数的二维码";
//			    $resultStr  = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
//			    echo $resultStr;
//	        }

            //接入多客服
//	        if($keyword == '客服'){
//	        	$textTpl = "<xml>
//				    <ToUserName><![CDATA[%s]]></ToUserName>
//				    <FromUserName><![CDATA[%s]]></FromUserName>
//				    <CreateTime>%s</CreateTime>
//				    <MsgType><![CDATA[transfer_customer_service]]></MsgType>
//				 	</xml>";
//
//			    $resultStr  = sprintf($textTpl, $fromUsername, $toUsername, $time);
//			    echo $resultStr;
//	        }
            //大写CLICK
//		    if($event == 'CLICK' && $eventkey == "cjzc"){
//	            $msgType    = "text";
//			    $contentStr = "敬请期待mo-微笑";
//			    $resultStr  = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
//			    echo $resultStr;
//		    }
        }
    }

    /**-----------------------------------------------------------------------------------
     * 接入公众号后操作
     */
//    public function responseMsg(){
////        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
////
////        if (!empty($postStr)){
////            libxml_disable_entity_loader(true);
////            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
////
////            $fromUsername = $postObj->FromUserName;  //开发者微信号
////            $toUsername   = $postObj->ToUserName;    //发送方帐号（一个OpenID）
////            $keyword      = trim($postObj->Content); //用户关键字
////            $time         = time();                  //系统时间
////            $event        = $postObj->Event;         //获取事件类型
////            $msgType      = $postObj->MsgType;       //用户发送的消息类型
////            $eventKey     = $postObj->EventKey;      //与自定义菜单中的key的值
////            $Recognition  = $postObj->Recognition;   //语音识别消息内容
////
////            $object = array(
////                'fromUsername' => $fromUsername,
////                'toUsername'   => $toUsername,
////                'time'         => $time,
////                'msgType'      => $msgType,
////            );
////
////            //存入关注用户的基本信息
////            $this->user_save_message((string)$fromUsername);
////
////            //订阅事件 subscribe(订阅)、unsubscribe(取消订阅)推送文本消息
////            if($event == 'subscribe'){
////                $contentStr = $this->response->get_auto_response();
////                $this->send_user_text($object,$contentStr);
////            }
////        }else {
////            echo "";
////            exit;
////        }
//        //get post data, May be due to the different environments
//        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//
//        //extract post data
//        if (!empty($postStr)){
//            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
//               the best way is to check the validity of xml by yourself */
//            libxml_disable_entity_loader(true);
//            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
//            $fromUsername = $postObj->FromUserName;
//            $toUsername = $postObj->ToUserName;
//            $keyword = trim($postObj->Content);
//            $time = time();
//            $textTpl = "<xml>
//							<ToUserName><![CDATA[%s]]></ToUserName>
//							<FromUserName><![CDATA[%s]]></FromUserName>
//							<CreateTime>%s</CreateTime>
//							<MsgType><![CDATA[%s]]></MsgType>
//							<Content><![CDATA[%s]]></Content>
//							<FuncFlag>0</FuncFlag>
//							</xml>";
//            if(!empty( $keyword ))
//            {
//                $msgType = "text";
//                $contentStr = "Welcome to wechat world!";
//                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
//                echo $resultStr;
//            }else{
//                echo "Input something...";
//            }
//
//        }else {
//            echo "";
//            exit;
//        }
//    }

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

    public function aa(){
        $data = $this->response->get_auto_response();
        print_r($data);
    }
}