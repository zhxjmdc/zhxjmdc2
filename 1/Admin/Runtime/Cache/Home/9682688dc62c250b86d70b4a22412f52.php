<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>JMDC</title>
    <link rel="icon" href="/zhxjmdc/1/Admin/Template/Images/favicon.ico">
    <link href="/zhxjmdc/1/Admin/Template/Js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Admin/Template/Css/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/zhxjmdc/1/Admin/Template/Js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <!-- 表格Data Tables -->
    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- 文件上传dropzone -->
    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- 文本编辑器 -->
    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <!-- 提示框 -->
    <link href="/zhxjmdc/1/Admin/Template/Js/tips/css/plug.css" rel="stylesheet">

    <link href="/zhxjmdc/1/Admin/Template/Css/plugins/z-tree/zTreeStyle.css" rel="stylesheet">


    <link href="/zhxjmdc/1/Admin/Template/Css/animate.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Admin/Template/Css/style.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Admin/Template/Css/wechat.css" rel="stylesheet">
    <script type="text/javascript">
        var columnDelUrl       = "<?php echo U('Home/Column/column_del');?>";
        var columnListUrl      = "<?php echo U('Home/Column/column_list_page');?>";
        var columnChangeStatus = "<?php echo U('Home/Column/column_change_status');?>";
        var columnOrderUrl     = "<?php echo U('Home/Column/column_order');?>";
        var articleAddUrl      = "<?php echo U('Home/Article/article_add');?>";
        var articleAddDraftsUrl= "<?php echo U('Home/Article/article_add_drafts');?>";
        var articleListUrl     = "<?php echo U('Home/Article/article_list_page');?>";
        var articleDelUrl      = "<?php echo U('Home/Article/article_del');?>";
        var articleEditUrl     = "<?php echo U('Home/Article/article_edit');?>";
        var removedTyleImg     = "<?php echo U('Home/Article/type_img_del');?>";
        var typeDelUrl         = "<?php echo U('Home/Article/article_type_del');?>";
        var typeListUrl        = "<?php echo U('Home/Article/article_type_page');?>";
        var draftsDelUrl       = "<?php echo U('Home/Article/article_del');?>";
        var draftsListUrl      = "<?php echo U('Home/Article/article_drafts_page');?>";
        var serializeAddUrl    = "<?php echo U('Home/Article/serialize_add');?>";
        var serializeUrl       = "<?php echo U('Home/Article/article_serialize_page');?>";
        var serializeDelUrl    = "<?php echo U('Home/Article/article_serialize_del');?>";
        var serializeArticleRemoveUrl = "<?php echo U('Home/Article/article_serialize_remove');?>";
        var serializeArticleAddUrl= "<?php echo U('Home/Article/article_serialize_add');?>";
        var commentNewUrl      = "<?php echo U('Home/Comment/comment_new_page');?>";
        var commentDelUrl      = "<?php echo U('Home/Comment/comment_del');?>";
        var commentWaitUrl     = "<?php echo U('Home/Comment/comment_wait_page');?>";
        var jottingAddUrl      = "<?php echo U('Home/Jotting/jotting_add');?>";
        var jottingListUrl     = "<?php echo U('Home/Jotting/jotting_list_page');?>";
        var jottingAddDraftsUrl= "<?php echo U('Home/Jotting/jotting_add_drafts');?>";
        var jottingDelUrl      = "<?php echo U('Home/Jotting/jotting_del');?>";
        var jottingDraftsListUrl="<?php echo U('Home/Jotting/jotting_drafts_page');?>";
        var jottingEditUrl     = "<?php echo U('Home/Jotting/jotting_edit');?>";
        var shareAddUrl        = "<?php echo U('Home/Share/share_add');?>";
        var shareListUrl       = "<?php echo U('Home/Share/share_list_page');?>";
        var shareDelUrl        = "<?php echo U('Home/Share/share_del');?>";
        var shareTypeDelUrl    = "<?php echo U('Home/Share/share_type_del');?>";
        var shareTypeListUrl   = "<?php echo U('Home/Share/share_type_page');?>";
        var autoResponseSaveUrl= "<?php echo U('Home/WechatFunction/auto_response_save');?>";
        var autoResponseDelUrl = "<?php echo U('Home/WechatFunction/auto_response_del');?>";
    </script>
