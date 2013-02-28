<?php

defined('THINK_PATH') or exit();
$array = require_once(dirname(THINK_PATH) . '/Config/config.php');
$miniConfig = array(
    'ACCESS' => TRUE,
    'DEFAULT_THEME' => 'default', //默认模板主题名
    //数据缓存设置
    //'DATA_CACHE_TIME'=>'',//数据缓存有效期 0表示永久缓存
    //'DATA_CACHE_COMPRESS'=>'',//数据缓存是否压缩缓存true false
    //'DATA_CACHE_CHECK'=>'',//数据缓存是否校验缓存true false
    //'DATA_CACHE_TYPE'=> '',//数据缓存类型 File、APC、Db、Memcache、Shmop、Sqlite、Redis、Eaccelerator和Xcache
    //'DATA_CACHE_PATH'=>'',//缓存路径设置 (仅对File方式缓存有效)
    //'DATA_CACHE_SUBDIR'=>'',//使用子目录缓存(仅对File方式缓存有效)
    //'DATA_PATH_LEVEL'=>''//子目录缓存级别(仅对File方式缓存有效)
        //'TMPL_FILE_DEPR' => '/',//模板文件分隔符
        //'TMPL_TEMPLATE_SUFFIX' => '.html'
);
$array = array_merge($array, $miniConfig);
//print_r($miniConfig);

return $array;
?>