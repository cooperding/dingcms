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
class NavHeadAction extends AdminAction {

    //进入页面
    public function index() {
        $this->display();
    }

    public function add() {
        $this->display();
    }

    public function edit() {
        $m = M('NavHead');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $this->assign('data', $data);
        $this->display();
    }

    public function insert() {
        //添加功能还需要验证数据不能为空的字段
        $m = M('NavHead');
        $parent_id = intval($_POST['parent_id']);
        if ($parent_id!= 0) {
            $data = $m->where('id='.$parent_id)->find();
            if($data['path']==','){
                $_POST['path'] = $parent_id . ',';
            }else{
                $_POST['path'] = $data['path'].$parent_id . ',';
            }
        }
//        echo '<pre>';
//        print_r($_POST);
//        exit;
        if ($m->create($_POST)) {
            $rs = $m->add($_POST);
            if ($rs) {
                echo 2;
            } else {
                echo 3;
            }
        }
    }

    public function update() {
        //流程：当选择的父级分类是现有分类的子级元素修改失败，当修改父级元素时，path同时也要修改
        //判断：
        $m = M('NavHead');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['parent_id']);
        if ($parent_id!= 0) {
            $data = $m->where('id='.$parent_id)->find();
            if($data['path']==','){
                $_POST['path'] = $parent_id . ',';
            }else{
                $_POST['path'] = $data['path'].$parent_id . ',';
            }
        }
        echo 2;
        echo '<pre>';
        print_r($_POST);
        exit;
        //先取得父级path 
        $data = $m->field('id,path')->where('id=' .$id)->find();
        $path = $data['path'];
        
        
        //取得所有匹配的数据
        $tree = $m->field('id,parent_id,path')->where('path like %,'.$id.',% or parent_id='.$id)->select();


        
        $rs = $setting->save($_POST);
        if ($rs == 1) {
            echo 2;
        } elseif ($rs == 0) {
            echo 4;
        } else {
            echo 3;
        }
    }

    public function json() {
        $m = M('NavHead');
        $list = $m->select();
        $navcatCount = $m->count("id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
            $a[$k]['_parentId'] = intval($v['parent_id']); //_parentId为easyui中标识父id
        }
        $array = array();
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        echo json_encode($array);
    }

    public function jsonTree() {
        Load('extend');
        $m = M('NavHead');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

}