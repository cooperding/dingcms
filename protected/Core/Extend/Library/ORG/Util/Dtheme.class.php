<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// |         lanfengye <zibin_5257@163.com>
// +----------------------------------------------------------------------

class Dtheme extends App {
    
    /**
     * 应用程序初始化
     * @access public
     * @return void
     */
    static public function init() {
        // 页面压缩输出支持
        if(C('OUTPUT_ENCODE')){
            $zlib = ini_get('zlib.output_compression');
            if(empty($zlib)) ob_start('ob_gzhandler');
        }
        // 设置系统时区
        date_default_timezone_set(C('DEFAULT_TIMEZONE'));
        // 加载动态项目公共文件和配置
        load_ext_file();
        // URL调度
        Dispatcher::dispatch();

        // 定义当前请求的系统常量
        define('NOW_TIME',      $_SERVER['REQUEST_TIME']);
        define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
        define('IS_GET',        REQUEST_METHOD =='GET' ? true : false);
        define('IS_POST',       REQUEST_METHOD =='POST' ? true : false);
        define('IS_PUT',        REQUEST_METHOD =='PUT' ? true : false);
        define('IS_DELETE',     REQUEST_METHOD =='DELETE' ? true : false);
        define('IS_AJAX',       ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || !empty($_POST[C('VAR_AJAX_SUBMIT')]) || !empty($_GET[C('VAR_AJAX_SUBMIT')])) ? true : false);

        // URL调度结束标签
        tag('url_dispatch');         
        // 系统变量安全过滤
        if(C('VAR_FILTERS')) {
            $filters    =   explode(',',C('VAR_FILTERS'));
            foreach($filters as $filter){
                // 全局参数过滤
                array_walk_recursive($_POST,$filter);
                array_walk_recursive($_GET,$filter);
            }
        }

        /* 获取模板主题名称 */
        $templateSet =  C('DEFAULT_THEME');
        
        if(C('TMPL_DETECT_THEME')) {// 自动侦测模板主题
            $t = C('VAR_TEMPLATE');
            if (isset($_GET[$t])){
                $templateSet = $_GET[$t];
            }elseif(cookie('think_template')){
                $templateSet = cookie('think_template');
            }
            if(!in_array($templateSet,explode(',',C('THEME_LIST')))){
                $templateSet =  C('DEFAULT_THEME');
            }
            cookie('think_template',$templateSet,864000);
        }
        /* 模板相关目录常量 */
        /* 获取模板主题名称 */
        $templateSet =  F('DOGOCMS_THEME');
        echo $templateSet;
        echo '22222<br/>';
        if(!isset($templateSet)){
            $templateSet =  C('DEFAULT_THEME');
        }
        define('THEME_NAME',   $templateSet);                  // 当前模板主题名称
        $group   =  defined('GROUP_NAME')?GROUP_NAME.'/':'';
        if(1==C('APP_GROUP_MODE')){ // 独立分组模式
            define('THEME_PATH',   BASE_LIB_PATH.basename(TMPL_PATH).'/'.(THEME_NAME?THEME_NAME.'/':''));
            define('APP_TMPL_PATH',__ROOT__.'/'.APP_NAME.(APP_NAME?'/':'').C('APP_GROUP_PATH').'/'.$group.basename(TMPL_PATH).'/'.(THEME_NAME?THEME_NAME.'/':''));
        }else{ 
            define('THEME_PATH',   TMPL_PATH.$group.(THEME_NAME?THEME_NAME.'/':''));
            define('APP_TMPL_PATH',__ROOT__.'/'.APP_NAME.(APP_NAME?'/':'').basename(TMPL_PATH).'/'.$group.(THEME_NAME?THEME_NAME.'/':''));
        }        

        C('CACHE_PATH',CACHE_PATH.$group);
        //动态配置 TMPL_EXCEPTION_FILE,改为绝对地址
        C('TMPL_EXCEPTION_FILE',realpath(C('TMPL_EXCEPTION_FILE')));
        return ;
    }

}
