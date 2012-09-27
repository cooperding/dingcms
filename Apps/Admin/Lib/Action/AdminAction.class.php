<?php
// +----------------------------------------------------------------------
// | DingCMS [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012- http://dingcms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 正侠客 <lookcms@gmail.com>
// +----------------------------------------------------------------------

/**
 * DingCMS 后台登录状态及权限认证
 * 主要用于后台登录状态及权限认证
 * @category   admin
 * @package  admin
 * @subpackage  admin Action
 * @author    正侠客 <lookcms@gmail.com>
 */

class AdminAction extends Action {
	
    /**
     * 登录状态验证
     * @access public
     * @return boolean
     */
	public function loginjudge(){
		$logged = session('LOGIN_STATUS');//取得session值
		if(empty($logged)||$logged!='TRUE'){
			$this->error('请登录后操作',__APP__.'/Login');
		}
	}
	
    /**
     * 权限状态验证
     * @access public
     * @return boolean
     */
	public function dojudge(){
		
		$logged = 'TRUE2';
		//$logged = $_SESSION['logged'];//取得session值
		if(empty($logged)||$logged!='TRUE'){
			$this->error('请登录后操作',__APP__.'/Login');
		}
	}
	
}
	//实例化Admin类
	$judge = new AdminAction();
	$judge->loginjudge();//登录状态验证
	//$judge->dojudge();//权限状态验证
	
