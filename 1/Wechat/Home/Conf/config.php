<?php
return array(
    //数据库连接参数
   'DB_TYPE'   =>'mysql',
   'DB_HOST'   =>'127.0.0.1',
   'DB_USER'   =>'root',
   'DB_PWD'    =>'812010166',
   'DB_NAME'   =>'jmdc',
   'DB_PREFIX' =>'zhx_',

	//'配置项'=>'配置值'
    // 'SAE_MYSQL_USER'  =>'nxoxjlmnok',
    // 'SAE_MYSQL_PASS'  =>'mzxlm15j12jy5k3zj52k23ljj2j2k0wk2yz25x2j',
    // 'SAE_MYSQL_HOST_M'=>'zhx_zhxjmdc',
    // 'SAE_MYSQL_HOST_S'=>'',
    // 'SAE_MYSQL_PORT'  =>'3307',
    // 'SAE_MYSQL_DB'    =>'Mysql',

    'TOKEN' => 'zhxjmdc',                           //微信接入token
    'APPID' => 'wx3baa722d40c17edf',                //appID
    'SECRET'=> 'd4624c36b6795d1d99dcf0547af5443d',  //appsecret

    'TMPL_PARSE_STRING'=> array(
        '__PUBLIC__'   => __ROOT__.'/WeChat/Template',
    ),

    'FILE_UPLOAD_TYPE'      =>  'Local',    // 文件上传方式
);
