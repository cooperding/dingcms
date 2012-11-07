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
     * 模型分类插入
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function cateinsert()
    {
        $m = M('LinkpageCate');
        $id = intval($_POST['id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['egroup'] = trim($_POST['egroup']);
        $data['egroup'] = $_POST['egroup'];
        $data['ename'] = $_POST['ename'];
        if (empty($_POST['ename']) || empty($_POST['egroup'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->where($data)->find()) {
            $json = array('status' => '1', 'info' => '您输入的名称或者标识' . $_POST['ename'] . $_POST['egroup'] . '已经存在！');
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
        }//if
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
        $m = M('LinkpageCate');
        $id = intval($_POST['id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['egroup'] = trim($_POST['egroup']);
        $data['egroup'] = $_POST['egroup'];
        $data['ename'] = $_POST['ename'];
        $data['id'] = array('neq', $id);
        if (empty($_POST['ename']) || empty($_POST['egroup'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->where($data)->find()) {
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
     * 模型分类删除
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catedelete()
    {
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
     * 内容模型字段列表
     * @access public
     * @return 返回页面
     * @version dogocms 1.0
     * @todo 模型各项操作
     */
    public function catelist()
    {
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

}
?>

