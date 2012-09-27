<?php
//由ThinkPHP工具箱生成的配置文件

defined('THINK_PATH') or exit();




$array= array(
       	array('label'=>'系统设置','type'=>'setting','items' =>array(
              array('label' =>'导航设置','type'=>'setting','items' =>array(
                    array('label' => '网站导航','type'=>'nav','link' => __APP__.'/Nav/index'),
                    array('label' => '底部导航','type'=>'setting','link' => __APP__.'/Login/add')
              )),
              array('label' =>'数据管理','type'=>'setting','items' =>array(
                    array('label' => '数据恢复','type'=>'datahuifu','link' => __APP__.'/Setting/index'),
                    array('label' => '数据备份','type'=>'databeifen','link' =>  __APP__.'/Setting/index'),
                    array('label' => '数据备份删除','type'=>'datadelete','link' =>  __APP__.'/Setting/index'),
                    array('label' => '数据工具','type'=>'datatools','link' =>  __APP__.'/Setting/index'),

              )),
              array('label' =>'系统设置','type'=>'sysconf','items' =>array(
                    array('label' => '基本参数设置','type'=>'basesysconf','link' => __APP__.'/Setting/index'),
              )),
        )),
       	array('label'=>'信息中心','type'=>'content','items' =>array(
              array('label' =>'文章管理','type'=>'setting','items' =>array(
                    array('label' => '添加文章','type'=>'sss','link' => 'www.baidu.com'),
                    array('label' => '文章列表','type'=>'setting','link' => 'www.baidu.com'),
                    array('label' => '文章分类栏目','type'=>'setting','link' => 'www.baidu.com'),
                    array('label' => '文章回收站','type'=>'setting','link' => 'www.baidu.com')
              )),
              array('label' =>'产品管理','type'=>'setting','items' =>array(
                    array('label' => '添加产品','type'=>'sss','link' => 'www.baidu.com'),
                    array('label' => '产品列表','type'=>'sss','link' => 'www.baidu.com'),
                    array('label' => '产品分类栏目','type'=>'sss','link' => 'www.baidu.com'),
                    array('label' => '产品回收站','type'=>'setting','link' => 'www.baidu.com')
              )),
              array('label' =>'留言管理','type'=>'setting','items' =>array(
                    array('label' => '留言信息','type'=>'sss','link' => 'www.baidu.com'),
                    array('label' => '留言设置','type'=>'sss','link' => 'www.baidu.com'),
              )),
              array('label' =>'评论管理','type'=>'setting','items' =>array(
                    array('label' => '评论信息','type'=>'sss','link' => 'www.baidu.com'),
                    array('label' => '评论设置','type'=>'sss','link' => 'www.baidu.com'),
              )),
              array('label' =>'单页管理','type'=>'setting','items' =>array(
                    array('label' => '单页文档','type'=>'sss','link' => 'www.baidu.com'),
              )),
              array('label' =>'碎片文档','type'=>'setting','items' =>array(
                    array('label' => '添加碎片','type'=>'sss','link' => 'www.baidu.com'),
                    array('label' => '碎片列表','type'=>'setting','link' => 'www.baidu.com'),
                    array('label' => '碎片分类','type'=>'setting','link' => 'www.baidu.com')
              )),
        )),

       	array('label'=>'用户管理','type'=>'user','items' =>array(
              array('label' =>'用户管理','type'=>'setting','items' =>array(
                    array('label' => '个人资料','type'=>'adddbc','link' => 'www.baidu.com'),
                    array('label' => '后台用户列表','type'=>'setting','link' => 'www.baidu.com'),
                    array('label' => '前台会员列表','type'=>'setting','link' => 'www.baidu.com'),
              )),
              array('label' =>'后台权限管理','type'=>'setting','items' =>array(
                    array('label' => '后台权限分类','type'=>'adddbc','link' => 'www.baidu.com'),
                    array('label' => '后台权限列表','type'=>'setting','link' => 'www.baidu.com')
              )),
              array('label' =>'前台权限管理','type'=>'setting','items' =>array(
                    array('label' => '基础设置','type'=>'adddbc','link' => 'www.baidu.com'),
                    array('label' => '基础设置','type'=>'setting','link' => 'www.baidu.com')
              )),
        )),

       	array('label'=>'模板设置','type'=>'themes','items' =>array(
              array('label' =>'模板管理','type'=>'setting','items' =>array(
                    array('label' => '模板列表','type'=>'ffg','link' => 'www.baidu.com'),
                    array('label' => '基础设置','type'=>'setting','link' => 'www.baidu.com')
              )),
              array('label' =>'邮件模板','type'=>'setting','items' =>array(
                    array('label' => '基础设置','type'=>'setting','link' => 'www.baidu.com')
              )),
        )),

       	array('label'=>'插件管理','type'=>'plugins','items' =>array(
              array('label' =>'界面设置','type'=>'setting','items' =>array(
                    array('label' => '基础设置','type'=>'aeebc','link' => 'www.baidu.com'),
                    array('label' => '基础设置','type'=>'setting','link' => 'www.baidu.com')
              )),
        )),

       	array('label'=>'更新生成','type'=>'update','items' =>array(
              array('label' =>'界面设置','type'=>'setting','items' =>array(
                    array('label' => '基础设置','type'=>'abttc','link' => 'www.baidu.com'),
                    array('label' => '基础设置','type'=>'setting','link' => 'www.baidu.com')
              )),
        )),

       	array('label'=>'采集管理','type'=>'collect','items' =>array(
              array('label' =>'界面设置','type'=>'setting','items' =>array(
                    array('label' => '基础设置','type'=>'aweebc','link' => 'www.baidu.com'),
                    array('label' => '基础设置','type'=>'setting','link' => 'www.baidu.com')
              )),
        )),

       	array('label'=>'其它管理','type'=>'other','items' =>array(
              array('label' =>'地区管理','type'=>'setting','items' =>array(
                    array('label' => '添加地区','type'=>'abfrfrc','link' => 'www.baidu.com'),
                    array('label' => '地区列表','type'=>'setting','link' => 'www.baidu.com')
              )),
        )),

       	array('label'=>'开发工具','type'=>'develop','items' =>array(
              array('label' =>'界面设置','type'=>'setting','items' =>array(
                    array('label' => '基础设置','type'=>'abdsfc','link' => 'www.baidu.com'),
                    array('label' => '基础设置','type'=>'setting','link' => 'www.baidu.com')
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