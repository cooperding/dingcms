<?php

defined('THINK_PATH') or exit();
$array = require_once(dirname(THINK_PATH) . '/Config/config.php');
$miniConfig = array(
    'ACCESS' => TRUE,
    'DEFAULT_THEME' => 'default', //默认模板主题名
        //'TMPL_FILE_DEPR' => '/',//模板文件分隔符
        //'TMPL_TEMPLATE_SUFFIX' => '.html'
);
$array = array_merge($array, $miniConfig);
//print_r($miniConfig);

return $array;
?>