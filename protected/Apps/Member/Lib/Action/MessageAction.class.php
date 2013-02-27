<?php

/**
 * MessageAction.class.php
 * 会员个人留言操作
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:20
 * @package  Controller
 */
class MessageAction extends BaseAction {

    /**
     * index
     * 进入留言页面
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 权限验证
     */
    public function index()
    {

    }

    /**
     * add
     * 添加留言
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 权限验证
     */
    public function add()
    {
        $m = M('Members');
        $uid = session('M_UID');
        $condition['id'] = $uid;
        $data = $m->field('password', true)->where($condition)->find();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * changepwd
     * 修改密码
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function changepwd()
    {
        $this->display();
    }

    /**
     * changepwd
     * 更改密码
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function updatepwd()
    {
        $m = M('Members');
        $oldpassword = trim($_POST['oldpassword']);
        $newpassword = trim($_POST['newpassword']);
        $new2password = trim($_POST['new2password']);
        $uid = session('M_UID');
        $uname = session('M_NAME');
        if (empty($oldpassword) || empty($newpassword) || empty($new2password)) {
            $this->dmsg('1', '请输入完整的信息！', false, true);
        }
        if ($newpassword !== $new2password) {
            $this->dmsg('1', '新密码不一样，请重新输入！', false, true);
        }
        $condition['id'] = $uid;
        $data = $m->field('password,creat_time')->where($condition)->find();
        $oldpwd = md5(md5($uname) . sha1($oldpassword . $rs['creat_time']));
        if ($oldpwd == $data['password']) {
            $newpwd = md5(md5($uname) . sha1($newpassword . $rs['creat_time']));
            $pwd['password'] = $newpwd;
            $rs = $m->where($condition)->save($pwd);
            if ($rs == true) {
                $this->dmsg('2', '更新成功！', true);
            } else {
                $this->dmsg('1', '更新失败,或者未有更新！', false, true);
            }
        } else {
            $this->dmsg('1', '原密码输入错误！', false, true);
        }
    }

}