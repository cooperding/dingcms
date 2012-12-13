<?php

/**
 * SettingAction.class.php
 * 系统基本参数
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 视图重新写
 */
class SettingAction extends AdminAction {

    /**
     * index
     * 系统基本参数
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index() {
        $m = M('Setting');
        //$list = $setting->select();
        /*
          $name = array(
          '1' => '站点设置',
          '2' => '附件设置',
          '3' => '信息相关',
          '4' => '会员设置',
          '5' => '邮箱设置',
          '6' => '其它设置'
          );
         *

          echo '<pre>';
          $data = $m->select();
          $array = array();

          foreach ($data as $k=>$v){
          if($v['sys_type']=='radio'){
          if($v['sys_value']==1){
          $v['sys_value'] = '是';
          }elseif($v['sys_value']==2){
          $v['sys_value'] = '否';
          }
          }
          $array['rows'][] = $v;
          }
          echo json_encode($data);
          echo '<br/>';
          echo json_encode($array);
          echo '<br/>';
          print_r($data);
          exit;
         */

        $name = array(
            array('id' => 1, 'text' => '站点设置'),
            array('id' => 2, 'text' => '附件设置'),
            array('id' => 3, 'text' => '信息相关'),
            array('id' => 4, 'text' => '会员设置'),
            array('id' => 5, 'text' => '邮箱设置'),
            array('id' => 6, 'text' => '其它设置')
        );
        //echo json_encode($name);
        //exit;
        $array = array();
        foreach ($name as $m => $n) {
            foreach ($list as $k => $v) {
                if ($m == $v['sys_gid']) {
                    $array[$m]['title'] = $n;
                    $array[$m]['slist'][] = $v;
                }
            }
        }
        //$this->assign('list', $array);
        $this->assign('list', $name);
        $this->display('settinglist');
    }

    /**
     * add
     * 系统基本参数添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function add() {
        $select = array(
            '1' => '站点设置',
            '2' => '附件设置',
            '3' => '信息相关',
            '4' => '会员设置',
            '5' => '邮箱设置',
            '6' => '其它设置'
        );
        $radios = array(
            'text' => '文本',
            'radio' => '布尔型',
            'textarea' => '多行文本'
        );
        $id = intval($_GET['id']);
        $this->assign('id', $id);
        $this->assign('select', $select);
        $this->assign('radios', $radios);
        $this->display();
    }

    /**
     * edit
     * 系统基本参数编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function edit() {
        $m = M('Setting');
        $id = intval($_GET['id']);
        $condition['id'] = $id;
        $data = $m->where($condition)->find();
        //$data = $setting->where('sys_id=' . $id)->find();
        $select = array(
            '1' => '站点设置',
            '2' => '附件设置',
            '3' => '信息相关',
            '4' => '会员设置',
            '5' => '邮箱设置',
            '6' => '其它设置'
        );
        $radios = array(
            'text' => '文本',
            'radio' => '布尔型',
            'textarea' => '多行文本'
        );

        $this->assign('select', $select);
        $this->assign('radios', $radios);
        $this->assign('sys_gid', $data['sys_gid']);
        $this->assign('sys_type', $data['sys_type']);
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * insert
     * 系统基本参数插入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function insert() {
        $m = M('Setting');
        $condition['sys_name'] = trim($_POST['sys_name']);
        if (empty($_POST['sys_gid']) || empty($condition['sys_name'])) {//不为空说明存在，存在就不能添加
            $this->dmsg('1', '变量名或者所属分组不能为空！');
        }
        $rs = $m->where($condition)->find();
        if (!empty($rs)) {//不为空说明存在，存在就不能添加
            $this->dmsg('1', '变量名"' . $condition['sys_name'] . '"已经存在');
        }
        $sys_type = trim($_POST['sys_type']);
        $_POST['sys_type'] = $sys_type[0];
        if ($m->create($_POST)) {
            $rs = $m->add($_POST);
            if ($rs) {
                $this->dmsg('2', '添加成功！', true);
            } else {
                $this->dmsg('1', '添加失败！');
            }
        }
    }

    /**
     * update
     * 系统基本参数更新
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function update() {
        $m = M('Setting');
        $condition['sys_name'] = trim($_POST['sys_name']);
        $condition['id'] = array('neq', $_POST['id']);
        if (empty($_POST['sys_gid']) || empty($condition['sys_name'])) {//不为空说明存在，存在就不能添加
            $this->dmsg('1', '变量名或者所属分组不能为空！');
        }
        $rs = $m->where($condition)->find();
        if (!empty($rs)) {//不为空说明存在，存在就不能添加
            $this->dmsg('1', '变量名"' . $condition['sys_name'] . '"已经存在');
        }
        //$sys_type = trim($_POST['sys_type']);
        //$_POST['sys_type'] = $sys_type;
        $rs = $m->save($_POST);
        if ($rs == 1) {
            $this->dmsg('2', '修改成功！', true);
        } elseif ($rs == 0) {
            $this->dmsg('1', '未有操作！');
        } else {
            $this->dmsg('1', '操作失败！');
        }
    }

    /**
     * batchupdate
     * 系统基本参数批量更新
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 重新写

      public function batchupdate()
      {
      echo '<pre>';
      print_r($_POST);
      $setting = M('Setting');
      foreach ($_POST as $k => $v) {
      //$data['sys_id'] = $k;
      echo $v;
      exit;
      $data['sys_value'] = $v;
      $rs = $setting->where('sys_id=' . $k)->data($data)->save();
      }
      if ($rs == 1) {
      echo 2;
      } elseif ($rs == 0) {
      echo 4;
      } else {
      echo 3;
      }
      }
     */

    /**
     * settinglist
     * 系统基本参数jsonTree树结构
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function settinglist() {
        $m = M('Setting');
        $id = intval($_GET['id']);
        //$condition['sys_gid'] = $id;
        //$data = $m->where($condition)->select();
        //$this->assign('data', $data);
        $this->assign('id', $id);
        $this->display('settingtab');
    }

    /**
     * delete
     * 删除信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function delete() {
        $this->dmsg('1', '暂不支持删除操作！', false, true);
        exit;
        $m = M('Setting');
        $id = intval($_POST['id']);
        $condition['id'] = $id;
        $del = $m->where($condition)->delete();
        if ($del == 1) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '删除操作失败！');
        }//if
    }

    /**
     * fieldJsonId
     * 取得field信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function fieldJsonId() {
        $m = M('Setting');
        $id = intval($_GET['id']);
        $condition['sys_gid'] = $id;
        $data = $m->where($condition)->select();
        //$data = $m->select();
        $array = array();

        foreach ($data as $k => $v) {
            if ($v['sys_type'] == 'radio') {
                if ($v['sys_value'] == 1) {
                    $v['sys_value'] = '是';
                } elseif ($v['sys_value'] == 2) {
                    $v['sys_value'] = '否';
                }
            }
            $array['rows'][] = $v;
        }
        echo json_encode($array);
    }

    /**
     * jsonCateTree
     * 分类树信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTree() {
        $name = array(
            array('id' => 1, 'text' => '站点设置'),
            array('id' => 2, 'text' => '附件设置'),
            array('id' => 3, 'text' => '信息相关'),
            array('id' => 4, 'text' => '会员设置'),
            array('id' => 5, 'text' => '邮箱设置'),
            array('id' => 6, 'text' => '其它设置')
        );
        echo json_encode($name);
        /*
        Load('extend');
        $m = M('NewsCate');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => '全部文档')), $tree);
        */
    }

}