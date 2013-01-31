<?php

/**
 * RoleAction.class.php
 * 权限角色管理
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2013-1-5 14:57
 * @package  Controller
 * @todo 信息各项操作
 */
class RoleAction extends BaseAction {

    /**
     * index
     * 信息列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index()
    {
        $this->display('rbac:role');
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
        $this->display('rbac:role_add');
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
        $m = M('Role');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $radios = array(
            '1' => '启用',
            '0' => '禁用'
        );
        $this->assign('data', $data);
        $this->assign('radios', $radios);
        $this->display('rbac:role_edit');
    }

    /**
     * setRbac
     * 设置权限
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function setRbac()
    {
        $id = intval($_GET['id']);
        $this->assign('id', $id); //传递角色id
        $this->display('rbac:set_rbac');
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
        $m = M('Role');
        $name = trim($_POST['name']);
        $_POST['status'] = $_POST['status'][0];
        //$this->dmsg('1', $_POST['status'], false, true);
        if (empty($name)) {
            $this->dmsg('1', '角色名不能为空！', false, true);
        }
        $parent_id = intval($_POST['pid']);
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
     * update
     * 更新数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function update()
    {
        $m = M('Role');
        $d = D('NewsSort');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['pid']);
        $_POST['status'] = $_POST['status'][0];
        $name = trim($_POST['name']);
        if (empty($name)) {
            $this->dmsg('1', '节点项目名或者提示中文名不能为空！', false, true);
        }
        $tbname = 'Role';
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
     * updateRbac
     * 设置权限
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function updateRbac()
    {
        $m = M('Node');
        $a = M('Access');
        $data['role_id'] = intval($_POST['role_id']);
        $node_id = $_POST['id'];
        if(empty($node_id)){
            $a->where($data)->delete();
            $this->dmsg('2', '操作成功！', true);
            exit;
        }
        $a->where($data)->delete();
        $node_id = explode(',',$node_id);
        foreach($node_id as $v){
            $rsm = $m->where('id='.$v)->field('level')->find();
            $data['node_id'] = $v;
            $data['level'] = $rsm['level'];
            $rs = $a->data($data)->add();
        }
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
        $m = M('Role');
        $list = $m->field(array('id','pid','name' => 'text'))->select();
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
        $m = M('Role');
        $tree = $m->field(array('id','pid','name' => 'text'))->select();
        $tree = list_to_tree($tree, 'id', 'pid', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('sort_root_name'))), $tree);
        echo json_encode($tree);
    }

}