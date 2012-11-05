<?php

/**
 * NewsCateAction.class.php
 * 信息分类
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0 
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 分类各项操作
 */
class NewsCateAction extends AdminAction
{

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
        $m = M('NewsCate');
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
        $m = M('NewsCate');
        $parent_id = intval($_POST['parent_id']);
        $text = trim($_POST['text']);
        if (empty($text))
        {
            $json = array('status' => '1', 'info' => '分类名不能为空！');
            echo json_encode($json);
            exit;
        }
        $en_name = trim($_POST['en_name']);
        if (empty($en_name))
        {
            import("ORG.Util.Pinyin");
            $pinyin = new Pinyin();
            $_POST['en_name'] = $pinyin->output($_POST['text']);
        }
        if ($parent_id != 0)
        {
            $data = $m->where('id=' . $parent_id)->find();
            $_POST['path'] = $data['path'] . $parent_id . ',';
        }
        if ($m->create($_POST))
        {
            $rs = $m->add($_POST);
            if ($rs)
            {
                $json = array('status' => '2', 'info' => '分类添加成功！', 'isclose' => 'ok');
                echo json_encode($json);
            } else
            {
                $json = array('status' => '2', 'info' => '分类添加失败！');
                echo json_encode($json);
            }
        }
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
        $m = M('NewsCate');
        $id = intval($_POST['id']);
        $parent_id = intval($_POST['parent_id']);
        if ($parent_id != 0)
        {
            $cun = $m->where('id=' . $parent_id . ' and  path like \'%,' . $id . ',%\'')->find(); //判断id选择是否为其的子类
            if ($cun)
            {
                $json = array('status' => '1', 'info' => '不能选择当前分类的子类为父级分类！',);
                echo json_encode($json);
                exit;
            }
            $en_name = trim($_POST['en_name']);
            if (empty($en_name))
            {
                import("ORG.Util.Pinyin");
                $pinyin = new Pinyin();
                $_POST['en_name'] = $pinyin->output($_POST['text']);
            }
            $fdata = $m->where('id=' . $parent_id)->find();
            $fpath = $fdata['path'] . $parent_id . ','; //替换
            $sdata = $m->where('id=' . $id)->find();
            $spath = $sdata['path']; //搜索
            if ($fpath != $spath)
            {//当二者相同时不必更新，不相同时说明选择父级有变化。执行sql语句
                $sfid = $sdata['parent_id'];
                $sql = "update __TABLE__ set `path` = REPLACE(`path`,'$spath','$fpath') WHERE INSTR(`path`,'$spath')>0 and `path` like '%,$id,%'";
                $m->query($sql);
            }
            $_POST['path'] = $fpath;
            $rs = $m->save($_POST);
            if ($rs == 1)
            {
                $json = array('status' => '2', 'info' => '更新成功！', 'isclose' => 'ok');
                echo json_encode($json);
            } elseif ($rs == 0)
            {
                $json = array('status' => '1', 'info' => '更新失败！');
                echo json_encode($json);
            } else
            {
                $json = array('status' => '2', 'info' => '未有操作！');
                echo json_encode($json);
            }
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
        $m = M('NewsCate');
        $list = $m->select();
        $navcatCount = $m->count("id");
        $a = array();
        foreach ($list as $k => $v)
        {
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
        $m = M('NewsCate');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

}