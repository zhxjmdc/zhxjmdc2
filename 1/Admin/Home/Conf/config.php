<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'=> array(
		'__PUBLIC__' => __ROOT__.'/Admin/Template',
		),

	//数据库连接参数
	 'DB_TYPE'   =>'mysql',
	 'DB_HOST'   =>'127.0.0.1',
	 'DB_USER'   =>'root',
	 'DB_PWD'    =>'812010166',
	 'DB_NAME'   =>'jmdc',
	 'DB_PREFIX' =>'zhx_',
	
	//数据库连接参数
//    'SAE_MYSQL_USER'=>'nxoxjlmnok',
//    'SAE_MYSQL_PASS'=>'mzxlm15j12jy5k3zj52k23ljj2j2k0wk2yz25x2j',
//    'SAE_MYSQL_HOST_M'=>'zhx_zhxjmdc',
//    'SAE_MYSQL_HOST_S'=>'',
//    'SAE_MYSQL_PORT'=>'3307',
//    'SAE_MYSQL_DB'=>'Mysql',


	'SESSION_AUTO_START' =>'true',  //手动开启session
	'DEFAULT_AUTHOR' => "Jmdc",     // 静态数据

	/**
     * 七牛
     */
    'UPLOAD_SITEIMG_QINIU'  => array (
        'maxSize'      => 5 * 1024 * 1024,       //文件大小 
        'rootPath'     => './',   
        'saveName'     => array ('uniqid', ''),               
        'driver'       => 'Qiniu',                 
        'driverConfig' => array (
            'secretKey'    => '3hof6bdvBERz4Z_nhR2cuIrkgdUwlBQwMH_C9T9T',          
            'accessKey'    => '0RzEqJq_NkgzReivmRoBHaO3mNcOwvQtXGz_GG1Z',                         
            'domain'       => 'jmdcblog.qiniudn.com',                
            'bucket'       => 'jmdcblog'
        )             
    ),
    'QINIU_HOST'   => 'http://7xqkkh.com1.z0.glb.clouddn.com/',
	'TOKEN' => 'zhxjmdc',                           //微信接入token
	'APPID' => 'wx3baa722d40c17edf',                //appID
	'SECRET'=> 'd4624c36b6795d1d99dcf0547af5443d',  //appsecret
);