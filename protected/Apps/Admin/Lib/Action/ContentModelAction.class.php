<?php

/**
 * ContentModelAction.class.php
 * 内容模型
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 内容模型各项操作
 */
class ContentModelAction extends AdminAction {

    /**
     * sort
     * 内容模型分类
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     * @todo 模型各项操作
     */
    public function sort() {
        $this->display();
    }

    /**
     * sortadd
     * 内容模型添加
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     */
    public function sortadd() {
        $radios = array(
            'true' => '启用',
            'false' => '禁用'
        );
        $this->assign('radios', $radios);
        $this->display();
    }

    /**
     * sortedit
     * 内容模型编辑
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     */
    public function sortedit() {
        $m = M('ModelSort');
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
     * 模型分类插入
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortinsert() {
        $d = D('ModelSort');
        $m = M('ModelSort');
        $id = intval($_POST['id']);
        $condition['ename'] = trim($_POST['ename']);
        $condition['emark'] = trim($_POST['emark']);
        $condition['_logic'] = 'OR';
        if (empty($condition['ename']) || empty($condition['emark'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->field('id')->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $condition['ename'] . $condition['emark'] . '已经存在！');
            echo json_encode($json);
            exit;
        }
        $d->addtable($condition['emark']); //创建数据表

        if ($m->create()) {
            $rs = $m->add($_POST);
            if ($rs) {//存在值
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
        }
    }

    /**
     * sortupdate
     * 模型分类更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortupdate() {
        $m = M('ModelSort');
        $id = intval($_POST['id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['emark'] = trim($_POST['emark']);
        $where['ename'] = $_POST['ename'];
        $where['emark'] = $_POST['emark'];
        $where['_logic'] = 'or';
        $condition['_complex'] = $where;
        $condition['id'] = array('neq', $id);

        if (empty($_POST['ename']) || empty($_POST['emark'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->field('id')->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $condition['ename'] . $condition['emark'] . '已经存在！');
            echo json_encode($json);
            exit;
        }
        $data = $m->field('emark')->where('id=' . $id)->find();
        if ($data['emark'] != $_POST['emark']) {
            D('ModelSort')->edittable($data['emark'], $_POST['emark']);
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
     * sortdelete
     * 模型分类删除
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortdelete() {
        $id = intval($_POST['id']);
        $d = D('ModelSort');
        $m = M('ModelSort');
        $list = M('ModelField');
        if ($list->field('sort_id')->where('sort_id=' . $id)->find()) {
            $json = array('status' => '1', 'info' => '列表中存在该分类元素不能删除！');
            echo json_encode($json);
            exit;
        }
        $rs = $m->field('emark')->where('id=' . $id)->find();
        $d->droptable($rs['emark']);
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
     * sortlist
     * 内容模型字段列表
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     * @todo 模型各项操作
     */
    public function sortlist() {
        $m = M('ModelSort');
        $sort = $m->field('id,ename')->select();
        $this->assign('sort', $sort);
        $this->display();
    }

    /**
     * sortlistsort
     * 模型列表左侧菜单
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlistsort() {//点击左侧信息打开右侧
        $id = intval($_GET['id']);
        $this->assign('id', $id);
        $this->display('sortlisttab');
    }

    /**
     * sortlistadd
     * 模型列表编辑添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlistadd() {
        $id = intval($_GET['id']);
        $this->assign('id', $id);
        $this->display();
    }

    /**
     * sortlistedit
     * 模型列表编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlistedit() {
        $id = intval($_GET['id']);
        $list = M('ModelField');
        $data = $list->where('id=' . $id)->find();
        //$this->assign('id', $id);
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * sortlistinsert
     * 模型列表插入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortlistinsert() {
        $m = M('ModelField');
        $_POST['sort_id'] = intval($_POST['sort_id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['emark'] = trim($_POST['emark']);
        $condition['emark'] = $_POST['emark'];
        $condition['sort_id'] = array('eq', $_POST['sort_id']);
        if (empty($_POST['ename']) || empty($_POST['emark'])) {
            $json = array('status' => '1', 'info' => '名称和标识不能为空！');
            echo json_encode($json);
            exit;
        }
        if ($m->field('id')->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $_POST['emark'] . '已经存在！');
            echo json_encode($json);
            exit;
        }
        $mc = M('ModelSort');
        $data = $mc->field('emark')->where('id=' . $_POST['sort_id'])->find();
        $tablename = $data['emark'];
        $d = D('ModelSort');

        $field = $_POST['emark'];
        $type = $_POST['etype'];
        $length = trim($_POST['maxlength']);
        $d->addfield($tablename, $field, $type, $length);
        if ($m->create($_POST)) {
            $rs = $m->add($_POST);
            if ($rs) {
                $json = array('status' => '2', 'info' => '分类添加成功！', 'isclose' => 'ok');
                echo json_encode($json);
            } else {
                $json = array('status' => '2', 'info' => '分类添加失败！');
                echo json_encode($json);
            }
        }//if
    }

    /**
     * sortlistupdate
     * 模型列表更新数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function sortlistupdate() {
        $m = M('ModelField');
        $_POST['sort_id'] = intval($_POST['sort_id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['emark'] = trim($_POST['emark']);
        $condition['id'] = array('neq', $_POST['id']);
        $condition['emark'] = $_POST['emark'];
        $condition['sort_id'] = array('eq', $_POST['sort_id']);
        if (empty($_POST['ename']) || empty($_POST['emark'])) {
            $json = array('status' => '1', 'info' => '名称和标识不能为空！');
            echo json_encode($json);
            exit;
        }
        if ($m->field('id')->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $_POST['emark'] . '已经存在！');
            echo json_encode($json);
            exit;
        }
        $mc = M('ModelSort');
        $data = $mc->field('emark')->where('id=' . $_POST['sort_id'])->find();
        $tablename = $data['emark']; //表名
        $field = $m->field('emark')->where('id=' . $_POST['id'])->find();
        $oldfield = $field['emark']; //旧字段名
        $d = D('ModelSort');

        $newfield = $_POST['emark']; //新字段名
        $type = $_POST['etype'];
        $length = trim($_POST['maxlength']);
        $d->editfield($tablename, $newfield, $oldfield, $type, $length);
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
     * sortlistdelete
     * 模型列表删除
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortlistdelete() {
        $id = intval($_POST['id']);
        $m = M('ModelField');
        $d = D('ModelSort');
        $data = $m->join(C('DB_PREFIX') . 'model_sort mc on mc.id=' . C('DB_PREFIX') . 'model_field.sort_id')->where(C('DB_PREFIX') . 'model_field.id=' . $id)
                        ->field('mc.emark as tbname,' . C('DB_PREFIX') . 'model_field.emark as tbfield')->find();
        $tablename = $data['tbname'];
        $field = $data['tbfield'];
        if (empty($tablename) || empty($field)) {
            $json = array('status' => '1', 'info' => '字段信息为空不能执行删除！');
            echo json_encode($json);
            exit;
        }
        $d->detelefield($tablename, $field);
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
     * sortJson
     * 返回sortjson模型分类数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortJson() {
        $m = M('ModelSort');
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
     * sortSortJson
     * 返回sortSortJson文档分类模型分类数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function sortSortJson() {
        $m = M('ModelSort');
        $list = $m->field('id,ename as text')->order('myorder desc,id asc')->select();
        //$list = array_merge(array(array('id' => 0, 'text' => '--请选择相应的内容模型--')), $list);
        echo json_encode($list);
    }

    /**
     * radioJson
     * 返回radioJson数据类型
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function radioJson() {
        $radio = array(
            array('name' => 'varchar', 'text' => '单行文本(varchar)'),
            array('name' => 'textarea', 'text' => '多行文本'),
            array('name' => 'htmltext', 'text' => 'HTML文本'),
            array('name' => 'int', 'text' => '整数类型'),
            array('name' => 'double', 'text' => '小数类型'),
            array('name' => 'datetime', 'text' => '时间类型'),
            array('name' => 'images', 'text' => '图片'),
            array('name' => 'media', 'text' => '多媒体文件'),
            array('name' => 'addon', 'text' => '附件类型'),
            array('name' => 'select', 'text' => '使用option下拉框'),
            array('name' => 'radio', 'text' => '使用radio选项卡'),
            array('name' => 'checkbox', 'text' => 'Checkbox多选框'),
            array('name' => 'stepselect', 'text' => '联动类型')
        );
        echo json_encode($radio);
    }

    /**
     * fieldJsonId
     * 返回fieldJsonId字段信息数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function fieldJsonId() {
        $id = intval($_GET['id']);
        $m = M('ModelField');
        $list = $m->field('id,ename,emark,etype,elink')->where('sort_id=' . $id)->select();
        $count = $m->where('sort_id=' . $id)->count("id");
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
     * jsonSortTree
     * 分类树信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonSortTree() {
        Load('extend');
        $m = M('ModelSort');
        $tree = $m->field('id,ename as text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        //$tree = array_merge(array(array('id' => 0, 'text' => '全部文档')), $tree);
        echo json_encode($tree);
    }

}
?>

