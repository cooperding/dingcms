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
class SettingAction extends AdminAction
{

    /**
     * index
     * 系统基本参数
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index()
    {
        $setting = M('Setting');
        $list = $setting->select();
        $name = array(
            '1' => '站点设置',
            '2' => '附件设置',
            '3' => '信息相关',
            '4' => '会员设置',
            '5' => '邮箱设置',
            '6' => '其它设置'
        );
        $array = array();
        foreach ($name as $m => $n)
        {
            foreach ($list as $k => $v)
            {
                if ($m == $v['sys_gid'])
                {
                    $array[$m]['title'] = $n;
                    $array[$m]['slist'][] = $v;
                }
            }
        }
        $this->assign('list', $array);
        $this->display();
    }

    /**
     * add
     * 系统基本参数添加
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function add()
    {
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
        $this->display();
    }

    /**
     * edit
     * 系统基本参数编辑
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function edit()
    {
        $setting = M('Setting');
        $id = $_GET['id'];
        $data = $setting->where('sys_id=' . $id)->find();
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
        $this->assign('list', $data);
        $this->display();
    }

    /**
     * insert
     * 系统基本参数插入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function insert()
    {
        $setting = M('Setting');
        //判断参数是否符合条件
        //先判断是否有重复的名称
        $sys_name['sys_name'] = $_POST['sys_name'];
        $rs = $setting->where($sys_name)->find();
        if (!empty($rs))
        {//不为空说明存在，存在就不能添加
            echo '1';
            exit;
        } else
        {
            $sys_type = $_POST['sys_type'];
            $_POST['sys_type'] = $sys_type[0];
            if ($setting->create($_POST))
            {
                $rs = $setting->add($_POST);
                if ($rs)
                {
                    echo 2;
                } else
                {
                    echo 3;
                }
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
    public function update()
    {
        $setting = M('Setting');
        $sys_name['sys_name'] = trim($_POST['sys_name']);
        $sys_name['sys_id'] = array('neq', $_POST['sys_id']);
        $rs = $setting->where($sys_name)->find();
        if (!empty($rs))
        {
            echo '1';
            exit;
        } else
        {
            $sys_type = $_POST['sys_type'];
            $_POST['sys_type'] = $sys_type[0];
            $rs = $setting->save($_POST);
            if ($rs == 1)
            {
                echo 2;
            } elseif ($rs == 0)
            {
                echo 4;
            } else
            {
                echo 3;
            }
        }
    }

    /**
     * batchupdate
     * 系统基本参数批量更新
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 重新写
     */
    public function batchupdate()
    {
        echo '<pre>';
        print_r($_POST);
        $setting = M('Setting');
        foreach ($_POST as $k => $v)
        {
            //$data['sys_id'] = $k;
            echo $v;
            exit;
            $data['sys_value'] = $v;
            $rs = $setting->where('sys_id=' . $k)->data($data)->save();
        }
        if ($rs == 1)
        {
            echo 2;
        } elseif ($rs == 0)
        {
            echo 4;
        } else
        {
            echo 3;
        }
    }

    /**
     * jsonTree
     * 系统基本参数jsonTree树结构
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonTree()
    {
        
    }

}