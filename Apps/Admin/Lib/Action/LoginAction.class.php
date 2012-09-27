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
 * DingCMS 后台登录页面
 * 主要用于后台登录操作验证
 * @category   admin
 * @package  admin
 * @subpackage  admin Action
 * @author    正侠客 <lookcms@gmail.com>
 */
class LoginAction extends Action {
	//进入登录页面
    public function index(){
		//此处判断是否已经登录，如果登录跳转到后台首页否则跳转到登录页面
		if(session('LOGIN_STATUS')=='TRUE'){
			$this->redirect('../'.APP_NAME);
		}else{
			$this->display();
		}
    }
    /**
     * 登录验证
     * @access public
     * @return boolean
     */
    public function dologin(){
		$ver_code = $_POST['vd_code'];
		$verify = session('verify');
		if(empty($ver_code)||md5($ver_code)!=$verify){
			$this->error('验证码为空或者输入错误！');
			exit;
		}
		$condition['username'] = $_POST['user_name'];
		$password = $_POST['user_password'];
		if(!empty($condition['username'])&&!empty($password)){//依据用户名查询
			$login = M('Operators');
			$rs = $login->where($condition)->find();
			if($rs){//对查询出的结果进行判断
				$password = md5(md5($condition['username']).sha1($password.$rs['creat_time']));
				if($password == $rs['password']){//判断密码是否匹配
					session('LOGIN_STATUS','TRUE');
					session('LOGIN_NAME',$rs['username']);
					session('LOGIN_UID',$rs['id']);
					session('LOGIN_CTIME',$rs['creat_time']);
					$this->success('登陆成功！',__APP__);
				}else{
					$this->error('您的输入密码错误！');
				}
			}else{
				$this->error('您的输入用户名或者密码错误！');
			}
		}else{
			$this->error('用户名或密码输入为空！');
		}
    }
    /**
     * 退出登录，清除session
     * @access public
     * @return boolean
     */
	public function logout(){
		session('[destroy]');
		$this->success('您已经成功退出管理系统！',__APP__.'/Login');
	}
    /**
     * 生成验证码
     * @access public
     * @return boolean
     */
	public function vercode(){
		import("ORG.Util.Image");
		$length=2; //验证码的长度
		$mode=1;//0 字母 1 数字 2 大写字母 3 小写字母 4中文 5混合
		$type='png'; //验证码的图片类型，默认为png 
		$width=70;//验证码的宽度
		$height=25;//验证码的高度
		$verifyName='verify';//验证码的SESSION记录名称
		Image::buildImageVerify($length,$mode,$type,$width,$height,$verifyName);
	}
	
	public function add(){
		$this->display('test');
	}
	
}