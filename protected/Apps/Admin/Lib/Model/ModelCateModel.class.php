<?php

/**
 * Description of ContentmodelModel
 *
 * @author Adminsir
 */
class ModelCateModel extends Model{

    //创建数据表
    function addtable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `d2d` (
  `id` int(20) NOT NULL auto_increment,
  `title_id` int(20) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ';
    }
    //更新数据表名
    function edittable(){

    }
    //删除数据表
    function droptable(){
        $sql = 'DROP TABLE d2d';
    }
    //增加数据表字段
    function addfield(){
        $sql = 'alter table $table add $field $type($length) $null';
    }
    //修改数据表字段
    function editfield(){

    }
}

?>
