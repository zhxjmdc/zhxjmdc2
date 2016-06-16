<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\WUserModel;
class QRCodeController extends Controller
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
     * 成不同的带参数的二维码(传入分组id,关注着自动归入到该分组)
     */
    public function get_QRCode(){
        $access_token = $this->user->get_access_token();
        /*输入scene_id的值,目前参数只支持1--100000相当于100000种*/
        $data = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": 100}}}';
        $url  = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$access_token;

        $qr_code = request($url,$data,'POST');
        $qr_code = json_decode($qr_code,true);
        return $qr_code['ticket'];
    }

    /**---------------------------------------------------------------------------
     * 生成二维码图片
     */
    public function echo_QRCode(){
        $ticket = $this->get_QRCode();
        /*获取二维码*/
        $url = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$ticket;

        $QRCode_img = request($url,'','GET');
        /*图片流设置格式，防止图片乱码*/
        header('Content-type: image/JPEG');
        /*输出二维码*/
        echo $QRCode_img;
    }
}