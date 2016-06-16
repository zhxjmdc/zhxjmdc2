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
    <link href="/zhxjmdc/1/Public/Js/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
    <link href="/zhxjmdc/1/Public/Css/home.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/article.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Js/plugins/highlight/styles/monokai-sublime.css" rel="stylesheet">
    
</head>

<body ondragstart="return false;">
    <div id="page">
        <div class="header">
            <a href="#menu" class="menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>
        
    <!-- 顶部图片 -->
    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/life_bg1.jpg">

        <div class="container" style="">
            <div class="row header-logo">
                <div class="col-sm-2"></div>
                <div class="col-sm-8"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/logo1.png"></div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        <div class="header-about">
            <div class="slide clearfix">
                <a href="#" class="btn facebook">
                    <i class="icons fa fa-facebook-official"></i>
                    <span class="text">Facebook</span>
                </a>

                <a href="#" class="btn Github">
                    <i class="icons fa fa-github" aria-hidden="true"></i>
                    <span class="text dd ">Github</span>
                </a>

                <a href="#" class="btn skype">
                    <span class="icons fa fa-weixin" aria-hidden="true"></span>
                    <span class="text dd ">Wechat</span>
                </a>

                <a href="#" class="btn gplus">
                    <i class="icons fa fa-google-plus-square" aria-hidden="true"></i>
                    <span class="text">Google +</span>
                </a>

                <a href="#" class="btn dribble">
                    <i class="icons fa fa-qq" aria-hidden="true"></i>
                    <span class="text dd ">QQ</span>
                </a>
            </div>
        </div>
        <div class="content">
            
<style type="text/css">
    .header{
        color:#fff;
    }
    .menu-btn:hover,.menu-btn:focus{
        color: #fff;
    }
</style>
<div class="life">
  <div class="container marketing">
      <?php if(is_array($jotting)): foreach($jotting as $key=>$v): ?><hr class="featurette-divider">
          <div class="row featurette">
              <div class="col-md-7">
                  <h3 class="featurette-heading"><?php echo date('Y-m-d H:i:s',$v['0']['time'])?></h3>
                  <p class="lead"><?php echo ($v['0']['content']); ?></p>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-3"><?php echo ($v['0']['path']); ?></div>
          </div>

          <hr class="featurette-divider">
          <div class="row featurette">
              <div class="col-md-7 col-md-push-3">
                  <h3 class="featurette-heading"><?php if(!empty($v['1']['time'])){ echo date('Y-m-d H:i:s',$v['1']['time']);}?></h3>
                  <p class="lead"><?php echo ($v['1']['content']); ?></p>
              </div>
              <div class="col-md-3 col-md-pull-7"><?php echo ($v['1']['path']); ?></div>
          </div><?php endforeach; endif; ?>
      <div class="page"><?php echo ($Page); ?></div>
      <div class="row">
        <div class="col-sm-12 life-content-footer"></div>
      </div>
  </div>
</div>

        </div>
        <nav id="menu">
            <ul>
                <li class="menu-top">
                    <h1>救命稻草</h1>
                    <img alt="image" class="img-circle" src="/zhxjmdc/1/Public/Images/a8.jpg">
                </li>
                <?php if(is_array($header)): foreach($header as $key=>$v): ?><li class="mm-column"><a href="/zhxjmdc/1/index.php/Index/<?php echo ($v["href"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
                <li class="mm-column">
                    <a><i class="fa fa-tags"></i>分类标签</a>
                    <ul>
                        <?php if(is_array($tags)): foreach($tags as $key=>$v): ?><li class="mm-column"><a href="<?php echo U('Index/article',array('aid'=>$v['aid']));?>"><?php echo ($v["typename"]); ?>&nbsp;&nbsp;(&nbsp;<?php echo ($v["article_count"]); ?>&nbsp;)</a></li><?php endforeach; endif; ?>
                    </ul>
                </li>
                <li class="mm-column">
                    <a><i class="fa fa-map-signs"></i>最新文章</a>
                    <ul>
                        <?php if(is_array($recent)): foreach($recent as $key=>$v): ?><li class="mm-column"><a href="<?php echo U('Article/article_detail',array('arid' =>$v['arid']));?>"><?php echo ($v['title']); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <span class="cd-top">Top</span>
</body>
<footer class="blog-footer footer">
    © 2016 by zhangxiang. All rights reserved.
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/zhxjmdc/1/Public/Js/jquery/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="/zhxjmdc/1/Public/Js/common/home.js"></script>
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
<script>
    hljs.initHighlightingOnLoad();
    jQuery(document).ready(function($){
        var offset = 300,
                offset_opacity = 1200,
                scroll_top_duration = 700,
                $back_to_top = $('.cd-top');

        $(window).scroll(function(){
            ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if( $(this).scrollTop() > offset_opacity ) {
                $back_to_top.addClass('cd-fade-out');
            }
        });

        $back_to_top.on('click', function(event){
            event.preventDefault();
            $('body,html').animate({
                        scrollTop: 0 ,
                    }, scroll_top_duration
            );
        });

    });
</script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>