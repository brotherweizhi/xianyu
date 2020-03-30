<?php
return array(
	//'閰嶇疆椤�'=>'閰嶇疆鍊�'
	'URL_CASE_INSENSITIVE'=>true,
    'URL_MODEL'=>2,
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'127.0.0.1',
    'DB_NAME'=>'xianyu',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_PORT'=>3306,
    'DB_PREFIX'=>'tp_',
    'DB_CHARSET'=>'utf8',
    'URL_HTML_SUFFIX'=> '', //URL在伪静态模式下的后缀
    'URL_CASE_INSENSITIVE'=>true, //URL不区分大小写,如果希望url全小写,应为true,同时要把APP_DEBUG在入口文件设为false
    'URL_MODEL'=>2, //URL模式,2为rewrite模式(在pathinfo的基础上,进一步省略掉index.php文件名)
    'TMPL_FILE_DEPR'=>'_', //配置视图目录层级
    'TAGLIB_BEGIN'=>'[',
    'TAGLIB_END'=>']',
    'DB_PARAMS'=>array(\PDO::ATTR_CASE=>\PDO::CASE_NATURAL),
);