<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Model\ArticleModel;
use Home\Model\ArticletypeModel;

class ArticleController extends CommonController {
    protected $article;
    protected $articletype;


    /**---------------------------------------------------------------------------------------
     * 构造方法，实例化操作模型
     */
    public function __construct() {
        parent::__construct();
        $this->article = new ArticleModel();
        $this->articletype = new ArticletypeModel();
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章列表显示页
     * @return [type] [description]
     */
    public function article_list_page(){
        $article_data = $this->article->get_article('all','','1');

        $data = array(
            'article' => $article_data['article']
            );

        $this->assign($data)->display('Index/Article/article_list');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章列表-移至草稿箱操作
     * @param [int]    $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_drafts(){
        $arid = I('get.arid');
        $ret = $this->article->article_drafts($arid);

        $this->redirect('Home/Article/article_drafts_page');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章添加显示页
     * @return [type] [description]
     */
    public function article_add_page(){
        $group_type_data = $this->article->group_article();

        $data = array(
            'grouptype' => $group_type_data
            );

        $this->assign($data)->display('Index/Article/article_add');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章添加操作
     * @param [string] $[title]    [栏目标题]
     * @param [string] $[content]  [文章内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[describe] [文章描述]
     * @param [string] $[path]     [配图文件名]
     * @return [type] [description]
     */
    public function article_add(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['time'])){
            $params['time'] = time();      
        }else{
            $params['time'] = strtotime($params['time']);
        }

        if(empty($params['author'])){
            $params['author'] = C('DEFAULT_AUTHOR');      
        }else if(empty($params['path'])){
            $params['path'] = '';
        }

        $ret = $this->article->article_add($params);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章添加并保存到草稿箱操作
     * @param [string] $[title]    [栏目标题]
     * @param [string] $[content]  [文章内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[describe] [文章描述]
     * @return [type] [description]
     */
    public function article_add_drafts(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['time'])){
            $params['time'] = time();      
        }else{
            $params['time'] = strtotime($params['time']);
        }

        if(empty($params['author'])){
            $params['author'] = C('DEFAULT_AUTHOR');      
        }
        //存为草稿箱
        $params['status'] = '0';

        $ret = $this->article->article_add($params);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章删除操作
     * @param [int] $[ari] [文章arid]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function article_del(){
        $arid = I('post.arid');
        $ret = $this->article->article_del($arid);
        
        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章修改显示页
     * @return [type] [description]
     */
    public function article_edit_page(){
        $arid = I('get.arid');
        $group_type_data = $this->article->group_article();      //无限极分类
        $article_data = $this->article->get_Article('one', $arid);
        //配图地址拼接
        $article_data['article']['path'] = C('QINIU_HOST').$article_data['article']['path'];
        $data = array(
            'article'  => $article_data['article'],
            'grouptype'=> $group_type_data
            );

        $this->assign($data)->display('Index/Article/article_edit');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章修改操作
     * @param [int]    $[arid]     [文章arid]
     * @param [string] $[title]    [栏目标题]
     * @param [string] $[content]  [文章内容]
     * @param [string] $[author]   [作者]
     * @param [string] $[time]     [发布时间]
     * @param [string] $[describe] [文章描述]
     * @param [string] $[path]     [配图路径]
     * @param [int]    $[aid]      [分类]
     * @return [type] [description]
     */
    public function article_edit(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['time'])){
            $params['time'] = time();      
        }else{
            $params['time'] = strtotime($params['time']);
        }

        if(empty($params['path'])){
            $params['path'] = '';
        }
        $ret = $this->article->article_edit($params);

        if($ret == 1){
            $url = U('Home/Article/article_edit_page',array('arid'=>$params['arid']));
            $this->ajaxReturn($url);
        }else{
            $this->ajaxReturn($ret);
        }
    }


    /**-----------------------------------------------------------------------------------
     * 文章-文章分类显示页
     * @return [grouptype] [无限级分类列表]
     * @return [type]      [分类详细信息]
     */
    public function article_type_page(){
        //无限极分类
        $group_type_data = $this->article->group_article();

        //分类文章数量
        $type_data       = $this->articletype->get_type('all');

        foreach ($type_data as $key => $value) {
            foreach ($value as $k => $v) {       
                if($k == 'article'){
                    // 文章数量
                    $value['article_count'] = count($value[$k]);
                    unset($value[$k]);
                }else if($k == 'img'){
                    // 分类配图地址拼接
                    $value['img'] = C('QINIU_HOST').$value['img'];
                }
            }
            $type_data[$key] = $value;
        }

        $data = array(
            'type'    => $type_data,
            'grouptype' => $group_type_data
            );
        $this->assign($data)->display('Index/Article/article_type');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章分类添加操作
     * @param [int]    $[pid]      [分类父节点]
     * @param [string] $[img]      [分类配图]
     * @param [string] $[typename] [分类名称]
     * @param [string] $[alias]    [分类别名]
     * @param [string] $[describe] [分类描述]
     * @return [type] [description]
     */
    public function article_type_add(){
        $params = $_POST;

        $this->article->article_type_add($params);

        $this->redirect('Home/Article/article_type_page');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章内容-图片上传
     * @return [type] [description]
     */
    public function article_upload_img(){
        //本地文件夹
        // $config = array(   
        //         'maxSize'    =>    3145728, 
        //         'rootPath'   =>    'Admin/Template',
        //         'savePath'   =>    '/Uploads/',
        //         'saveName'   =>    array('uniqid',''), 
        //         'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
        //         'autoSub'    =>    false,   
        //         'subName'    =>    array('date','Ymd')
        //     );
        // $upload = new \Think\Upload($config);// 实例化上传类    
        // // 上传单个文件   
        // $info   =   $upload->uploadOne($_FILES['file']);    
        // if(!$info) {
        //     // 上传错误提示错误信息        
        //     $this->error($upload->getError());    
        // }else{
        //     // 上传成功 获取上传文件信息         
        //     echo $info['savepath'].$info['savename'];   
        // }
        
        //上传到七牛
        $setting = C('UPLOAD_SITEIMG_QINIU');
        $Upload = new \Think\Upload($setting);
        $info = $Upload->upload($_FILES);
        //七牛地址
        $image_url = C('QINIU_HOST').strtr($info['file']['savepath'],"/","_").$info['file']['savename'];
        echo $image_url;
    }

    /**-----------------------------------------------------------------------------------
     * 文章-图片上传
     * @return [type] [description]
     */
    public function upload_img(){
        $setting = C('UPLOAD_SITEIMG_QINIU');
        $Upload = new \Think\Upload($setting);
        $info = $Upload->upload($_FILES);
        //七牛上传文件名
        $file_name = strtr($info['file']['savepath'],"/","_").$info['file']['savename'];
        echo $file_name;
    }

    //获取七牛上传token
    public function qiniu_token(){
        $up = new\Think\Upload\Driver\Qiniu\QiniuStorage();
        $ak = '0RzEqJq_NkgzReivmRoBHaO3mNcOwvQtXGz_GG1Z';
        $sk = '3hof6bdvBERz4Z_nhR2cuIrkgdUwlBQwMH_C9T9T';
        $up_token = $up->UploadToken($sk ,$ak ,$param);
        print_r($up_token);
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章分类-图片删除操作
     * @return [type] [description]
     */
    public function type_img_del(){
        //本地文件删除
        // $file_path = I('post.path');
        // if(unlink('Admin'.$file_path)){
        //     $this->ajaxReturn(1);
        // }else{
        //     $this->ajaxReturn(0);
        // }
        //七牛删除单个文件（file文件名）
        $file = I('post.file');
        $up = new\Think\Upload\Driver\Qiniu\QiniuStorage();
        $ret = $up->del($file);
        print_r($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章分类删除操作
     * @param [int]    $[aid]      [分类id]
     * @return [type] [description]
     */
    public function article_type_del(){
        $aid = I('post.aid');
        $ret = $this->article->article_type_del($aid);
        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章分类编辑显示页
     * @param [int]    $[aid]      [分类id]
     * @return [type] [description]
     */
    public function article_type_edit_page(){
        $aid = I('get.aid');
        $group_type_data = $this->article->group_article();      //无限极分类
        $type_data = $this->articletype->get_type('one', $aid);  //分类信息
        //地址拼接
        $type_data['img'] = C('QINIU_HOST').$type_data['img'];
        //获取父级分类名称
        if($type_data['pid'] == 0){
            $type_data['top_name'] = "无";
        }else{
            $type_top_name = $this->articletype->get_type('one', $type_data['pid']);
            $type_data['top_name'] = $type_top_name['typename'];
        }

        $data = array(
            'type'      => $type_data,
            'grouptype' => $group_type_data
            );

        $this->assign($data)->display('Index/Article/article_type_edit');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章分类编辑操作
     * @param [int]    $[pid]      [分类父节点]
     * @param [string] $[img]      [分类配图]
     * @param [string] $[typename] [分类名称]
     * @param [string] $[alias]    [分类别名]
     * @param [string] $[describe] [分类描述]
     * @return [type] [description]
     */
    public function article_type_edit(){
        $params = $_POST;
        $ret = $this->article->article_type_edit($params);

        $this->redirect('Home/Article/article_type_page');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章草稿箱显示页
     * @return [type] [description]
     */
    public function article_drafts_page(){
        $article_data = $this->article->get_Article('all','','0');

        $data = array(
            'article' => $article_data['article']
            );

        $this->assign($data)->display('Index/Article/article_drafts');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章草稿箱-重新发布操作
     * @param [int]    $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_publish(){
        $arid = I('get.arid');
        $ret = $this->article->article_publish($arid);

        $this->redirect('Home/Article/article_list_page');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章连载显示页
     * @return [type] [description]
     */
    public function article_serialize_page(){
        $serialize_data = $this->article->get_serialize('all');

        $this->assign('serialize',$serialize_data['serialize'])->display('Index/Article/article_serialize');
    }

    /**-----------------------------------------------------------------------------------
     * 文章-连载添加操作
     * @param [string] $[name]       [连载标题]
     * @param [string] $[create_time][发布时间]
     * @param [string] $[describe]   [连载描述]
     * @return [type] [description]
     */
    public function serialize_add(){
        $params = $_POST;

        // 日期默认服务器时间
        if(!checkDateIsValid($params['create_time'])){
            $params['create_time'] = time();      
        }else{
            $params['create_time'] = strtotime($params['create_time']);
        }

        $ret = $this->article->serialize_add($params);

        if($ret == 1){
            $this->ajaxReturn($ret);
        }else{
            $this->ajaxReturn($ret);
        }
    }

    /**-----------------------------------------------------------------------------------
     * 文章-文章连载删除操作
     * @param  [int] $[sid] [文章sid]
     * @return [int]   [1操作成功 0操作失败]
     */
    public function article_serialize_del(){
        $sid = I('post.sid');

        $ret = $this->article->article_serialize_del($sid);

        $this->ajaxReturn($ret);
    }

    /**-----------------------------------------------------------------------------------
     * 文章-添加/修改连载文章显示页
     * @return [type] [description]
     */
    public function serialize_edit_page(){
        $sid = I('get.sid');

        $serialize_data = $this->article->get_serialize('one', $sid);

        $group = $serialize_data['serialize']['group'];
        $article_data   = $this->article->get_serialize_article($group);

        $data = array(
            'serialize' => $serialize_data['serialize'],
            'article'   => $article_data['article']
            );

        
        $this->assign($data)->display('Index/Article/article_serialize_edit');
    }

    /**
     * 将文章移除该连载
     * @param [int] $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_serialize_remove(){
        $arid = I('post.arid');
        $sid  = I('post.sid');

        $ret  = $this->article->article_serialize_remove($sid,$arid);

        if($ret == 1){
            $url = U('Home/Article/serialize_edit_page',array('sid'=>$sid));
            $this->ajaxReturn($url);
        }else{
            $this->ajaxReturn($ret);
        }
    }

    /**-----------------------------------------------------------------------------------
     * 文章-连载添加新文章
     * @param [int] $[sid]  [文章sid]
     * @param [int] $[arid] [文章arid]
     * @return [type] [description]
     */
    public function article_serialize_add(){
        $params = $_POST;
        $sid    = $params['sid'];
        $arid   = $params['arid'];

        //数据检测
        if(is_int($arid) && is_int($sid)){
            $ret = $this->article->article_serialize_add($sid, $arid);

            if($ret == 1){
                $url = U('Home/Article/serialize_edit_page',array('sid'=>$sid));
                $this->ajaxReturn($url);
            }else{
                $this->ajaxReturn($ret);
            }
        }else{
            $this->ajaxReturn('0');
        }
    }  
}