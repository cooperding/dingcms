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
 * DingCMS 系统配置
 * 主要用于全站系统配置
 * @category   admin
 * @package  admin
 * @subpackage  admin Action
 * @author    正侠客 <lookcms@gmail.com>
 */
class NavAction extends AdminAction {

    //进入页面
    public function index() {
        //echo 5656;
        $this->display();
    }

    public function json() {
        $id = $_GET['id'];
        $array = array(
            'total' => '9',
            'rows' => array(array(
                    'id' => 1,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id
                ),array(
                    'id' => 2,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id
                ),array(
                    'id' => 3,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id
                )
                ));

        echo json_encode($array);
    }

}