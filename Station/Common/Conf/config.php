<?php
return array(
	//'配置项'=>'配置值'
    'MODULE_ALLOW_LIST' => array('Home','Jeffery','User'),  //允许访问的模块
    'DEFAULT_MODULE' => 'Jeffery', //默认模块
    'DEFAULT_CONTROLLER' => 'Index', //默认控制器
    'DEFAULT_ACTION' => 'index', // 默认操作名称
    'URL_MODEL' => '2', //URL_REWRIT模式
    'SESSION_AUTO_START' => true, //是否开启session

    'URL_HTML_SUFFIX'       =>  'html|shtml',  // URL伪静态后缀设置
  
    // 数据库连接 
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'station', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'root', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'fs_', // 数据库表前缀
);