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
class AdminAction extends Action {

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
        if (empty($logged) || $logged != 'TRUE') {
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
        if (empty($logged) || $logged != 'TRUE') {
            $this->error('请登录后操作', __APP__ . '/Login');
        }
    }

    /**
     * dmsg
     * json格式提示信息
     * @param string $status 状态1:失败,2:成功
     * @param string $info 提示信息
     * @param boolean $isclose 是否关闭弹出窗口true:关闭,false:不关闭
     * @param boolean $type 调试信息,true:调试信息exit,false:不调试信息
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function dmsg($status, $info, $isclose=false, $type=false)
    {
        $array = array();
        if($isclose){
            $array['isclose']= 'ok';
        }
        $array['status']= $status;
        $array['info']= $info;
        echo json_encode($array);
        if($type){
            exit;
        }

    }

}

//实例化Admin类
$judge = new AdminAction();
$judge->loginjudge(); //登录状态验证
	//$judge->dojudge();//权限状态验证

