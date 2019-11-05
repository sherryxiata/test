<?php
return array(
	//引入额外的配置
	'LOAD_EXT_CONFIG' => 'common',
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
		'__CSS__'          => __ROOT__.'/Public/css',
		'__JS__'           => __ROOT__.'/Public/js',
		'__IMG__'          => __ROOT__.'/Public/img',
		'__VENDOR__'       => __ROOT__.'/Public/vendor',
	),
	/* 数据库设置 */
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_NAME'   => 'test', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_HOST'   =>  '127.0.0.1', // 服务器地址
	'DB_PWD'    =>  '',          // 密码
	'DB_PORT'   => '3306', // 端口
	'DB_PREFIX' => '', // 数据库表前缀
);