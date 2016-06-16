<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,user-scalable=no, minimum-scale=1.0, initial-scale=1.0,target-densitydpi=low-dpi" />
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="/zhxjmdc/1/Public/Images/favicon.ico">
<title></title>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
  <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Bootstrap core CSS -->
    <link href="/zhxjmdc/1/Public/Js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Js/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Js/font-awesome/css/font-awesome.min.css" rel="stylesheet" >

    <!-- Custom styles for this template -->
    <link href="/zhxjmdc/1/Public/Css/header.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/home.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/footer.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/sidebar.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Js/plugins/back_top/css/special.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/article.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/demo.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/life.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/search.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/guest.css" rel="stylesheet">

    <link href="/zhxjmdc/1/Public/Js/plugins/timeline/css/reset.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Js/plugins/timeline/css/timeline.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Public/Css/style.css" rel="stylesheet">

    <!-- 代码高亮 -->
    <link href="/zhxjmdc/1/Public/Js/plugins/highlight/styles/monokai-sublime.css" rel="stylesheet">
  </head>   
  <body ondragstart="return false;">
  <nav class="navbar navbar-default">
  <div class="container">
    <!-- <div class="navbar-header">
        <img alt="Brand" src="/zhxjmdc/1/Public/Images/logo.png">
    </div> -->

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand header-home" href="<?php echo U('Home/Index/index');?>">
        <img alt="Brand" src="/zhxjmdc/1/Public/Images/logo.png">
      </a>
    </div>

    <div class="collapse navbar-collapse header-column" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if(is_array($header)): foreach($header as $key=>$v): ?><li><a href="/zhxjmdc/1/index.php/Home/Index/<?php echo ($v["href"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <form action="<?php echo U('Home/Search/keyword_search');?>" method="post" onsubmit="return submitFn(this);">
              <div class="search-wrapper">
                  <div class="input-holder">
                      <input type="text" class="search-input" name="value" placeholder="Type to search" />
                      <button class="search-icon" type="submit" onclick="searchToggle(this, event);"><span></span></button>
                  </div>
                  <!--<span class="close" onclick="searchToggle(this, event);"></span>-->
                  <div class="result-container">

                  </div>
              </div>
          </form>
      </ul>
    </div>
  </div>
</nav>
  <script type="text/javascript">
      function searchToggle(obj, evt){
          var container = $(obj).closest('.search-wrapper');

          if(!container.hasClass('active')){
              container.addClass('active');
              evt.preventDefault();
          }
          else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
              container.removeClass('active');
              // clear input
              container.find('.search-input').val('');
              // clear and hide result container when we press close
              container.find('.result-container').fadeOut(100, function(){$(this).empty();});
          }
      }

      function submitFn(obj){
          debugger
          var value = $(obj).find('.search-input').val().trim();

          if(!value.length){
              _html = "请输入您要搜索的关键字";
              $(obj).find('.result-container').html('<span style="color:#FF9C9C;">' + _html + '</span>');
              $(obj).find('.result-container').fadeIn(100);
              setTimeout(function(){
                  $(obj).find('.result-container').html('');
                  $(obj).find('.result-container').fadeIn(100);
              },2000);
              return false;
          }else{
              return true;
          }
      }
  </script>
<style type="text/css">
  @media screen and (max-width: 776px){
     #fontzoom>img{
      margin-top: 0px!important;
     }
  }
