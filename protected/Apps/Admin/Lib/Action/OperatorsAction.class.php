<?php

/**
 * OperatorsAction.class.php
 * 后台会员
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2013-1-5 14:57
 * @package  Controller
 * @todo 信息各项操作
 */
class OperatorsAction extends BaseAction {

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
     * add
     * 添加会员
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
        $this->display();
    }

    /**
     * edit
     * 编辑会员
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function edit()
    {
        $m = M('Operators');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $radios = array(
            '1' => '启用',
            '0' => '禁用'
        );
        $this->assign('data', $data);
        $this->assign('radios', $radios);
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
        $m = M('Role');
        $this->dmsg('1', '该功能未开发不能操作！', false, true);
        $name = trim($_POST['name']);
        $_POST['status'] = $_POST['status'][0];
        //$this->dmsg('1', $_POST['status'], false, true);
        if (empty($name)) {
            $this->dmsg('1', '角色名不能为空！', false, true);
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

        $this->dmsg('1', '该功能未开发不能操作！', false, true);
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
        $this->dmsg('1', '该功能未开发不能操作！', false, true);
    }

    /**
     * listJsonId
     * 取得field信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function listJsonId()
    {
        $m = M('Operators');
        //$s = M('NewsSort');
        import('ORG.Util.Page'); // 导入分页类
        //$id = intval($_GET['id']);

        $pageNumber = intval($_POST['page']);
        $pageRows = intval($_POST['rows']);
        $pageNumber = (($pageNumber == null || $pageNumber == 0) ? 1 : $pageNumber);
        $pageRows = (($pageRows == FALSE) ? 10 : $pageRows);

        $condition['is_recycle'] = isset($_GET['is_recycle']) ? 'true' : 'false';
        $count = $m->where($condition)->count();
        $page = new Page($count, $pageRows);
        $firstRow = ($pageNumber - 1) * $pageRows;
        $data = $m->where($condition)->limit($firstRow . ',' . $pageRows)->order('id desc')->select();
        foreach ($data as $k => $v) {
            $data[$k]['creat_time'] = date('Y-m-d H:i:s', $v['creat_time']);
        }
        $array = array();
        $array['total'] = $count;
        $array['rows'] = $data;
        echo json_encode($array);
    }

}

?>