<?php
return array(
	//'配置项'=>'配置值'
	
    //模板引擎配置
    'TMPL_ENGINE_TYPE' => 'smarty',
    'TMPL_ENGINE_CONFIG' => array(
        'left_delimiter' => '<{',
        'right_delimiter' => '}>',
    ),
	
    //数据库配置
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_PORT' => '3306',
    'DB_NAME' => 'chat',
    'DB_USER' => 'root',
    'DB_PWD' => 'foxconn88',
    'DB_PREFIX' => 'chat_',
    'DB_CHARSET' => 'utf8',
    
    //Cookie配置
    'COOKIE_PREFIX' => 'chat_',
    
    //模块配置
    'MULTI_MODULE' => false,
    'DEFAULT_MODULE' => 'Home',
    
    //success模板
    'TMPL_ACTION_SUCCESS' => 'User/jump',
    
    //加载扩展配置
    'LOAD_EXT_CONFIG' => 'server',
);