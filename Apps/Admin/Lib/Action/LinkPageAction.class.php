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
class LinkPageAction extends AdminAction
{

    /**
     * cate
     * 联动分类信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function cate()
    {
        $this->display();
    }

    /**
     * cateadd
     * 联动分类添加
     * @access public
     * @return array
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
     * 联动分类编辑
     * @access public
     * @return array
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
     * 联动分类插入
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
        if (empty($_POST['ename']) || empty($_POST['egroup']))
        {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->where($data)->find())
        {
            $json = array('status' => '1', 'info' => '您输入的标识' . $_POST['egroup'] . '已经存在！');
            echo json_encode($json);
            exit;
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
        }//if
    }

    /**
     * cateupdate
     * 联动分类更新
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
        $data['id'] = array('neq', $id);
        if (empty($_POST['ename']) || empty($_POST['egroup']))
        {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if ($m->where($data)->find())
        {
            $json = array('status' => '1', 'info' => '您输入的标识' . $_POST['egroup'] . '已经存在！');
            echo json_encode($json);
            exit;
        }
        $rs = $m->save($_POST);
        if ($rs == 1)
        {
            $json = array('status' => '2', 'info' => '更新成功！', 'isclose' => 'ok');
            echo json_encode($json);
        } else
        {
            $json = array('status' => '2', 'info' => '未有操作！');
            echo json_encode($json);
        }//if
    }

    /**
     * catelist
     * 联动列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelist()
    {
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
    public function catelistcate()
    {//点击左侧信息打开右侧
        $id = $_GET['id'];
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
    public function catelistadd()
    {
        $id = $_GET['id'];
        echo $id;
    }

    /**
     * catelistedit
     * 联动列表编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function catelistedit()
    {
        $id = $_GET['id'];
        echo $id;
    }

    /**
     * catelistdelete
     * 联动列表删除
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function catelistdelete()
    {
        $id = $_GET['id'];
        echo $id;
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
        foreach ($list as $k => $v)
        {
            $a[$k] = $v;
        }
        $array = array();
        $array['total'] = $count;
        $array['rows'] = $a;
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
        $id = $_GET['id'];
        $tree = $m->field('id,parent_id,cate_name as text')->where('linkpage_id=' . $id)->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        //$tree = array_merge(array(array('id' => 0, 'text' => L('cat_root_name'))), $tree);
        echo json_encode($tree);
    }

}
?>

