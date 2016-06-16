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
    
<style type="text/css">
  .emotion{width:42px; height:20px; background:url("/zhxjmdc/1/Public/Images/icon.gif") no-repeat 2px 2px; padding-left:20px; cursor:pointer}
  .emotion:hover{background-position:2px -28px}
  /*提示文字样式*/
  form.cmxform label.error, label.error {
    color: red;
  }
</style>

</head>

<body ondragstart="return false;">
    <div id="page">
        <div class="header">
            <a href="#menu" class="menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>
        
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
            
    <!-- 回到顶部 -->
    <div id="scrollTop" >
        <div class="level-2"></div>
        <div class="level-3"></div>
    </div>

    <div class="container middle">

      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 blog-main article-main">

          <div class="blog-post article">
            <h5 class="crumbs"><span>当前位置：首页》文章</span></h5>
            <div class="article-title"><h2 class="blog-post-title"><?php echo ($article["title"]); ?></h2></div>
            <div class="article-tips"><p class="blog-post-meta">
              <?php echo date("m-j-Y",$article['time'])?> by <?php echo ($article["author"]); ?></p></div>
            <div class="article-content">
              <p><?php echo ($article["content"]); ?></p>
            </div>
            <!--<div class="article-meta">-->
              <!--<p class="blog-post-meta">-->
                <!--转载请注明出处：<br/>-->
                <!--<span>救命稻草-&nbsp;Another blog post</span></p>-->
            <!--</div>-->
          </div><!-- /.blog-post -->
<!-- 评论弹窗 -->
          <div class="article-comment-btn">
            <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
             <i class="fa fa-plus"></i><span>评论</span>
            </a>
          </div>
          <div class="collapse" id="collapseExample">
            <div class="well article">
              <div class="article-title">
                <h4 class="blog-post-title">Comment</h4>
              </div>
              <!-- <div class="article-tips"><p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p></div> -->

              <div class="article-content form-horizontal">
                <form class="cmxform" id="commentForm" method="post" action="">
                  <div class="form-group">
                    <label class="col-sm-2 control-label article-comment-lable">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" id="username" placeholder="用户名..." required>
                      <input type="hidden" value="<?php echo ($article["arid"]); ?>" id="arid">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label article-comment-lable">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="email" placeholder="邮箱(不公开)..." required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label article-comment-lable">Content</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="content" id="content" rows="3" style="resize:none;" placeholder="说点什么吧..." required></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label article-comment-lable"></label>
                    <div class="col-sm-10 article-comment-send">
                      <span class="emotion"></span>
                      <button type="submit" class="sub_btn btn btn-info">Send</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

<!-- 回复弹窗 -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">            
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Response</h4>
            </div>
            <form class="cmxform" id="commentForm-two" method="post" action="">
            <div class="modal-body">
                <div class="form-group">
                  <label class="control-label">Username:</label>
                  <input type="text" class="form-control" name="sname" id="sname" placeholder="用户名...">
                  <input type="hidden" id='pcid'>
                </div>
                <div class="form-group">
                  <label class="control-label">Email:</label>
                  <input type="text" class="form-control" name="semail" id="semail" placeholder="邮箱(不公开)...">
                </div>
                <div class="form-group">
                  <label class="control-label">Content:</label>
                  <textarea class="form-control" name="scontent" id="scontent" placeholder="说点什么吧..." style="resize:none;"></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
            </form>
          </div>
          </div>
          </div>

<!-- 评论 -->
           <div class="blog-post article" id="article-comment">
            <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="row article-comment">
              <div class="col-sm-1"><img class="article-comment-img" src="<?php echo ($v["head_pic"]); ?>"></div>
              <div class="col-sm-11">
                <div class="article-comment-name">
                  <strong><?php echo ($v["name"]); ?></strong>
                  <span class="comment-response" onclick="response('<?php echo ($v["cid"]); ?>')" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" data-backdrop="false">
                    <i class="fa fa-commenting-o">&nbsp;回复</i>
                  </span>
                </div>
                <div class="article-comment-time">
                  <?php echo date("Y年 n月 j日 H:i",$v['time'])?>
                </div>
                <div class="article-comment-content">
                  <p><?php echo ($v["content"]); ?></p>
                </div>
              </div>
            </div>
            <hr id="son<?php echo ($v["cid"]); ?>" class="article-comment-hr">
            
<!-- ******************子****************************************************************** -->
            <?php if(is_array($v['son'])): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><div id="son<?php echo ($s["cid"]); ?>">
              <div class="row article-comment-son">
                <div class="col-sm-1"><img class="article-comment-img" src="<?php echo ($s["head_pic"]); ?>"></div>
                <div class="col-sm-11">
                  <div class="article-comment-name">
                    <strong><?php echo ($s["name"]); ?></strong>
                    <span class="comment-response" onclick="response('<?php echo ($s["cid"]); ?>')" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                      <i class="fa fa-commenting-o">&nbsp;回复</i>
                    </span>
                  </div>
                  <div class="article-comment-time">
                    <?php echo date("Y年 n月 j日 H:i",$s['time'])?>
                  </div>
                  <div class="article-comment-content">
                  <p><strong>@<?php echo ($s["parent"]); ?></strong><?php echo ($s["content"]); ?></p>
                </div>
                </div>
              </div>
              <hr class="article-comment-hr-son">
            </div><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
<!-- ******************子************************************************************************* -->
          </div>

          <!--<div class="comment-load-more"><a>加载更多...</a></div>-->

        </div><!-- /.blog-main -->
        <div class="col-sm-2"></div>
    </div><!-- /.row -->
  </div><!-- /.container -->

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

<script type="text/javascript">
  $(function(){
    $('.emotion').qqFace({
      id : 'facebox',
      assign:'content',
      path:'/zhxjmdc/1/Public/Js/plugins/qqFace/arclist/'	//表情存放的路径
    });
  });
  //查看结果
  function replace_em(str){
    str = str.replace(/\</g,'&lt;');
    str = str.replace(/\>/g,'&gt;');
    str = str.replace(/\n/g,'<br/>');
    str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/zhxjmdc/1/Public/Js/plugins/qqFace/arclist/$1.gif" border="0" />');
    return str;
  }

  function response(pcid){
      $('#pcid').val(pcid);
  }

  $().ready(function() {
    $("#commentForm").validate({
      rules: {
        email : {
          required: true,
          email   : true
        },
        username : {
          required: true,
        },
        content :{
          required: true,
        }
      },
      messages: {
        username : "请输入您的用户名",
        email    : "请输入正确的邮箱",
        content  : "内容不能为空"
      },
      submitHandler: function(form) {
        var url     = "<?php echo U('Home/Article/article_comment_add');?>";
        var content = replace_em($('#content').val());
        debugger
        articleComment(url,content);
      }
    });

    $("#commentForm-two").validate({
      rules: {
        semail : {
          required: true,
          email   : true
        },
        sname : {
          required: true,
        },
        scontent :{
          required: true,
        }
      },
      messages: {
        sname : "请输入您的用户名",
        semail    : "请输入正确的邮箱",
        scontent  : "内容不能为空"
      },
      submitHandler: function(form) {
        var url = "<?php echo U('Home/Article/article_comment_son_add');?>";
        articleResponse(url);
        $('#exampleModal').modal('hide');
      }
    });
  });
</script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>