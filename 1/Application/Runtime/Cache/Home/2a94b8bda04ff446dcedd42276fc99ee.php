<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>演示：jQuery+PHP点击加载更多内容</title>
        <meta name="keywords" content="加载更多,loading" />
        <meta name="description" content="" />
        <link rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
        <style type="text/css">
            #more{margin:10px auto;width: 560px;  border: 1px solid #999;}               
            .single_item{padding: 20px; border-bottom: 1px dotted #d3d3d3;}
            .author{position: absolute; left: 0px; font-weight:bold; color:#39f}
            .date{position: absolute; right: 0px; color:#999}
            .content{line-height:20px; word-break: break-all;}
            .element_head{width: 100%; position: relative; height: 20px;}
            .get_more{margin:10px; text-align:center}
            .more_loader_spinner{width:20px; height:20px; margin:10px auto; background: url(loader.gif) no-repeat;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="demo">
                <div id="more">
                    <div class="single_item">
                        <div class="element_head">
                            <div class="date"></div>
                            <div class="author"></div>
                        </div>
                        <div class="title"></div>
                    </div>
                    <a href="javascript:;" class="get_more">::点击加载更多内容::</a>
                </div> 

            </div>
        </div>
        <div class="foot">
            Powered by sucaihuo.com  本站皆为作者原创，转载请注明原文链接：<a href="http://www.sucaihuo.com" target="_blank">www.sucaihuo.com</a>
        </div>
        <script type="text/javascript" src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js"></script> 
       <script src="/LSS/1/Public/Js/plugins/jquery.more.js"></script>
        <script type="text/javascript">
            $(function() {
                var url = "<?php echo U('Home/Article/click_get_more');?>";
                $('#more').more({'address': url,
                    'amount':'2'})
            });
        </script>
    </body>
</html>