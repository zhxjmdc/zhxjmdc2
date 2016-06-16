<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,user-scalable=no, minimum-scale=1.0, initial-scale=1.0,target-densitydpi=low-dpi" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/zhxjmdc/1/Public/Images/favicon.ico">
    <title></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link type="text/css" rel="stylesheet" href="/zhxjmdc/1/Public/Css/style.css" />
    <link type="text/css" rel="stylesheet" href="/zhxjmdc/1/Public/Css/jquery.mmenu.css" />

    <link href="/zhxjmdc/1/Public/Js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="/zhxjmdc/1/Public/Js/swiper/css/swiper.min.css" rel="stylesheet">-->
    <link href="/zhxjmdc/1/Public/Js/font-awesome/css/font-awesome.min.css" rel="stylesheet" >

    <!-- Custom styles for this template -->
    <!--<link href="/zhxjmdc/1/Public/Css/header.css" rel="stylesheet">-->
    <link href="/zhxjmdc/1/Public/Css/home.css" rel="stylesheet">
    <!--<link href="/zhxjmdc/1/Public/Css/footer.css" rel="stylesheet">-->
    <!--<link href="/zhxjmdc/1/Public/Css/sidebar.css" rel="stylesheet">-->
    <!--<link href="/zhxjmdc/1/Public/Js/plugins/back_top/css/special.css" rel="stylesheet">-->
    <link href="/zhxjmdc/1/Public/Css/article.css" rel="stylesheet">
    <!--<link href="/zhxjmdc/1/Public/Css/demo.css" rel="stylesheet">-->
    <!--<link href="/zhxjmdc/1/Public/Css/life.css" rel="stylesheet">-->
    <!--<link href="/zhxjmdc/1/Public/Css/search.css" rel="stylesheet">-->
    <!--<link href="/zhxjmdc/1/Public/Css/guest.css" rel="stylesheet">-->

    <!--<link href="/zhxjmdc/1/Public/Js/plugins/timeline/css/reset.css" rel="stylesheet">-->
    <!--<link href="/zhxjmdc/1/Public/Js/plugins/timeline/css/timeline.css" rel="stylesheet">-->
    <!--<link href="/zhxjmdc/1/Public/Css/style.css" rel="stylesheet">-->

    <!-- 代码高亮 -->
    <link href="/zhxjmdc/1/Public/Js/plugins/highlight/styles/monokai-sublime.css" rel="stylesheet">
    
</head>

<body ondragstart="return false;">
    <div id="page">
        <div class="header">
            <a href="#menu"></a>
            Demo
        </div>
        <div class="container" style="">
            <div class="row guest-header">
                <div class="col-sm-1"></div>
                <div class="col-sm-9"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/logo1.png"></div>
                <div class="col-sm-1"></div>
            </div>
        </div>
        <div class="content">
            
            <p><strong>This is a demo.</strong><br />
                Click the menu icon to open the menu.</p>
            <p>For more demos, a tutorial, documentation and support, please visit <a href="http://mmenu.frebsite.nl" target="_blank">mmenu.frebsite.nl</a></p>
        </div>
        <nav id="menu">
            <ul>
                <li class="menu-top">
                    <!--<h1>救命稻草</h1>-->
                    <!--<img alt="image" class="img-circle" src="/zhxjmdc/1/Public/Images/a8.jpg">-->
                </li>
                <?php if(is_array($header)): foreach($header as $key=>$v): ?><li><a href="/zhxjmdc/1/index.php/Index/<?php echo ($v["href"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
                <li>
                    <a><i class="fa fa-tags"></i>分类标签</a>
                    <ul>
                        <?php if(is_array($tags)): foreach($tags as $key=>$v): ?><li><a href="<?php echo U('Index/article',array('aid'=>$v['aid']));?>"><?php echo ($v["typename"]); ?>(<?php echo ($v["article_count"]); ?>)</a></li><?php endforeach; endif; ?>
                    </ul>
                </li>
                <li>
                    <a><i class="fa fa-map-signs"></i>最新文章</a>
                    <ul>
                        <?php if(is_array($recent)): foreach($recent as $key=>$v): ?><li><a href="<?php echo U('Article/article_detail',array('arid' =>$v['arid']));?>"><?php echo ($v['title']); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</body>

<footer class="blog-footer footer">
    <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/zhxjmdc/1/Public/Js/jquery/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="/zhxjmdc/1/Public/Js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/zhxjmdc/1/Public/Js/jquery.mmenu.min.js"></script>
<script src="/zhxjmdc/1/Public/Js/plugins/jquery.more.js"></script>
<script type="text/javascript">
    $(function() {
        $('nav#menu').mmenu();
    });
</script>
<script src="/zhxjmdc/1/Public/Js/plugins/validate/jquery.validate.min.js"></script>
<script src="/zhxjmdc/1/Public/Js/plugins/qqFace/js/jquery.qqFace.js"></script>
<script src="/zhxjmdc/1/Public/Js/plugins/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>


<!--<script src="/zhxjmdc/1/Public/Js/jquery/jquery-1.9.1.min.js"></script>-->
<!--<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/bootstrap/js/bootstrap.min.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/swiper/js/swiper.jquery.min.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/swiper/js/swiper.min.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/common/home.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/pic-adapt/pic_adapt.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/jquery.more.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/back_top/js/mumayi_top.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/validate/jquery.validate.min.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/timeline/js/modernizr.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/timeline/js/main.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/highlight/highlight.pack.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/qqFace/js/jquery-browser.js"></script>-->
<!--<script src="/zhxjmdc/1/Public/Js/plugins/qqFace/js/jquery.qqFace.js"></script>-->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>