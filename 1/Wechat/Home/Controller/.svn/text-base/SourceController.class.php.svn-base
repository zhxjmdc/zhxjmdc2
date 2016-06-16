<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\WUserModel;
class SourceController extends Controller
{
    protected $user;

    /**---------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct()
    {
        parent::__construct();
        $this->user = new WUserModel();
    }

    /**---------------------------------------------------------------------------
     * 上传素材显示页
     */
    public function upload_source_page(){
        $this->display('Index/upload');
    }

    /**---------------------------------------------------------------------------
     * 上传素材,媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb，主要用于视频与音乐格式的缩略图）
     * @param string type  上传的文件类型
     * @param array  files 上传的文件溜
     */
    public function upload_source(){
        $type  = I('post.type');
        $files = $_FILES;

        $config = array(
            'domain' => 'public',
            'rootPath'=> './'
        );
        $a = new \Think\Upload\Driver\Sae($config);
        $b = $a->save($files['name']);
        var_dump($b);
    }

    public function upload_wechat(){
        $name = '1.jpg';
        $type = 'image';
        $path = APP_PATH.'/Template/Images/1.jpg';
        $access_token = $this->user->get_access_token();
        $url  = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$access_token.'&type='.$type;

        $data = array('media'=>'@'.$path);

        $ret_json = request($url,$data,'POST');

        $ret_arr  = json_decode($ret_json,true);
        $ret_arr['name'] = $name;
        $ret = $this->user->save_source($ret_arr);
        
        print_r($ret);
    }
}