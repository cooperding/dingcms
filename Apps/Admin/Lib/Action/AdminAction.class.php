<?php

/**
 * AdminAction.class.php
 * 后台登录状态及权限认证
 * 后台核心文件，其他控制器文件将使用该文件进行登录和权限判断
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0 
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 权限验证
 */
class AdminAction extends Action
{

    /**
     * loginjudge
     * 登录状态验证
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function loginjudge()
    {
        $logged = session('LOGIN_STATUS'); //取得session值
        if (empty($logged) || $logged != 'TRUE')
        {
            $this->error('请登录后操作', __APP__ . '/Login');
        }
    }

    /**
     * dojudge
     * 权限状态验证
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function dojudge()
    {

        $logged = 'TRUE2';
        //$logged = $_SESSION['logged'];//取得session值
        if (empty($logged) || $logged != 'TRUE')
        {
            $this->error('请登录后操作', __APP__ . '/Login');
        }
    }

}

//实例化Admin类
$judge = new AdminAction();
$judge->loginjudge(); //登录状态验证
	//$judge->dojudge();//权限状态验证
	
