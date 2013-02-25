<?php

/**
 * AccountAction.class.php
 * 会员个人资料及密码操作
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:20
 * @package  Controller
 */
class AccountAction extends BaseAction
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

    }
     /**
     * perinfo
     * 个人资料
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 权限验证
     */
    public function perinfo()
    {
        $m = M('Members');
        $uid = session('M_UID');
        $condition['id'] = $uid;
        $data = $m->field('password',true)->where($condition)->find();
        $this->assign('data',$data);
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
    }

}