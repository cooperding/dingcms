<?php

/**
 * BaseAction.class.php
 * 前台页面公共方法
 * 前台核心文件，其他页面需要继承本类方可有效
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */
if(!C("ACCESS"))exit('Access Denied!');//猜一猜有什么用
class BaseAction extends Action {
    //初始化
    function _initialize()
    {
       // C('DEFAULT_THEME','default');
    }
    /*
    //重新装载$this->display()方法
    function display($name){
        if(empty($name)){
            //ACTION_NAME = $name;
            $name = ACTION_NAME;
        }
        //echo __ROOT__;
        //exit;
        parent::display('./Themes/'.C('DEFAULT_THEME').'/'.$name.'.html');
    }
*/
}
?>
