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
class NewsCatAction extends AdminAction {

    //进入页面
    public function index() {
        $this->display();
    }

    public function add() {
        $this->display();
    }

    public function edit() {
        $m = M('NewsCat');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $this->assign('data', $data);
        $this->display();
    }

    public function insert() {
        //添加功能还需要验证数据不能为空的字段
        $m = M('NewsCat');
        $parent_id = intval($_POST['parent_id']);
        $text = trim($_POST['text']);
        if (empty($text)) {
            $json = array('status' => '1', 'info' => '分类名不能为空！');
            echo json_encode($json);
            exit;
        }
        $en_name = trim($_POST['en_name']);
        if (empty($en_name)) {
            import("ORG.Util.Pinyin");
            $pinyin = new Pinyin();
            $_POST['en_name'] = $pinyin->output($_POST['text']);
        }
        if ($parent_id != 0) {
            $data = $m->where('id=' . $parent_id)->find();
            $_POST['path'] = $data['path'] . $parent_id . ',';
        }
        if ($m->create($_POST)) {
            $rs = $m->add($_POST);
            if ($rs) {
                $json = array('status' => '2', 'info' => '分类添加成功！', 'isclose' => 'ok');
                echo json_encode($json);
            } else {
                $json = array('status' => '2', 'info' => '分类添加失败！');
                echo json_encode($json);
            }
        }
    }

    public function update() {
        //流程：当选择的父级分类是现有分类的子级元素修改失败，当修改父级元素时，path同时也要修改
        //判断：
        $m = M('NewsCat');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['parent_id']);
        if ($parent_id != 0) {
            $cun = $m->where('id=' . $parent_id . ' and  path like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
            if ($cun) {
                $json = array('status' => '1', 'info' => '不能选择当前分类的子类为父级分类！',);
                echo json_encode($json);
                exit;
            }
            $en_name = trim($_POST['en_name']);
            if (empty($en_name)) {
                import("ORG.Util.Pinyin");
                $pinyin = new Pinyin();
                $_POST['en_name'] = $pinyin->output($_POST['text']);
            }
            $fdata = $m->where('id=' . $parent_id)->find();
            $fpath = $fdata['path'] . $parent_id . ','; //替换
            $sdata = $m->where('id=' . $id)->find();
            $spath = $sdata['path']; //搜索
            if ($fpath != $spath) {//当二者相同时不必更新，不相同时说明选择父级有变化。执行sql语句
                $sfid = $sdata['parent_id'];
                $sql = "update __TABLE__ set `path` = REPLACE(`path`,'$spath','$fpath') WHERE INSTR(`path`,'$spath')>0 and `path` like '%,$id,%'";
                $m->query($sql);
            }
            $_POST['path'] = $fpath;
            $rs = $m->save($_POST);
            if ($rs == 1) {
                $json = array('status' => '2', 'info' => '更新成功！', 'isclose' => 'ok');
                echo json_encode($json);
            } elseif ($rs == 0) {
                $json = array('status' => '1', 'info' => '更新失败！');
                echo json_encode($json);
            } else {
                $json = array('status' => '2', 'info' => '未有操作！');
                echo json_encode($json);
            }
        }
    }

    public function delete() {
        
    }

    public function json() {
        $m = M('NewsCat');
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
        $m = M('NewsCat');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

}