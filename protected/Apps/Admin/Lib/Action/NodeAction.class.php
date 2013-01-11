<?php

/**
 * NodeAction.class.php
 * 权限节点管理
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2013-1-5 14:57
 * @package  Controller
 * @todo 信息各项操作
 */
class NodeAction extends AdminAction {

    /**
     * index
     * 信息列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index()
    {

        $this->display('Rbac:node');
    }

    /**
     * add
     * 分类添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function add()
    {
        $radios = array(
            '1' => '启用',
            '0' => '禁用'
        );
        $this->assign('radios', $radios);
        $this->display('Rbac:node_add');
    }

    /**
     * edit
     * 分类数据编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function edit()
    {
        $m = M('Node');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $radios = array(
            '1' => '启用',
            '0' => '禁用'
        );
        $this->assign('data', $data);
        $this->assign('radios', $radios);
        $this->display('Rbac:node_edit');
    }

    /**
     * insert
     * 分类插入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function insert()
    {
        $m = M('Node');
        $name = trim($_POST['name']);
        $title = trim($_POST['title']);
        $parent_id = intval($_POST['pid']);
        $_POST['status'] = $_POST['status'][0];
        if (empty($name) || empty($title)) {
            $this->dmsg('1', '节点项目名或者提示中文名不能为空！', false, true);
        }
        if ($parent_id != 0) {
            $data = $m->where('id=' . $parent_id)->find();
            $_POST['path'] = $data['path'] . $parent_id . ',';
        }
        if ($m->create()) {
            $rs = $m->add($_POST);
            if ($rs == true) {
                $this->dmsg('2', '操作成功！', true);
            } else {
                $this->dmsg('1', '操作失败！', false, true);
            }
        }//if
    }

    /**
     * insert
     * 分类插入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function update()
    {
        $m = M('Node');
        $d = D('NewsSort');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['pid']);
        $name = trim($_POST['name']);
        $title = trim($_POST['title']);
        $_POST['status'] = $_POST['status'][0];
        if (empty($name) || empty($title)) {
            $this->dmsg('1', '节点项目名或者提示中文名不能为空！', false, true);
        }
        $tbname = 'Node';
        if ($parent_id != 0) {//不为0时判断是否为子分类
            $cun = $m->field('id')->where('id=' . $parent_id . ' and  path like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
            if ($cun) {
                $this->dmsg('1', '不能选择当前分类的子类为父级分类！', false, true);
            }
            $data = $m->field('path')->where('id=' . $parent_id)->find();
            $sort_path = $data['path'] . $parent_id . ','; //取得不为0时的path
            $_POST['path'] = $data['path'] . $parent_id . ',';
            $d->updateRolePath($id, $sort_path, $tbname);
        } else {//为0，path为,
            $data = $m->field('pid')->where('id=' . $id)->find();
            if ($data['pid'] != $parent_id) {//相同不改变
                $sort_path = ','; //取得不为0时的path
                $d->updateRolePath($id, $sort_path, $tbname);
            }
            $_POST['path'] = ','; //应该是这个
        }
        $rs = $m->save($_POST);
        if ($rs == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '未有操作或操作失败！', false, true);
        }
    }
    /**
     * delete
     * 分类信息删除操作
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function delete()
    {
        $this->dmsg('1', '暂不支持删除功能！', false, true);
    }

    /**
     * json
     * 分类信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function json()
    {
        $m = M('Node');
        $list = $m->field('id,pid,name as text,title,level')->select();
        $navcatCount = $m->count("id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
            $a[$k]['_parentId'] = intval($v['pid']); //_parentId为easyui中标识父id
        }
        $array = array();
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        echo json_encode($array);
    }

    /**
     * jsonTree
     * 分类json树结构数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTree()
    {
        Load('extend');
        $m = M('Node');
        $tree = $m->field('id,pid,title as text')->select();
        $tree = list_to_tree($tree, 'id', 'pid', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('sort_root_name'))), $tree);
        echo json_encode($tree);
    }
    /**
     * jsonSetRbacTree
     * 节点json树结构数据（设置权限）
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonSetRbacTree()
    {
        Load('extend');
        $m = M('Node');
        $a = M('Access');
        $condition['role_id'] = $_GET['id'];
        $data = $a->field('node_id')->where($condition)->select();
        $tree = $m->field('id,pid,title as text')->select();
        foreach($data as $k=>$v){
            $node_id[] = $v['node_id'];
        }
        foreach($tree as $k=>$v){
            if(in_array($v['id'], $node_id)){
                $tree[$k]['checked'] = true;
            }
        }
        $tree = list_to_tree($tree, 'id', 'pid', 'children');
        echo json_encode($tree);
    }

}