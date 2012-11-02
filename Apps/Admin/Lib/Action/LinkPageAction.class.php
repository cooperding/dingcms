<?php

// +----------------------------------------------------------------------
// | DingCMS [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012- http://dingcms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 正侠客 <lookcms@gmail.com>
// +----------------------------------------------------------------------

/**
 * DingCMS 系统配置
 * 主要用于全站系统配置
 * @category   admin
 * @package  admin
 * @subpackage  admin Action
 * @author    正侠客 <lookcms@gmail.com>
 */
class LinkPageAction extends AdminAction {

    public function cate() {
        $this->display();
    }

    public function cateadd() {
        $radios = array(
            'true' => '启用',
            'false' => '禁用'
        );
        $this->assign('radios', $radios);
        $this->display();
    }

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

    public function cateinsert() {
        $m = M('LinkpageCate');
        $id = intval($_POST['id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['egroup'] = trim($_POST['egroup']);
        $data['egroup'] = $_POST['egroup'];
        if (empty($_POST['ename']) || empty($_POST['egroup'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if($m->where($data)->find()){
            $json = array('status' => '1', 'info' => '您输入的标识'.$_POST['egroup'].'已经存在！');
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

    public function cateupdate() {
        $m = M('LinkpageCate');
        $id = intval($_POST['id']);
        $_POST['ename'] = trim($_POST['ename']);
        $_POST['egroup'] = trim($_POST['egroup']);
        $data['egroup'] = $_POST['egroup'];
        $data['id'] = array('neq',$id);
        if (empty($_POST['ename']) || empty($_POST['egroup'])) {
            $json = array('status' => '1', 'info' => '请将信息输入完整。');
            echo json_encode($json);
            exit;
        }
        if($m->where($data)->find()){
            $json = array('status' => '1', 'info' => '您输入的标识'.$_POST['egroup'].'已经存在！');
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

    public function catelist() {
        $this->display();
    }

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

}
?>

