<?php

/**
 * LinkPageAction.class.php
 * 联动模型
 * 核心文件，关联内容模型
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2013-2-11 20:09
 * @package  Controller
 * @todo 联动模型其他操作
 */
class LinkPageAction extends BaseAction {

    /**
     * sort
     * 联动分类信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sort()
    {
        $this->display();
    }

    /**
     * sortadd
     * 单页分类添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortadd()
    {
        $radios = array(
            'true' => '启用',
            'false' => '禁用'
        );
        $this->assign('radios', $radios);
        $this->display();
    }

    /**
     * sortedit
     * 单页分类编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortedit()
    {
        $m = M('PagesSort');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $radios = array(
            'true' => '启用',
            'false' => '禁用'
        );
        $this->assign('radios', $radios);
        $this->assign('status', $data['status']);
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * sortinsert
     * 单页分类插入
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortinsert()
    {
        $m = M('PagesSort');
        $id = intval($_POST['id']);
        $condition['ename'] = trim($_POST['ename']);
        $condition['egroup'] = trim($_POST['egroup']);
        $condition['_logic'] = 'OR';
        if (empty($condition['ename']) || empty($condition['egroup'])) {
            $this->dmsg('1', '请将信息输入完整！', false, true);
        }
        if ($m->field('id')->where($condition)->find()) {
            $this->dmsg('1', '您输入的名称或者标识' . $condition['ename'] . $condition['egroup'] . '已经存在！', false, true);
        }
        if ($m->create($_POST)) {
            $rs = $m->add($_POST);
            if ($rs) {
                $this->dmsg('2', '分类添加成功！', true);
            } else {
                $this->dmsg('1', '分类添加失败！', false, true);
            }
        } else {
            $this->dmsg('1', '根据表单提交的POST数据创建数据对象失败！', false, true);
        }//if
    }

    /**
     * sortupdate
     * 单页分类更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortupdate()
    {
        $m = M('PagesSort');
        $id = intval($_POST['id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['egroup'] = trim($_POST['egroup']);
        $where['ename'] = $_POST['ename'];
        $where['egroup'] = $_POST['egroup'];
        $where['_logic'] = 'or';
        $condition['_complex'] = $where;
        $condition['id'] = array('neq', $id);
        if (empty($_POST['ename']) || empty($_POST['egroup'])) {
            $this->dmsg('1', '请将信息输入完整！', false, true);
        }
        if ($m->field('id')->where($condition)->find()) {
            $this->dmsg('1', '您输入的名称或者标识' . $_POST['ename'] . $_POST['egroup'] . '已经存在！', false, true);
        }
        $rs = $m->save($_POST);
        if ($rs == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '未有操作或者操作失败！', false, true);
        }//if
    }

    /**
     * sortdelete
     * 单页分类删除
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortdelete()
    {
        $id = intval($_GET['id']);
        $m = M('PagesSort');
        $list = M('Pages');
        if ($list->field('id')->where('linkpage_id=' . $id)->find()) {
            $this->dmsg('1', '列表中存在该分类元素不能删除！', false, true);
        }
        $del = $m->where('id=' . $id)->delete();
        if ($del == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
    }

    

    /**
     * sortJson
     * 返回sortJson联动分类数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortJson()
    {
        $m = M('PagesSort');
        $list = $m->select();
        $count = $m->count("id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
        }
        $array = array();
        $array['total'] = $count;
        $array['rows'] = $a;
        echo json_encode($array);
    }

    /**
     * sortModelJson
     * 返回sortModelJsonn联动分类数据,模型列表处使用
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortModelJson()
    {
        $m = M('PagesSort');
        $list = $m->field('id,ename')->select();
        $array = array();
        foreach ($list as $k => $v) {
            $array[$k] = $v;
        }
        echo json_encode($array);
    }

    /**
     * jsonTreeId
     * 通过id返回jsonTree数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTreeId()
    {
        Load('extend');
        $m = M('Pages');
        $id = intval($_GET['id']);
        $tree = $m->field('id,parent_id,sort_name as text')->where('linkpage_id=' . $id)->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        //$tree = array_merge(array(array('id' => 0, 'text' => L('sort_root_name'))), $tree);
        echo json_encode($tree);
    }

    /**
     * jsonTreeListId
     * 通过id返回jsonTreeList数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTreeListId()
    {
        Load('extend');
        $m = M('Pages');
        $id = intval($_GET['id']);
        $tree = $m->field('id,parent_id,sort_name as text')->where('linkpage_id=' . $id)->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('sort_root_name'))), $tree);
        echo json_encode($tree);
    }

    /**
     * jsonSortTree
     * 分类树信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonSortTree()
    {
        Load('extend');
        $m = M('PagesSort');
        $tree = $m->field('id,ename as text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        echo json_encode($tree);
    }

}
?>

