<?php

/**
 * NewsSortAction.class.php
 * 信息分类
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 分类各项操作
 */
class NewsSortAction extends AdminAction {

    /**
     * index
     * 分类信息列表
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
            $json = array('status' => '1', 'info' => '分类名不能为空！');
            echo json_encode($json);
            exit;
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
                $json = array('status' => '2', 'info' => '分类添加成功！', 'isclose' => 'ok');
                echo json_encode($json);
            } else {
                $json = array('status' => '2', 'info' => '分类添加失败！');
                echo json_encode($json);
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
        //流程：当选择的父级分类是现有分类的子级元素修改失败，当修改父级元素时，path同时也要修改
        //判断：
        $m = M('NewsSort');
        $d = D('NewsSort');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['parent_id']);

        //$data = $m->where('id=' . $parent_id)->find();
        //$sort_path = $data['path'].$parent_id.','; //取得不为0时的path
       // $tbname = 'NewsSort';
       // $sort_path = $data['path'].$parent_id.',';
       // $d->updatePath($id, $sort_path, $tbname);



        if ($parent_id != 0) {//不为0时判断是否为子分类
            $cun = $m->field('id')->where('id=' . $parent_id . ' and  path like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
            if ($cun) {
                $json = array('status' => '1', 'info' => '不能选择当前分类的子类为父级分类！',);
                echo json_encode($json);
                exit;
            }
            $data = $m->field('path')->where('id=' . $parent_id)->find();
            $sort_path = $data['path'].$parent_id.','; //取得不为0时的path
            $_POST['path'] = $data['path'].$parent_id.',';
            $tbname = 'NewsSort';
            $d->updatePath($id, $sort_path, $tbname);

        } else {//为0，path为,
            $data = $m->field('parent_id')->where('id=' . $id)->find();
            if ($data['parent_id'] != $parent_id) {//相同不改变
                $sort_path = ','; //取得不为0时的path
                $tbname = 'NewsSort';
                $d->updatePath($id, $sort_path, $tbname);
            }
            $_POST['path'] = ','; //应该是这个
        }
//        $data = $m->where('id=' . $id)->find();
//        $sort_path = $data['path'];
        //$_POST['path'] = $fpath;
        $en_name = trim($_POST['en_name']);
        if (empty($en_name)) {
            import("ORG.Util.Pinyin");
            $pinyin = new Pinyin();
            $_POST['en_name'] = $pinyin->output(trim($_POST['text']));
        }


//        $data = $m->where('id=' . $id)->find();
//        $sort_path = $data['path']; //取得不为0时的path
//                $tbname = 'NewsSort';
//                $d->updatePath($id, $sort_path, $tbname);
//
//        $json = array('status' => '1', 'info' => '不能222！',);
//        echo json_encode($json);
//        exit;
        /*

          if ($parent_id != 0) {
          $cun = $m->where('id=' . $parent_id . ' and  path like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
          if ($cun) {
          $json = array('status' => '1', 'info' => '不能选择当前分类的子类为父级分类！',);
          echo json_encode($json);
          exit;
          }
          $en_name = trim($_POST['en_name']);
          if (empty($en_name)) {
          import("ORG.Util.Pinyin");
          $pinyin = new Pinyin();
          $_POST['en_name'] = $pinyin->output(trim($_POST['text']));
          }
          $fdata = $m->where('id=' . $parent_id)->find();
          $fpath = $fdata['path'] . $parent_id . ','; //替换
          $sdata = $m->where('id=' . $id)->find();
          $spath = $sdata['path']; //搜索
          if ($fpath != $spath) {//当二者相同时不必更新，不相同时说明选择父级有变化。执行sql语句
          $sfid = $sdata['parent_id'];
          $sql = "update __TABLE__ set `path` = REPLACE(`path`,'$spath','$fpath') WHERE INSTR(`path`,'$spath')>0 and `path` like '%,$id,%'";
          $m->query($sql);
          }
          $_POST['path'] = $fpath;
          }
         */

        $rs = $m->save($_POST);
        if ($rs == 1) {
            $json = array('status' => '2', 'info' => '更新成功！', 'isclose' => 'ok');
            echo json_encode($json);
        } elseif ($rs == 0) {
            $json = array('status' => '1', 'info' => '更新失败！');
            echo json_encode($json);
        } else {
            $json = array('status' => '2', 'info' => '未有操作！');
            echo json_encode($json);
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
        $list = $m->select();
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
        $tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

}