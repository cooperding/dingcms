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
        $this->display();
    }
    
    public function add(){
        $this->display();
    }
    public function edit(){
        $m = M('NavCat');
        $data = $m->where('cat_id='.intval($_GET['id']))->select();
        
        echo '<pre>';
        //echo $m->getLastSql();
        print_r($data);
        $this->assign('data',$data);
        $this->display();
    }

    public function json() {
        $m = M('NavCat');
        $list = $m->select();
        $navcatCount = $m->count("cat_id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
            $a[$k]['_parentId'] = intval($v['parent_id']);
        }
        $array = array();
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        echo json_encode($array);
    }

}