</head>
<body>
    <div id="wrapper">
        <!-- sidebar -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">

                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="/zhxjmdc/1/Admin/Template/Images/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php define('DEFAULT_AUTHOR', $name); ?></strong>
                             </span> <span class="text-muted text-xs block">超级管理员 <b class="caret"></b></span> </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" id="menu">
                                <li><a href="form_avatar.html">修改头像</a></li>
                                <li><a href="<?php echo U('Home/Admin/bloger_message_page');?>">个人资料</a></li>
                                <li><a href="<?php echo U('Home/Index/login_out');?>">安全退出</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            JMDC
                        </div>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "Column"): ?>class="active"<?php endif; ?>>
                        <a href="index.html">
                            <i class="fa fa-th-large"></i>
                            <span class="nav-label">栏目</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li <?php if((ACTION_NAME) == "column_list_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Column/column_list_page');?>">栏目列表</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "column_add_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Column/column_add_page');?>">栏目添加</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "Article"): ?>class="active"<?php endif; ?>>
                        <a href="index.html">
                            <i class="fa fa-book"></i> 
                            <span class="nav-label">文章</span> 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li <?php if((ACTION_NAME) == "article_list_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Article/article_list_page');?>">文章列表</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "article_add_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Article/article_add_page');?>">文章添加</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "article_serialize_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Article/article_serialize_page');?>">文章连载</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "article_type_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Article/article_type_page');?>">分类管理</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "article_drafts_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Article/article_drafts_page');?>">草稿箱</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "Jotting"): ?>class="active"<?php endif; ?>>
                        <a href="index.html">
                            <i class="fa fa-paint-brush"></i>
                            <span class="nav-label">随笔</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li <?php if((ACTION_NAME) == "jotting_list_page"): ?>class="active"<?php endif; ?>>
                            <a href="<?php echo U('Home/Jotting/jotting_list_page');?>">随笔列表</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "jotting_add_page"): ?>class="active"<?php endif; ?>>
                            <a href="<?php echo U('Home/Jotting/jotting_add_page');?>">随笔添加</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "jotting_drafts_page"): ?>class="active"<?php endif; ?>>
                            <a href="<?php echo U('Home/Jotting/jotting_drafts_page');?>">草稿箱</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "Comment"): ?>class="active"<?php endif; ?>>
                        <a href="index.html#">
                            <i class="fa fa-comment"></i>
                            <span class="nav-label">评论</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li <?php if((ACTION_NAME) == "comment_new_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Comment/comment_new_page');?>">最新评论</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "comment_wait_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Comment/comment_wait_page');?>">等待回复</a>
                            </li>
                            <li <?php if((ACTION_NAME) == "comment_history_page"): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U('Home/Comment/comment_history_page');?>">历史评论</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "Share"): ?>class="active"<?php endif; ?>>
                    <a href="index.html#">
                        <i class="fa fa-share-square-o"></i>
                        <span class="nav-label">分享</span>
                        <span class="fa arrow"></span>
                    </a>

                    <ul class="nav nav-second-level">
                        <li <?php if((ACTION_NAME) == "share_list_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/Share/share_list_page');?>">资源列表</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "share_add_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/Share/share_add_page');?>">添加资源</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "share_type_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/Share/share_type_page');?>">资源分类</a>
                        </li>
                    </ul>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "WechatFunction"): ?>class="active"<?php endif; ?>>
                    <a href="index.html#">
                        <i class="fa fa-share-square-o"></i>
                        <span class="nav-label">微信功能</span>
                        <span class="fa arrow"></span>
                    </a>

                    <ul class="nav nav-second-level">
                        <li <?php if((ACTION_NAME) == "auto_response_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/WechatFunction/auto_response_page');?>">自动回复</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "define_menu_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/WechatFunction/define_menu_page');?>">自定义菜单</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "share_type_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/WechatFunction/share_type_page');?>">资源分类</a>
                        </li>
                    </ul>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "WechatManage"): ?>class="active"<?php endif; ?>>
                    <a href="index.html#">
                        <i class="fa fa-share-square-o"></i>
                        <span class="nav-label">微信管理</span>
                        <span class="fa arrow"></span>
                    </a>

                    <ul class="nav nav-second-level">
                        <li <?php if((ACTION_NAME) == "image_text_source_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/WechatManage/image_text_source_page');?>">素材管理</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "user_list_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/WechatManage/user_list_page');?>">用户管理</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "share_type_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/WechatManage/share_type_page');?>">消息管理</a>
                        </li>
                    </ul>
                    </li>
                    <li <?php if((CONTROLLER_NAME) == "Wechat"): ?>class="active"<?php endif; ?>>
                    <a href="index.html#">
                        <i class="fa fa-share-square-o"></i>
                        <span class="nav-label">微信统计</span>
                        <span class="fa arrow"></span>
                    </a>

                    <ul class="nav nav-second-level">
                        <li <?php if((ACTION_NAME) == "auto_response_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/Wechat/auto_response_page');?>">自动回复</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "share_add_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/Wechat/share_add_page');?>">自定义菜单</a>
                        </li>
                        <li <?php if((ACTION_NAME) == "share_type_page"): ?>class="active"<?php endif; ?>>
                        <a href="<?php echo U('Home/Wechat/share_type_page');?>">资源分类</a>
                        </li>
                    </ul>
                    </li>
                    <li class="">
                        <a href="index.html#">
                            <i class="fa fa-cog"></i>
                            <span class="nav-label">系统管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo U('Home/Index/comment_check');?>">基本参数</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">

<!-- header -->
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary"><i class="fa fa-bars"></i> </a>
                        <!--<form role="search" class="navbar-form-custom" method="post" action="search_results.html">-->
                            <!--<div class="form-group">-->
                                <!--<input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">-->
                            <!--</div>-->
                        <!--</form>-->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message"><a href="<?php echo U('Home/Index/index');?>" title="返回首页"><i class="fa fa-home"></i></a>JMDC个人博客-主页</span>
                        </li>
                        <!--<li class="dropdown">-->
                            <!--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">-->
                                <!--<i class="fa fa-envelope"></i> <span class="label label-warning">16</span>-->
                            <!--</a>-->
                            <!--<ul class="dropdown-menu dropdown-messages">-->
                                <!--<li>-->
                                    <!--<div class="dropdown-messages-box">-->
                                        <!--<a href="profile.html" class="pull-left">-->
                                            <!--<img alt="image" class="img-circle" src="img/a7.jpg">-->
                                        <!--</a>-->
                                        <!--<div class="media-body">-->
                                            <!--<small class="pull-right">46小时前</small>-->
                                            <!--<strong>小四</strong> 项目已处理完结-->
                                            <!--<br>-->
                                            <!--<small class="text-muted">3天前 2014.11.8</small>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</li>-->
                                <!--<li class="divider"></li>-->
                                <!--<li>-->
                                    <!--<div class="dropdown-messages-box">-->
                                        <!--<a href="profile.html" class="pull-left">-->
                                            <!--<img alt="image" class="img-circle" src="img/a4.jpg">-->
                                        <!--</a>-->
                                        <!--<div class="media-body ">-->
                                            <!--<small class="pull-right text-navy">25小时前</small>-->
                                            <!--<strong>国民岳父</strong> 这是一条测试信息-->
                                            <!--<br>-->
                                            <!--<small class="text-muted">昨天</small>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</li>-->
                                <!--<li class="divider"></li>-->
                                <!--<li>-->
                                    <!--<div class="text-center link-block">-->
                                        <!--<a href="mailbox.html">-->
                                            <!--<i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>-->
                                        <!--</a>-->
                                    <!--</div>-->
                                <!--</li>-->
                            <!--</ul>-->
                        <!--</li>-->
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                            <span class="pull-right text-muted small">4分钟前</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                                            <span class="pull-right text-muted small">12分钟钱</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>查看所有 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-out"></i> 退出
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>随笔管理</h2>
        <ol class="breadcrumb">
            <li><a href="index.html">随笔</a></li>
            <li><strong>随笔列表</strong></li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><small>随笔列表</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="table_data_tables.html#">选项1</a>
                            </li>
                            <li><a href="table_data_tables.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example column-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>作者</th>
                            <th>日期</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($jotting)): foreach($jotting as $key=>$v): ?><tr>
                                <td><?php echo ($v["jid"]); ?></td>
                                <td><?php echo ($v["author"]); ?></td>
                                <td><?php echo date('Y-n-j',$v['time'])?></td>
                                <td class="table-operate">
                                    <span style="color:#f00" onclick="jottingDel('<?php echo ($v["jid"]); ?>')">删除</span>
                                    <span><a href="<?php echo U('Home/Jotting/jotting_edit_page',array('jid' => $v['jid']));?>">修改</a></span>
                                    <span><a href="<?php echo U('Home/Jotting/jotting_add_page');?>">添加</a></span>
                                    <span onclick="preview('<?php echo ($v["jid"]); ?>')">预览</span>
                                    <span><a href="<?php echo U('Home/Jotting/jotting_drafts',array('jid' => $v['jid']));?>">移至草稿箱</a></span>
                                </td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>作者</th>
                            <th>日期</th>
                            <th>操作</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function preview(id){
        var url = "/zhxjmdc/1/index.php/Home/Article/article_detail?arid="+id;
        window.open(url);
    }
</script>
<!-- footer -->
            <div class="row">
                <div class="col-lg-12 footer">
                    <div class="pull-right">
                        By：<a href="http://www.zi-han.net" target="_blank">zihan's blog</a>
                    </div>
                    <div>
                        <strong>Copyright</strong> H+ &copy; 2014
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Mainly scripts -->
    <script src="/zhxjmdc/1/Admin/Template/Js/jquery/jquery-2.1.1.min.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/bootstrap/js/bootstrap.min.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/flot/jquery.flot.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/zhxjmdc/1/Admin/Template/Js/hplus.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/pace/pace.min.js"></script>

    <!-- SUMMERNOTE文本编辑器 -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/summernote/summernote.min.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/summernote/summernote-zh-CN.js"></script>
    
    <!-- Jvectormap -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- 表格Data Tables -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/dataTables/dataTables.bootstrap.js"></script>

   <!-- 日期Data picker -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- 表单验证Jquery Validate -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/validate/jquery.validate.min.js"></script>

    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/validate/messages_zh.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/zhxjmdc/1/Admin/Template/Js/demo/sparkline-demo.js"></script>

    <!-- 文件上传DROPZONE -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/dropzone/dropzone.js"></script>

    <!-- 图表Peity -->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity -->
    <script src="/zhxjmdc/1/Admin/Template/Js/demo/peity-demo.js"></script>
    <!-- 提示框 -->
    <script src="/zhxjmdc/1/Admin/Template/Js/tips/js/tips.js"></script>
    <!-- ajax函数 -->
    <script src="/zhxjmdc/1/Admin/Template/Js/ajax.js"></script>
    <!-- 自定函数集 -->
    <script src="/zhxjmdc/1/Admin/Template/Js/common.js"></script>
    <!--树-->
    <script src="/zhxjmdc/1/Admin/Template/Js/plugins/z-tree/jquery.ztree.core.min.js"></script>
</body>

</html>
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {
        // 表格初始化
        $('.dataTables-example').dataTable();
    });
</script>