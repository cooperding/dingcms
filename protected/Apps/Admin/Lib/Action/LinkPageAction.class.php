<?php

/**
 * LinkPageAction.class.php
 * 联动模型
 * 核心文件，关联内容模型
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 联动模型其他操作
 */
class LinkPageAction extends AdminAction {

    /**
     * cate
     * 联动分类信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function cate() {
        $this->display();
    }

    /**
     * cateadd
     * 联动分类添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function cateadd() {
        $radios = array(
            'true' => '启用',
            'false' => '禁用'
        );
        $this->assign('radios', $radios);
        $this->display();
    }

    /**
     * cateedit
     * 联动分类编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function cateedit() {
        $m = M('LinkpageCate');
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
     * cateinsert
     * 联动分类插入
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function cateinsert() {
        $m = M('LinkpageCate');
        $id = intval($_POST['id']);
        $condition['ename'] = trim($_POST['ename']);
        $condition['egroup'] = trim($_POST['egroup']);
        $condition['_logic'] = 'OR';
        if (empty($condition['ename']) || empty($condition['egroup'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $condition['ename'] . $condition['egroup'] . '已经存在！');
            echo json_encode($json);
            exit;
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
        } else {
            $json = array('status' => '1', 'info' => '根据表单提交的POST数据创建数据对象失败！');
            echo json_encode($json);
            exit;
        }//if
    }

    /**
     * cateupdate
     * 联动分类更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function cateupdate() {
        $m = M('LinkpageCate');
        $id = intval($_POST['id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['egroup'] = trim($_POST['egroup']);
        $where['ename'] = $_POST['ename'];
        $where['egroup'] = $_POST['egroup'];
        $where['_logic'] = 'or';
        $condition['_complex'] = $where;
        $condition['id'] = array('neq', $id);
        if (empty($_POST['ename']) || empty($_POST['egroup'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $_POST['ename'] . $_POST['egroup'] . '已经存在！');
            echo json_encode($json);
            exit;
        }
        $rs = $m->save($_POST);
        if ($rs == 1) {
            $json = array('status' => '2', 'info' => '更新成功！', 'isclose' => 'ok');
            echo json_encode($json);
        } else {
            $json = array('status' => '2', 'info' => '未有操作！');
            echo json_encode($json);
        }//if
    }

    /**
     * catedelete
     * 联动分类删除
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catedelete() {
        $id = intval($_GET['id']);
        $m = M('LinkpageCate');
        $list = M('LinkpageList');
        if ($list->where('linkpage_id=' . $id)->find()) {
            $json = array('status' => '1', 'info' => '列表中存在该分类元素不能删除！');
            echo json_encode($json);
            exit;
        }
        $del = $m->where('id=' . $id)->delete();
        if ($del == 1) {
            $json = array('status' => '2', 'info' => '删除成功！');
            echo json_encode($json);
        } else {
            $json = array('status' => '1', 'info' => '删除失败！');
            echo json_encode($json);
            exit;
        }//if
    }

    /**
     * catelist
     * 联动列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelist() {
        $m = M('LinkpageCate');
        $cate = $m->field('id,ename')->select();


        $this->assign('cate', $cate);
        $this->display();
    }

    /**
     * catelistcate
     * 联动列表左侧菜单
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelistcate() {//点击左侧信息打开右侧
        $id = intval($_GET['id']);
        //echo $id;
        $this->assign('id', $id);
        $this->display('catelisttab');
    }

    /**
     * catelistadd
     * 联动列表编辑添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelistadd() {

        $id = intval($_GET['id']);
        $this->assign('linkpage_id', $id);
        $this->display();
    }

    /**
     * catelistedit
     * 联动列表编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelistedit() {
        $id = intval($_GET['id']);
        $list = M('LinkpageList');
        $data = $list->where('id=' . $id)->find();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * catelistdelete
     * 联动列表删除
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function catelistdelete() {
        $m = M('LinkpageList');
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
     * catelistinsert
     * 联动列表编辑插入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function catelistinsert() {
        $m = M('LinkpageList');
        $parent_id = intval($_POST['parent_id']);
        $_POST['cate_name'] = trim($_POST['cate_name']);
        if (empty($_POST['cate_name'])) {
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
        }
    }

    /**
     * catelistupdate
     * 联动列表编辑更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function catelistupdate() {
        $m = M('LinkpageList');
        $id = intval($_POST['id']);
        $linkpage_id = intval($_POST['linkpage_id']);
        $parent_id = intval($_POST['parent_id']);
        $data = $m->where('id=' . $id . ' and `linkpage_id` = ' . $linkpage_id)->find();
        if ($parent_id != $data['parent_id']) {//判断parent_id是否修改
            if ($parent_id != 0) {//判断当改变分类时，父类是否选择了子类做为其的父类
                $cun = $m->where('`linkpage_id` = ' . $linkpage_id . ' AND `id`=' . $parent_id . ' and  `path` like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
                if ($cun) {
                    $json = array('status' => '1', 'info' => '不能选择当前分类的子类为父级分类！',);
                    echo json_encode($json);
                    exit;
                }
                $fdata = $m->where('id=' . $parent_id . ' and `linkpage_id` = ' . $linkpage_id)->find();
                $fpath = $fdata['path'] . $parent_id . ','; //替换
            } else {
                $fdata = $m->where('id=' . $parent_id . ' and `linkpage_id` = ' . $linkpage_id)->find();
                if (empty($fdata['path'])) {
                    $fpath = ',' . $parent_id . ','; //替换
                } else {
                    $fpath = $fdata['path'] . $parent_id . ','; //替换
                }
            }
            $_POST['path'] = $fpath;
            $spath = $data['path']; //搜索
            if ($fpath != $spath) {//当二者相同时不必更新，不相同时说明选择父级有变化。执行sql语句
                $sfid = $sdata['parent_id'];
                $sql = "update __TABLE__ set `path` = REPLACE(`path`,'$spath','$fpath') WHERE INSTR(`path`,'$spath')>0 and `path` like '%,$id,%' and `linkpage_id`=$linkpage_id ";
                $m->query($sql);
            }
        }//if

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
     * cateJson
     * 返回catejson联动分类数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function cateJson() {
        $m = M('LinkpageCate');
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
     * cateModelJson
     * 返回cateModelJson联动分类数据,模型列表处使用
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function cateModelJson() {
        $m = M('LinkpageCate');
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
    public function jsonTreeId() {
        Load('extend');
        $m = M('LinkpageList');
        $id = intval($_GET['id']);
        $tree = $m->field('id,parent_id,cate_name as text')->where('linkpage_id=' . $id)->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        //$tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

    /**
     * jsonTreeListId
     * 通过id返回jsonTreeList数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTreeListId() {
        Load('extend');
        $m = M('LinkpageList');
        $id = intval($_GET['id']);
        $tree = $m->field('id,parent_id,cate_name as text')->where('linkpage_id=' . $id)->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

}
?>

