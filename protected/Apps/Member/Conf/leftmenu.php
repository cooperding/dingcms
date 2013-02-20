<?php

//menu菜单
defined('THINK_PATH') or exit();
$array = array(
    array('label' => '基础功能', 'type' => 'templet_name', 'items' => array(
            array('label' => '模板管理', 'type' => 'templet_', 'items' => array(
                    array('label' => '模板列表', 'type' => 'ffg', 'link' => 'www.baidu.com'),
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            )),
            array('label' => '邮件模板', 'type' => 'setting', 'items' => array(
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            ))
    )),
    array('label' => '插件管理', 'type' => 'plugins', 'items' => array(
            array('label' => '日志管理', 'type' => 'flash', 'items' => array(
                    array('label' => '日志记录', 'type' => 'list', 'link' => __APP__ . '/Logs/index'),
                    array('label' => '日志设置', 'type' => 'navhead', 'link' => __APP__ . '/Logsinfo/index')
            )),
            array('label' => '幻灯管理', 'type' => 'flash', 'items' => array(
                    array('label' => '幻灯列表', 'type' => 'list', 'link' => __APP__ . '/Flash/index'),
                    array('label' => '幻灯分类', 'type' => 'navhead', 'link' => __APP__ . '/Flash/sort')
            )),
            array('label' => '广告管理', 'type' => 'flash', 'items' => array(
                    array('label' => '广告列表', 'type' => 'advertising', 'link' => __APP__ . '/Ads/index'),
                    array('label' => '广告分类', 'type' => 'advertising', 'link' => __APP__ . '/Ads/sort')
            )),
            array('label' => '友情链接', 'type' => 'setting', 'items' => array(
                    array('label' => '友情链接', 'type' => 'list', 'link' => __APP__ . '/Links/index'),
                    array('label' => '友情链接分类', 'type' => 'list', 'link' => __APP__ . '/Links/sort'),
                    array('label' => '添加友情链接', 'type' => 'links', 'rel' => 'dialog', 'link' => __APP__ . '/Links/add')
            )),
    ))
);


return $array;
?>