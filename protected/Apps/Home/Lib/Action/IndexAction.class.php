<?php

/**
 * IndexAction.class.php
 * 前台首页
 * 前台核心文件，其他页面需要继承本类方可有效
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */
class IndexAction extends BaseAction {

    public function index()
    {
        //C('DEFAULT_THEME','default');
        //echo C('DEFAULT_THEME');
        //exit;
        //define('DEFAULT_THEME', 'default');
        //$this->assign('url','default');
        //$this->assign('url2','./Tp/default/header.html');
        $this->display(':index');
        //$this->display();
    }

}