</style>
<div class="demo">
  <!-- 顶部图片 -->
  <div class="demo-box">
    <div class="container">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <h2><i class="fa fa-share-square-o"></i>&nbsp;SHARE</h2>
          <ul class="nav nav-tabs demo-box-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                <h4>Php</h4>
              </a>
            </li>
            <li role="presentation">
              <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                <h4>Java</h4>
              </a>
            </li>
            <li role="presentation">
              <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                <h4>JQuery</h4>
              </a>
            </li>
            <li role="presentation">
              <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                <h4>Css3</h4>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
  </div>

  <div class="demo-box3">
    <div class="container">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <ul class="tips">
            <li>JMDC &nbsp; / &nbsp;</li>
            <li>Blog</li>
          </ul>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
  </div>

  <div class="demo-box2">
    <div class="container">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">

              <?php if(is_array($share)): foreach($share as $key=>$v): ?><div class="demo-content">
                  <div class="demo-content-left">
                    <span><?php echo ($v["sid"]); ?></span>
                  </div>
                  <div class="demo-content-right">
                    <h3><i class="fa fa-sort-amount-asc"></i>&nbsp;<strong><?php echo date('Y-m-d',$v['time_stamp'])?></strong></h3>
                    <p>提取码:<?php echo ($v["code"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($v["describe"]); ?></p>
                    <div class="demo-download"><a href="<?php echo ($v["path"]); ?>"><i class="fa fa-download"></i>下载</a></div>
                    <hr/>
                  </div>
                </div><?php endforeach; endif; ?>

            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
              <?php if(is_array($share)): foreach($share as $key=>$v): ?><div class="demo-content">
                  <div class="demo-content-left">
                    <span><?php echo ($v["sid"]); ?></span>
                  </div>
                  <div class="demo-content-right">
                    <h3><i class="fa fa-sort-amount-asc"></i>&nbsp;<strong><?php echo date('Y-m-d',$v['time_stamp'])?></strong></h3>
                    <p>提取码:<?php echo ($v["code"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($v["describe"]); ?></p>
                    <div class="demo-download"><a href="<?php echo ($v["path"]); ?>"><i class="fa fa-download"></i>下载</a></div>
                    <hr/>
                  </div>
                </div><?php endforeach; endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
              <?php if(is_array($share)): foreach($share as $key=>$v): ?><div class="demo-content">
                  <div class="demo-content-left">
                    <span><?php echo ($v["sid"]); ?></span>
                  </div>
                  <div class="demo-content-right">
                    <h3><i class="fa fa-sort-amount-asc"></i>&nbsp;<strong><?php echo date('Y-m-d',$v['time_stamp'])?></strong></h3>
                    <p>提取码:<?php echo ($v["code"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($v["describe"]); ?></p>
                    <div class="demo-download"><a href="<?php echo ($v["path"]); ?>"><i class="fa fa-download"></i>下载</a></div>
                    <hr/>
                  </div>
                </div><?php endforeach; endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
              <?php if(is_array($share)): foreach($share as $key=>$v): ?><div class="demo-content">
                  <div class="demo-content-left">
                    <span><?php echo ($v["sid"]); ?></span>
                  </div>
                  <div class="demo-content-right">
                    <h3><i class="fa fa-sort-amount-asc"></i>&nbsp;<strong><?php echo date('Y-m-d',$v['time_stamp'])?></strong></h3>
                    <p>提取码:<?php echo ($v["code"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($v["describe"]); ?></p>
                    <div class="demo-download"><a href="<?php echo ($v["path"]); ?>"><i class="fa fa-download"></i>下载</a></div>
                    <hr/>
                  </div>
                </div><?php endforeach; endif; ?>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>

      <div class="row">
        <div class="col-sm-12 demo-content-footer"></div>
      </div>
    </div>
  </div>

</div>
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
  <script src="/zhxjmdc/1/Public/Js/swiper/js/swiper.jquery.min.js"></script>
  <script src="/zhxjmdc/1/Public/Js/swiper/js/swiper.min.js"></script>
  <script src="/zhxjmdc/1/Public/Js/common/home.js"></script>
  <script src="/zhxjmdc/1/Public/Js/pic-adapt/pic_adapt.js"></script>
  <script src="/zhxjmdc/1/Public/Js/plugins/jquery.more.js"></script>
  <script src="/zhxjmdc/1/Public/Js/plugins/back_top/js/mumayi_top.js"></script>
  <script src="/zhxjmdc/1/Public/Js/plugins/validate/jquery.validate.min.js"></script>
  <script src="/zhxjmdc/1/Public/Js/plugins/timeline/js/modernizr.js"></script>
  <script src="/zhxjmdc/1/Public/Js/plugins/timeline/js/main.js"></script>
  <script src="/zhxjmdc/1/Public/Js/plugins/highlight/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>