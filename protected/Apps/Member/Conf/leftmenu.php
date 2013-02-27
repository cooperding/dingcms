<?php

//menu菜单
defined('THINK_PATH') or exit();
$array = array(
    array('label' => '基础功能', 'type' => 'templet_name', 'items' => array(
            array('label' => '资料管理', 'type' => 'templet_', 'items' => array(
                    array('label' => '个人资料', 'type' => 'perinfo', 'rel' => 'dialog','link' => __APP__ . '/Account/perinfo'),
                    array('label' => '修改密码', 'type' => 'changepwd', 'rel' => 'dialog','link' => __APP__ . '/Account/changepwd')
            ))
    )),
    array('label' => '信息中心', 'type' => 'templet_name', 'items' => array(
            array('label' => '留言管理', 'type' => 'templet_', 'items' => array(
                    array('label' => '我的留言', 'type' => 'message', 'link' => __APP__ . '/Message/index'),
                    array('label' => '添加留言', 'type' => 'message', 'rel' => 'dialog', 'link' => __APP__ . '/Message/add')
            )),
            array('label' => '评论管理', 'type' => 'comment', 'items' => array(
                    array('label' => '我的评论', 'type' => 'comment', 'link' => __APP__ . '/Comment/index')
            )),
            array('label' => '友情链接', 'type' => 'setting', 'items' => array(
                    array('label' => '我的友情链接', 'type' => 'setting', 'link' => 'www.baidu.com'),
                    array('label' => '添加友情链接', 'type' => 'setting', 'rel' => 'dialog', 'link' => 'www.baidu.com')
            ))
    )),
    array('label' => '电子商务', 'type' => 'plugins', 'items' => array(
            array('label' => '订单管理', 'type' => 'flash', 'items' => array(
                    array('label' => '我的订单', 'type' => 'list', 'link' => __APP__ . '/Logs/index'),
                    array('label' => '未完成订单', 'type' => 'navhead', 'link' => __APP__ . '/Logsinfo/index'),
                    array('label' => '已完成订单', 'type' => 'navhead', 'link' => __APP__ . '/Logsinfo/index'),
                    array('label' => '取消的订单', 'type' => 'navhead', 'link' => __APP__ . '/Logsinfo/index')
            )),
            array('label' => '财务管理', 'type' => 'flash', 'items' => array(
                    array('label' => '财务记录', 'type' => 'list', 'link' => __APP__ . '/Flash/index'),
                    array('label' => '在线充值', 'type' => 'navhead', 'link' => __APP__ . '/Flash/sort')
            )),
            array('label' => '广告管理', 'type' => 'flash', 'items' => array(
                    array('label' => '广告列表', 'type' => 'advertising', 'link' => __APP__ . '/Ads/index'),
                    array('label' => '广告分类', 'type' => 'advertising', 'link' => __APP__ . '/Ads/sort')
            )),

    )),
    array('label' => 'B2B信息', 'type' => 'templet_name', 'items' => array(
            array('label' => '资料管理', 'type' => 'templet_', 'items' => array(
                    array('label' => '个人资料', 'type' => 'ffg', 'link' => 'www.baidu.com'),
                    array('label' => '修改密码', 'type' => 'setting', 'rel' => 'dialog', 'link' => 'www.baidu.com')
            )),
            array('label' => '邮件模板', 'type' => 'setting', 'items' => array(
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            ))
    )),
    array('label' => 'B2C管理', 'type' => 'templet_name', 'items' => array(
            array('label' => '资料管理', 'type' => 'templet_', 'items' => array(
                    array('label' => '个人资料', 'type' => 'ffg', 'link' => 'www.baidu.com'),
                    array('label' => '修改密码', 'type' => 'setting', 'rel' => 'dialog', 'link' => 'www.baidu.com')
            )),
            array('label' => '邮件模板', 'type' => 'setting', 'items' => array(
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            ))
    ))
);


return $array;
?>