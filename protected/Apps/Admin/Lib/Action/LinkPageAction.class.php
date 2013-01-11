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
     * 联动分类添加
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
     * 联动分类编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortedit()
    {
        $m = M('LinkpageSort');
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
     * 联动分类插入
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortinsert()
    {
        $m = M('LinkpageSort');
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
     * 联动分类更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortupdate()
    {
        $m = M('LinkpageSort');
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
     * 联动分类删除
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortdelete()
    {
        $id = intval($_GET['id']);
        $m = M('LinkpageSort');
        $list = M('LinkpageList');
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
     * sortlist
     * 联动列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlist()
    {
        $m = M('LinkpageSort');
        $sort = $m->field('id,ename')->select();
        $this->assign('sort', $sort);
        $this->display();
    }

    /**
     * sortlistsort
     * 联动列表左侧菜单
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlistsort()
    {//点击左侧信息打开右侧
        $id = intval($_GET['id']);
        //echo $id;
        $this->assign('id', $id);
        $this->display('sortlisttab');
    }

    /**
     * sortlistadd
     * 联动列表编辑添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlistadd()
    {

        $id = intval($_GET['id']);
        $this->assign('linkpage_id', $id);
        $this->display();
    }

    /**
     * sortlistedit
     * 联动列表编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlistedit()
    {
        $id = intval($_GET['id']);
        $list = M('LinkpageList');
        $data = $list->where('id=' . $id)->find();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * sortlistdelete
     * 联动列表删除
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortlistdelete()
    {
        $m = M('LinkpageList');
        $id = intval($_POST['id']);
        if (empty($id)) {
            $this->dmsg('1', '未有id值，无法删除！', false, true);
        }
        $data = $m->field('id')->where('path like \'%,' . $id . ',%\'')->select();
        if (is_array($data)) {
            $this->dmsg('1', '该分类下还有子级分类，无法删除！', false, true);
        }
        $del = $m->where('id=' . $id)->delete();
        if ($del == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
    }

    /**
     * sortlistinsert
     * 联动列表编辑插入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortlistinsert()
    {
        $m = M('LinkpageList');
        $parent_id = intval($_POST['parent_id']);
        $_POST['sort_name'] = trim($_POST['sort_name']);
        if (empty($_POST['sort_name'])) {
            $this->dmsg('1', '分类名不能为空！', false, true);
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
        }
    }

    /**
     * sortlistupdate
     * 联动列表编辑更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortlistupdate()
    {
        $m = M('LinkpageList');
        $d = D('NewsSort');
        $tbname = 'LinkpageList';
        $linkpage_id = intval($_POST['linkpage_id']);
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['parent_id']);
        if ($parent_id != 0) {//不为0时判断是否为子分类
            $cun = $m->field('linkpage_id')->where('`linkpage_id` = ' . $linkpage_id . ' AND `id`=' . $parent_id . ' and  `path` like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
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
        $rs = $m->save($_POST);
        if ($rs == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }
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
        $m = M('LinkpageSort');
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
        $m = M('LinkpageSort');
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
        $m = M('LinkpageList');
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
        $m = M('LinkpageList');
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
        $m = M('LinkpageSort');
        $tree = $m->field('id,ename as text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        echo json_encode($tree);
    }

}
?>

