<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\WAutoResponseModel;
use Home\Model\WSourceModel;
use Home\Model\WUserModel;

class WechatManageController extends Controller{
    protected $response;
    protected $source;
    protected $user;

    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct()
    {
        parent::__construct();
        $this->response = new WAutoResponseModel();
        $this->source   = new WSourceModel();
        $this->user     = new WUserModel();
    }

    /**---------------------------------------------------------------------------------------
     * 微信-素材管理-图文-显示页
     */
    public function image_text_source_page(){
        $this->display('Index/Wechat/sourceManage/image_text');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-素材管理-图片-显示页
     */
    public function image_source_page(){
        $access_token = $this->response->get_access_token();
        $url = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$access_token;
        $data = '{"type":"image","offset":"0","count":"20"}';
        $image_data = request($url, $data, 'POST');
        $image_data = json_decode($image_data,true);
        print_r($image_data);
//        $this->display('Index/Wechat/sourceManage/image');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-素材管理-语音-显示页
     */
    public function voice_source_page(){

        $this->display('Index/Wechat/sourceManage/voice');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-素材管理-视频-显示页
     */
    public function video_source_page(){

        $this->display('Index/Wechat/sourceManage/video');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-素材管理-语音新建-显示页
     */
    public function create_voice_page(){

        $this->display('Index/Wechat/sourceManage/video');
    }

    /**---------------------------------------------------------------------------------------
     * 微信-素材管理-视频新建-显示页
     */
    public function create_video_page(){

        $this->display('Index/Wechat/sourceManage/video');
    }

    public function get_source_count(){
        $access_token = $this->response->get_access_token();
        $url = 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token='.$access_token;
        $source_count = request($url, '', 'GET');
        print_r($source_count);
    }

    /**
     * 上传永久素材
     */
    public function upload_perpetual_source(){
        //上传本地文件夹
        $config = array(
                 'maxSize'    =>    3145728,
                 'rootPath'   =>    'Admin/Template',
                 'savePath'   =>    '/Uploads/',
                 'saveName'   =>    array('uniqid',''),
                 'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                 'autoSub'    =>    false,
                 'subName'    =>    array('date','Ymd')
             );
        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传单个文件
        $info   =   $upload->uploadOne($_FILES['name']);
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            // 上传成功 获取上传文件信息
            $type = $info['type'];
            $path = APP_PATH.'Template/Uploads/573971d4e1fec.JPG';
            $size = $info['size'];

            $file_info = array(
                'filename'     => $path, //相对于网站根目录的路径
                'content-type' => $type, //文件类型
                'filelength'   => $size  //图文大小
            );

            $access_token = $this->response->get_access_token();
            $url  = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token={$access_token}&type=image";
            $data = array("file" => "@{$path}", 'form-data' => $file_info);
            $image_data = request($url,$data,'POST');
            print_r($image_data);
        }
    }

    /**
     * 上传临时素材
     */
    public function add_temporary_source(){
        $path = APP_PATH.'/Template/Uploads/573971d4e1fec.JPG';
        $file_info = array(
            'filename' => $path, //国片相对于网站根目录的路径
            'content-type' => 'image/jpg', //文件类型
            'filelength' => '82428' //图文大小
        );

        $access_token = $this->response->get_access_token();
        $url = "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token={$access_token}&type=image";
        $data = array("file" => "@{$path}", 'form-data' => $file_info);
        $image_data = request($url,$data,'POST');
        print_r($image_data);

    }

    public function aa(){
        $this->display('Index/upload');
    }



    public function add_material()
    {
        //上传本地文件夹
        $config = array(
            'maxSize' => 3145728,
            'rootPath' => 'Admin/Template',
            'savePath' => '/Uploads/',
            'saveName' => array('uniqid', ''),
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub' => false,
            'subName' => array('date', 'Ymd')
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传单个文件
        $info = $upload->uploadOne($_FILES['name']);
        if (!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        } else {
            // 上传成功 获取上传文件信息
            $type = $info['type'];
            $path = '/zhxjmdc/1/Admin/Template/Uploads/573971d4e1fec.JPG';
            $size = $info['size'];

            $file_info = array(
                'filename' => $path, //相对于网站根目录的路径
                'content-type' => $type, //文件类型
                'filelength' => $size  //图文大小
            );
            dump($file_info);
            $access_token = $this->response->get_access_token();
            $url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token={$access_token}&type=image";
            $real_path = "{$_SERVER['DOCUMENT_ROOT']}{$file_info['filename']}";

            $data = array("media" => "@{$real_path}", 'form-data' => $file_info);
            $a = request($url,$data,'POST');
            print_r($a);
        }
    }

    /**---------------------------------------------------------------------------------------
     * 微信-用户管理-用户列表显示页
     */
    public function user_list_page(){
        $this->display('Index/Wechat/userManage/user_list');
    }

    public function get_user_list(){
        $first_row = $_POST['page'];
        $user_data = $this->user->get_user_message('','all',$first_row);
        $this->ajaxReturn($user_data);
    }

    /*用户管理，通过用户openid获取用户基本信息*/
    public function getUserMessage(){
        $access_token = $this->response->get_access_token();

        $openid = 'oHvh3uOpilZUZEAh6-6sNJWVxrIs'; /*用户openid*/
        $lang   = 'zh_CN';                        /*zh_CN 简体，zh_TW 繁体，en 英语*/
        $url    = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang={$lang}";
        $data   = get_curl($url);

        $userMessage = json_decode($data,true);
        print_r($userMessage);
    }

    public function bb(){
        $a = M('W_user');
        $data = array(
            'openid'=>'qw',
            'subscribe'=>'1',
            'nickname'=>'q',
            'sex'=>'1',
            'city'=>'s',
            'country'=>'s',
            'province'=>'s',
            'language'=>'zh_CN',
            'headimgurl'=>' http://wx.qlogo.cn/mmopen/EpxEaORianuRIIvE3NTmne1dO6YRgttWiaYB6UIBJ4BYL9lprQzBibMUE0E70usnUUiblgLHxNeK1ILsSH0tUIvGcPZFzlIwiacKU/0',
            'subscribe_time'=>'q',
            'groupid'=>'0'
        );
        $a->data($data)->add();
    }
}