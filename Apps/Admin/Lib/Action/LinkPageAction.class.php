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
class LinkPageAction extends AdminAction
{

    public function cate()
    {
        $this->display();
    }

    public function cateadd()
    {
        $this->display();
    }

    public function cateedit()
    {
        $m = M('LinkpageCate');
        $data = $m->where('id=' . intval($_GET['id']))->find();
        $this->assign('data', $data);
        $this->display();
    }

    public function cateinsert()
    {
        
    }

    public function cateupdate()
    {
        $m = M('LinkpageCate');
        $id = intval($_POST['id']);
        $json = array('status' => '1', 'info' => $id);
        echo json_encode($json);
        exit;
    }

    public function catelist()
    {
        $this->display();
    }

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

}
?>

