<?php if (!defined('THINK_PATH')) exit();?><style type="text/css" media="screen">
body{
    background-image:url(/zhxjmdc/1/Public/Images/body_1.jpg);
}	
</style>
<!DOCTYPE html>
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
<div class="guestbook">
	<header style="">guest.jpg
		<div class="container" style="">
		    <div class="row guest-header">
                <div class="col-sm-12">
                	<div class="col-sm-6"></div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2"></div>
			    </div>
			    <div class="col-sm-12">
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
			    </div>
			    <div class="col-sm-12">
                	<div class="col-sm-2"></div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
                	<div class="col-sm-4"></div>
                	<div class="col-sm-2">
                		<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/zhxjmdc/1/Public/Images/a3.jpg">
                	</div>
			    </div>
		    </div>
		</div>
	</header>

	<section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="/zhxjmdc/1/Public/Js/plugins/timeline/img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 1千万的千万的</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Jan 14</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<img src="/zhxjmdc/1/Public/Js/plugins/timeline/img/cd-icon-movie.svg" alt="Movie">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 2</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Jan 18</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="/zhxjmdc/1/Public/Js/plugins/timeline/img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 3</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Jan 24</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
				<img src="/zhxjmdc/1/Public/Js/plugins/timeline/img/cd-icon-location.svg" alt="Location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 4</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Feb 14</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
				<img src="/zhxjmdc/1/Public/Js/plugins/timeline/img/cd-icon-location.svg" alt="Location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 5</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Feb 18</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<img src="/zhxjmdc/1/Public/Js/plugins/timeline/img/cd-icon-movie.svg" alt="Movie">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Final Section</h2>
				<p>This is the content of the last section</p>
				<span class="cd-date">Feb 26</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
	</section> <!-- cd-timeline -->
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