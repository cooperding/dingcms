<?php

/**
 * LoginAction.class.php
 * 后台登录页面
 * 后台核心文件，用于后台登录操作验证
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:20
 * @package  Controller
 */
class LoginAction extends Action
{

    /**
     * index
     * 进入登录页面
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 权限验证
     */
    public function index()
    {
        //此处判断是否已经登录，如果登录跳转到后台首页否则跳转到登录页面
        if (session('LOGIN_STATUS') == 'TRUE') {
            $this->redirect('../' . APP_NAME);
        } else {
            $this->display();
        }
    }

    /**
     * dologin
     * 登录验证
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function dologin()
    {
        $ver_code = trim($_POST['vd_code']);
        $verify = session('verify');
        if (empty($ver_code) || md5($ver_code) != $verify) {
            $this->error('验证码为空或者输入错误！');
            exit;
        }
        $condition['username'] = trim($_POST['user_name']);
        $password = trim($_POST['user_password']);
        if (!empty($condition['username']) && !empty($password)) {//依据用户名查询
            $login = M('Operators');
            $rs = $login->field('username,creat_time,id,password')->where($condition)->find();
            if ($rs) {//对查询出的结果进行判断
                $password = md5(md5($condition['username']) . sha1($password . $rs['creat_time']));
                if ($password == $rs['password']) {//判断密码是否匹配
                    session('LOGIN_STATUS', 'TRUE');
                    session('authId', $rs['id'].$rs['username']);
                    session('LOGIN_NAME', $rs['username']);
                    session('LOGIN_UID', $rs['id']);
                    session('LOGIN_CTIME', $rs['creat_time']);
                    $this->success('登陆成功！', __APP__);
                } else {
                    $this->error('您的输入密码错误！');
                }
            } else {
                $this->error('您的输入用户名或者密码错误！');
            }
        } else {
            $this->error('用户名或密码输入为空！');
        }
    }

    /**
     * logout
     * 退出登录，清除session
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function logout()
    {
        session('[destroy]');
        $this->success('您已经成功退出管理系统！', __APP__ . '/Login');
    }

    /**
     * vercode
     * 生成验证码
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function vercode()
    {
        import("ORG.Util.Image");
        $length = 2; //验证码的长度
        $mode = 1; //0 字母 1 数字 2 大写字母 3 小写字母 4中文 5混合
        $type = 'png'; //验证码的图片类型，默认为png
        $width = 70; //验证码的宽度
        $height = 25; //验证码的高度
        $verifyName = 'verify'; //验证码的SESSION记录名称
        Image::buildImageVerify($length, $mode, $type, $width, $height, $verifyName);
    }

}