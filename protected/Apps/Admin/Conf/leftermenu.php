<?php

//menu菜单
defined('THINK_PATH') or exit();
$array = array(
    array('label' => L('menu_sys_name'), 'type' => 'sys_name', 'items' => array(
            array('label' => L('menu_nav_name'), 'type' => 'nav_name', 'items' => array(
                    array('label' => L('menu_nav_head'), 'type' => 'nav_head', 'link' => __APP__ . '/NavHead/index'),
                    array('label' => L('menu_nav_foot'), 'type' => 'nav_foot', 'link' => __APP__ . '/NavFoot/index')
            )),
            array('label' => L('menu_data_name'), 'type' => 'data_name', 'items' => array(
                    array('label' => L('menu_data_recover'), 'type' => 'datarecover','rel' => 'dialog', 'link' => __APP__ . '/Data/recover'),
                    array('label' => L('menu_data_backup'), 'type' => 'databackup', 'rel' => 'dialog', 'link' => __APP__ . '/Data/backup'),
                    array('label' => L('menu_data_backup_del'), 'type' => 'databackup_del','rel' => 'dialog', 'link' => __APP__ . '/Data/index'),
                    array('label' => L('menu_data_tool'), 'type' => 'data_tool', 'link' => __APP__ . '/Data/tool')
            )),
            array('label' => L('menu_setting_name'), 'type' => 'setting_name', 'items' => array(
                    array('label' => L('menu_setting_base'), 'type' => 'setting_base', 'link' => __APP__ . '/Setting/index')
            )),
    )),
    array('label' => L('menu_info_name'), 'type' => 'info_name', 'items' => array(
            array('label' => L('menu_news_name'), 'type' => 'news_name', 'items' => array(
                    array('label' => L('menu_news_list'), 'type' => 'news_list', 'link' => __APP__ . '/News/index'),
                    array('label' => L('menu_news_list_add'), 'type' => 'news_list_add', 'rel' => 'dialog','link' => __APP__ . '/News/add'),
                    array('label' => L('menu_news_recycle'), 'type' => 'news_recycle', 'link' => __APP__ . '/News/recycle')
            )),
            array('label' => L('menu_sort_name'), 'type' => 'sort_name', 'items' => array(
                    array('label' => L('menu_sort_list'), 'type' => 'sort_list', 'link' => __APP__ . '/NewsSort/index'),
                    array('label' => L('menu_sort_add'), 'type' => 'newssort', 'rel' => 'dialog', 'link' => __APP__ . '/NewsSort/add')
            )),
            array('label' => L('menu_message_name'), 'type' => 'message_name', 'items' => array(
                    array('label' => L('menu_message_list'), 'type' => 'message_list', 'link' => __APP__ . '/Message/index'),
                    array('label' => L('menu_message_sort'), 'type' => 'message_setting', 'link' => __APP__ . '/Message/sort')
            )),
            array('label' => L('menu_comment_name'), 'type' => 'comment_name', 'items' => array(
                    array('label' => L('menu_comment_list'), 'type' => 'comment_list', 'link' => __APP__ . '/Comment/index')
            )),
            array('label' => L('menu_singlepage_name'), 'type' => 'singlepage_name', 'items' => array(
                    array('label' => L('menu_singlepage_list'), 'type' => 'singlepage_list', 'link' => __APP__ . '/Pages/index'),
                    array('label' => L('menu_singlepage_sort'), 'type' => 'singlepage_sort', 'link' => __APP__ . '/Pages/sort'),
            )),
            array('label' => L('menu_block_name'), 'type' => 'block_name', 'items' => array(
                    array('label' => L('menu_block_list'), 'type' => 'block_list', 'link' => __APP__ . '/Block/index'),
                    array('label' => L('menu_block_cat'), 'type' => 'block_cat', 'link' => __APP__ . '/Block/sort')
            )),
    )),
    array('label' => L('menu_user_name'), 'type' => 'user_name', 'items' => array(
            array('label' => L('menu_member_name'), 'type' => 'member_name', 'items' => array(
                    array('label' => L('menu_member_perinfo'), 'type' => 'perinfo','rel' => 'dialog', 'link' =>  __APP__ . '/Account/perinfo'),
                    array('label' => L('menu_member_changepwd'), 'type' => 'changepwd','rel' => 'dialog', 'link' =>  __APP__ . '/Account/changepwd'),
                    array('label' => L('menu_member_adminlist'), 'type' => 'member_adminlist', 'link' => __APP__ . '/Operators/index'),
                    array('label' => L('menu_member_frontlist'), 'type' => 'member_frontlist', 'link' => __APP__ . '/Members/index')
            )),
            array('label' => L('menu_backcom_name'), 'type' => 'backcom_name', 'items' => array(
                    array('label' => L('menu_node_name'), 'type' => 'member_adminlist', 'link' => __APP__ . '/Node/index'),
                    array('label' => L('menu_role_name'), 'type' => 'member_adminlist', 'link' => __APP__ . '/Role/index')
            )),
            array('label' => L('menu_frontcom_name'), 'type' => 'frontcom_name', 'items' => array(
                    array('label' => L('menu_frontcom_cat'), 'type' => 'frontcom_cat', 'link' => 'www.baidu.com'),
                    array('label' => L('menu_frontcom_list'), 'type' => 'frontcom_list', 'link' => 'www.baidu.com')
            )),
    )),
    array('label' => '模板模块', 'type' => 'templet_name', 'items' => array(
            array('label' => '模板管理', 'type' => 'templet_', 'items' => array(
                    array('label' => '模板列表', 'type' => 'ffg', 'link' => 'www.baidu.com'),
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            )),
            array('label' => '邮件模板', 'type' => 'setting', 'items' => array(
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            )),
            array('label' => L('menu_channel_name'), 'type' => 'channel_name', 'items' => array(
                    array('label' => L('menu_model_cat'), 'type' => 'model_cat', 'link' => __APP__ . '/ContentModel/sort'),
                    array('label' => L('menu_model_list'), 'type' => 'model_list', 'link' => __APP__ . '/ContentModel/sortlist')
            )),
            array('label' => L('menu_linkpage_name'), 'type' => 'linkpage_name', 'items' => array(
                    array('label' => L('menu_linkpage_cat'), 'type' => 'linkpage_cat', 'link' => __APP__ . '/LinkPage/sort'),
                    array('label' => L('menu_linkpage_list'), 'type' => 'linkpage_list', 'link' => __APP__ . '/LinkPage/sortlist')
            )),
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
    )),
    array('label' => '更新生成', 'type' => 'update', 'items' => array(
            array('label' => '界面设置', 'type' => 'setting', 'items' => array(
                    array('label' => '基础设置', 'type' => 'abttc', 'link' => 'www.baidu.com'),
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            )),
    )),
    array('label' => '采集管理', 'type' => 'collect', 'items' => array(
            array('label' => '界面设置', 'type' => 'setting', 'items' => array(
                    array('label' => '基础设置', 'type' => 'aweebc', 'link' => 'www.baidu.com'),
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            )),
    )),
    array('label' => '其它管理', 'type' => 'other', 'items' => array(
            array('label' => '地区管理', 'type' => 'setting', 'items' => array(
                    array('label' => '添加地区', 'type' => 'abfrfrc', 'link' => 'www.baidu.com'),
                    array('label' => '地区列表', 'type' => 'setting', 'link' => 'www.baidu.com')
            )),
    )),
    array('label' => '开发工具', 'type' => 'develop', 'items' => array(
            array('label' => '界面设置', 'type' => 'setting', 'items' => array(
                    array('label' => '基础设置', 'type' => 'abdsfc', 'link' => 'www.baidu.com'),
                    array('label' => '基础设置', 'type' => 'setting', 'link' => 'www.baidu.com')
            )),
    )),
);





// unset($array);
// foreach($menu as $k=>$v){
// }
// echo "<pre>";
// header('content-type:text/html;charsert=utf-8');
// print_r($menu);
// exit;
return $array;
?>