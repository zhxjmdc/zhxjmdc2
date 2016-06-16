<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title></title>
    <link href="/zhxjmdc/1/Admin/Template/Js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Admin/Template/Css/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/zhxjmdc/1/Admin/Template/Css/animate.css" rel="stylesheet">
    <link href="/zhxjmdc/1/Admin/Template/Css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div class="m-b-md">
                <img alt="image" class="img-circle circle-border" src="/zhxjmdc/1/Admin/Template/Images/a1.jpg">
            </div>
            <h3>JMDC</h3>
            <form class="m-t" role="form" action="<?php echo U('Home/Login/login');?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="password" placeholder="密码" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/zhxjmdc/1/Admin/Template/Js/jquery/jquery-2.1.1.min.js"></script>
    <script src="/zhxjmdc/1/Admin/Template/Js/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>