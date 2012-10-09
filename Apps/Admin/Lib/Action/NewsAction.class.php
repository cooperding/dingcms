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
class NewsAction extends AdminAction {

    //进入页面
    public function index() {
        /*
        $NavCat = M('NavCat');
        $list = $NavCat->select();
        $navcatCount = $NavCat->count("cat_id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
            //$a[$k]['_parentId'] = intval($v['parent_id']);
        }
        $b = array();
        $b['total'] = $navcatCount;
        $b['rows'] = $a;
       $array = array(
            'total' => '9',
            'rows' => array(array(
                    'id' => 1,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id,
                    '_parentId' => '0'
                ), array(
                    'id' => 2,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id,
                    '_parentId' => '1'
                ), array(
                    'id' => 3,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id
                )
                ));

        echo '<pre>';
        echo json_encode($array);
        echo '<br/>';
        echo json_encode($b);
        */
        //print_r($a);
        $this->display();
    }

    public function json() {
        
        $m = M('NavHead');
        $list = $m->select();
        $navcatCount = $m->count("id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
        }
        $array = array();
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        echo json_encode($array);
        //echo $json;
    }

}