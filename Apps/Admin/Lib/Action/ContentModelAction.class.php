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
     * cate
     * 内容模型分类
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     * @todo 模型各项操作
     */
    public function cate()
    {
        $this->display();
    }

    /**
     * cateadd
     * 内容模型添加
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     */
    public function cateadd()
    {
        $radios = array(
            'true' => '启用',
            'false' => '禁用'
        );
        $this->assign('radios', $radios);
        $this->display();
    }

    /**
     * cateedit
     * 内容模型编辑
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     */
    public function cateedit()
    {
        $m = M('ModelCate');
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
     * 模型分类插入
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function cateinsert()
    {

        $m = M('ModelCate');
        $id = intval($_POST['id']);
        $condition['ename'] = trim($_POST['ename']);
        $condition['emark'] = trim($_POST['emark']);
        $condition['_logic'] = 'OR';
        if (empty($condition['ename']) || empty($condition['emark'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $condition['ename'] . $condition['emark'] . '已经存在！');
            echo json_encode($json);
            exit;
        }
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
     * cateupdate
     * 模型分类更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function cateupdate()
    {
        $m = M('ModelCate');
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
        if ($m->where($condition)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $condition['ename'] . $condition['emark'] . '已经存在！');
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
     * 模型分类删除
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catedelete()
    {
        $id = intval($_GET['id']);
        $m = M('ModelCate');
        $list = M('ModelField');
        if ($list->where('cate_id=' . $id)->find()) {
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
     * 内容模型字段列表
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     * @todo 模型各项操作
     */
    public function catelist()
    {
        $m = M('ModelCate');
        $cate = $m->field('id,ename')->select();
        $this->assign('cate', $cate);
        $this->display();
    }

    /**
     * catelistcate
     * 模型列表左侧菜单
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelistcate()
    {//点击左侧信息打开右侧
        $id = intval($_GET['id']);
        //echo $id;
        $this->assign('id', $id);
        $this->display('catelisttab');
    }

    /**
     * catelistadd
     * 模型列表编辑添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelistadd()
    {
        $id = intval($_GET['id']);
        $this->assign('id', $id);
        $this->display();
    }

    /**
     * catelistedit
     * 模型列表编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelistedit()
    {
        $id = intval($_GET['id']);
        $list = M('ModelField');
        $data = $list->where('id=' . $id)->find();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * cateJson
     * 返回catejson联动分类数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function cateJson()
    {
        $m = M('ModelCate');
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

}
?>

