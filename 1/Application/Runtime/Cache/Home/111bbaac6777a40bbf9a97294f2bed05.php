<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,user-scalable=no, minimum-scale=1.0, initial-scale=1.0,target-densitydpi=low-dpi" />
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">
<title></title>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
  <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Bootstrap core CSS -->
  <link href="/LSS/1/Public/Js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="/LSS/1/Public/Js/jquery/jquery-1.9.1.min.js"></script>
  <script src="/LSS/1/Public/Js/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container marketing">
      <div class="row" id="weixin" style="margin-top:10px;">
        <div id="step2">
        </div>
      </div>

      <div class="row" id="main" style="display:none;">
        <div class="col-xs-6">
          <a href="http://openbox.mobilem.360.cn/index/d/sid/3214073"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/LSS/1/Public/Images/a.jpg"></a>
          安卓
        </div>
        <div class="col-xs-6">
          <a href=""><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/LSS/1/Public/Images/a.jpg"></a>
          苹果
        </div>
      </div>
  </div>
</body>
<script type="text/javascript">
function is_weixin(){
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)=="micromessenger") {
        return true;
    } else {
        return false;
    }
}
 
var browser={
    versions:function(){
      var u = navigator.userAgent, app = navigator.appVersion;
        return {
          trident: u.indexOf('Trident') > -1,
          presto: u.indexOf('Presto') > -1,
          webKit: u.indexOf('AppleWebKit') > -1,
          gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,
          mobile: !!u.match(/AppleWebKit.*Mobile.*/),
          ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
          android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,
          iPhone: u.indexOf('iPhone') > -1 ,
          iPad: u.indexOf('iPad') > -1,
          webApp: u.indexOf('Safari') == -1
       }
    }(),
    language:(navigator.browserLanguage || navigator.language).toLowerCase()
};
 

var  explorer = '<div class="col-xs-7" style="padding-right:0px;"><p>请安提示操作<br/>1.点击<br/>2. 在Safari中打开</p></div><div class="col-xs-5" style="padding-left:0px;padding-right:30px;"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/LSS/1/Public/Images/ss.jpg"></div>';

var Safari = '<div class="col-xs-7" style="padding-right:0px;"><p>请安提示操作<br/>1.点击<br/>2. 在浏览器中打开</p></div><div class="col-xs-5" style="padding-left:0px;padding-right:30px;"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="/LSS/1/Public/Images/ss.jpg"></div>';

function init(){
    if(is_weixin()){
        //weixin为提示使用浏览器打开的div
        document.getElementById("weixin").style.display="block";
        if(browser.versions.ios || browser.versions.iPhone || browser.versions.iPad){
            // document.getElementById("step2").innerHTML="请安提示操作<br/>1.点击<br/>2. 在Safari中打开";
            document.getElementById("step2").innerHTML=explorer;
        }else{
            // document.getElementById("step2").innerHTML="请安提示操作<br/>1.点击<br/>2. 在浏览器中打开";
            document.getElementById("step2").innerHTML=Safari;
        }
    }else{
        //下载页div
        document.getElementById("main").style.display="block";
        // window.location.href="http://openbox.mobilem.360.cn/index/d/sid/3214073";
    }
}
init();
</script>
</html>