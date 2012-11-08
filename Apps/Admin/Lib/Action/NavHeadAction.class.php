<?php

/**
 * NavHeadAction.class.php
 * 头部导航
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 内容模型各项操作
 */
class NavHeadAction extends AdminAction {

    /**
     * index
     * 头部导航列表页
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index()
    {
        $this->display();
    }

    /**
     * add
     * 头部导航添加操作
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function add()
    {
        $this->display();
    }

    /**
     * edit
     * 头部导航编辑操作
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function edit()
    {
        $m = M('NavHead');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * insert
     * 头部导航add后插入数据库
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function insert()
    {
        //添加功能还需要验证数据不能为空的字段
        $m = M('NavHead');
        $parent_id = intval($_POST['parent_id']);
        $text = trim($_POST['text']);
        if (empty($text)) {
            $json = array('status' => '1', 'info' => '分类名不能为空！');
            echo json_encode($json);
            exit;
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
        }else{
            $json = array('status' => '1', 'info' => '根据表单提交的POST数据创建数据对象失败！');
            echo json_encode($json);
            exit;
        }
    }

    /**
     * update
     * 头部导航编辑后更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function update()
    {
        //流程：当选择的父级分类是现有分类的子级元素修改失败，当修改父级元素时，path同时也要修改
        //判断：
        $m = M('NavHead');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['parent_id']);

        $data = $m->where('id=' . $id)->find();
        if ($parent_id != $data['parent_id']) {//判断parent_id是否修改
            if ($parent_id != 0) {//判断当改变分类时，父类是否选择了子类做为其的父类
                $cun = $m->where('id=' . $parent_id . ' and  path like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
                if ($cun) {
                    $json = array('status' => '1', 'info' => '不能选择当前分类的子类为父级分类！',);
                    echo json_encode($json);
                    exit;
                }
                $fdata = $m->where('id=' . $parent_id)->find();
                $fpath = $fdata['path'] . $parent_id . ','; //替换
            } else {
                $fdata = $m->where('id=' . $parent_id)->find();
                if (empty($fdata['path'])) {
                    $fpath = ',' . $parent_id . ','; //替换
                } else {
                    $fpath = $fdata['path'] . $parent_id . ','; //替换
                }
            }//if
            $_POST['path'] = $fpath;
            $spath = $data['path']; //搜索
            if ($fpath != $spath) {//当二者相同时不必更新，不相同时说明选择父级有变化。执行sql语句
                $sfid = $sdata['parent_id'];
                $sql = "update __TABLE__ set `path` = REPLACE(`path`,'$spath','$fpath') WHERE INSTR(`path`,'$spath')>0 and `path` like '%,$id,%'";
                $m->query($sql);
            }
        }
        $rs = $m->save($_POST);
        if ($rs == 1) {
            $json = array('status' => '2', 'info' => '更新成功！', 'isclose' => 'ok');
            echo json_encode($json);
        } else {
            $json = array('status' => '2', 'info' => '未有操作！');
            echo json_encode($json);
        }
    }

    /**
     * delete
     * 网站导航删除
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function delete()
    {
        $m = M('NavHead');
        $id = intval($_POST['id']);
        if (empty($id)) {
            $json = array('status' => '1', 'info' => '未有id值，无法删除！');
            echo json_encode($json);
        } else {
            $data = $m->where('path like \'%,' . $id . ',%\'')->select();
            if (is_array($data)) {
                $json = array('status' => '1', 'info' => '该分类下还有子级分类，无法删除！');
                echo json_encode($json);
            } else {
                $del = $m->where('id=' . $id)->delete();
                if ($del == 1) {
                    $json = array('status' => '2', 'info' => '删除成功！');
                    echo json_encode($json);
                } else {
                    $json = array('status' => '1', 'info' => '删除失败！');
                    echo json_encode($json);
                }//if
            }
        }//if id
    }

    /**
     * json
     * 返回json数据
     * @access index
     * @return array
     * @version dogocms 1.0
     */
    public function json()
    {
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

    /**
     * jsonTree
     * 头部导航返回树形json数据
     * @access add edit
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTree()
    {
        Load('extend');
        $m = M('NavHead');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

}