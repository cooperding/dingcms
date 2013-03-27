<?php

defined('THINK_PATH') or exit();
$array = require_once(dirname(THINK_PATH) . '/Config/config.php');
$miniConfig = array(
    'ACCESS' => TRUE,
    'DEFAULT_THEME' => 'default', //默认模板主题名
    'TMPL_PATH' => '__ROOT__/aaa', //默认模板主题名
    //数据缓存设置
    /*
    'DATA_CACHE_TIME'=>'30',//数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS'=>true,//数据缓存是否压缩缓存true false
    'DATA_CACHE_CHECK'=>false,//数据缓存是否校验缓存true false
    'DATA_CACHE_TYPE'=> 'file',//数据缓存类型 File、APC、Db、Memcache、Shmop、Sqlite、Redis、Eaccelerator和Xcache
    'DATA_CACHE_PATH'=>'__APP__/html',//缓存路径设置 (仅对File方式缓存有效)
    'DATA_CACHE_SUBDIR'=>'',//true开启子目录缓存(仅对File方式缓存有效)
    'DATA_PATH_LEVEL'=>'',//子目录缓存级别(仅对File方式缓存有效)
        //'TMPL_FILE_DEPR' => '/',//模板文件分隔符
        //'TMPL_TEMPLATE_SUFFIX' => '.html'
    //
     * 
     */
    //静态缓存设置
    /*
    'HTML_CACHE_ON'=>true,
    'HTML_FILE_SUFFIX'=>'',
    'HTML_CACHE_TIME'=>'',
    'HTML_CACHE_RULES'=>array(),
     * 
     */
    //路由功能设置
    'URL_ROUTER_ON'=>''
);
$array = array_merge($array, $miniConfig);
//print_r($miniConfig);

return $array;
?>