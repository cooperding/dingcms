<?php

/**
 * BrandAction.class.php
 * 品牌信息
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 分类各项操作
 */
class BrandAction extends BaseAction {

    /**
     * index
     * 信息列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index()
    {
        $this->display();
    }
 /**
     * test
     * 测试
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 测试之后删除
     */
    public function test()
    {
        $this->display();
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
        $this->display();
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
        $m = M('NewsSort');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $this->assign('data', $data);
        $this->display();
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
//添加功能还需要验证数据不能为空的字段
        $m = M('NewsSort');
        $parent_id = intval($_POST['parent_id']);
        $text = trim($_POST['text']);
        if (empty($text)) {
            $this->dmsg('1', '分类名不能为空！', false, true);
        }
        $en_name = trim($_POST['en_name']);
        if (empty($en_name)) {
            import("ORG.Util.Pinyin");
            $pinyin = new Pinyin();
            $_POST['en_name'] = $pinyin->output(trim($_POST['text']));
        }
        if ($parent_id != 0) {
            $data = $m->where('id=' . $parent_id)->find();
            $_POST['path'] = $data['path'] . $parent_id . ',';
        }
        if ($m->create($_POST)) {
            $rs = $m->add($_POST);
            if ($rs) {
                $this->dmsg('2', '操作成功！', true);
            } else {
                $this->dmsg('1', '操作失败！', false, true);
            }
        }//if
    }

    /**
     * update
     * 分类更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function update()
    {
        $m = M('NewsSort');
        $d = D('NewsSort');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['parent_id']);
        $tbname = 'NewsSort';
        if ($parent_id != 0) {//不为0时判断是否为子分类
            $cun = $m->field('id')->where('id=' . $parent_id . ' and  path like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
            if ($cun) {
                $this->dmsg('1', '不能选择当前分类的子类为父级分类！', false, true);
            }
            $data = $m->field('path')->where('id=' . $parent_id)->find();
            $sort_path = $data['path'] . $parent_id . ','; //取得不为0时的path
            $_POST['path'] = $data['path'] . $parent_id . ',';
            $d->updatePath($id, $sort_path, $tbname);
        } else {//为0，path为,
            $data = $m->field('parent_id')->where('id=' . $id)->find();
            if ($data['parent_id'] != $parent_id) {//相同不改变
                $sort_path = ','; //取得不为0时的path
                $d->updatePath($id, $sort_path, $tbname);
            }
            $_POST['path'] = ','; //应该是这个
        }
        $en_name = trim($_POST['en_name']);
        if (empty($en_name)) {
            import("ORG.Util.Pinyin");
            $pinyin = new Pinyin();
            $_POST['en_name'] = $pinyin->output(trim($_POST['text']));
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
        $m = M('NewsSort');
        $id = intval($_POST['id']);
        if (empty($id)) {
            $this->dmsg('1', '未有id值，无法删除！', false, true);
        }
        $data = $m->field('path')->where('path like \'%,' . $id . ',%\'')->select();
        if (is_array($data)) {
            $this->dmsg('1', '该分类下还有子级分类，无法删除！', false, true);
        }
        $t = M('Title');
        $t_data = $t->field('sort_id')->where('sort_id=' . $id)->find();
        if (is_array($t_data)) {
            $this->dmsg('1', '该分类下还有文档信息，无法删除！', false, true);
        }
        $del = $m->where('id=' . $id)->delete();
        if ($del == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
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
        $m = M('NewsSort');
        $list = $m->field('id,parent_id,text')->select();
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
     * 分类json树结构数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTree()
    {
        Load('extend');
        $m = M('NewsSort');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('sort_root_name'))), $tree);
        echo json_encode($tree);
    }

}