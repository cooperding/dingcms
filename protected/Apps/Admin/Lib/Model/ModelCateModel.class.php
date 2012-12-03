<?php

/**
 * ModelCateModel.class.php
 * 内容模型数据表字段
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 内容模型数据表及字段操作
 */
class ModelCateModel extends Model {

    /**
     * addtable
     * 创建数据表
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function addtable($tablename)
    {
        $Model = new Model();
        if (empty($tablename)) {
            $json = array('status' => '1', 'info' => '写入的数据表名为空，请确认输入。');
            echo json_encode($json);
            exit;
        }
        $tablename = C('DB_PREFIX') . C('DB_ADD_PREFIX') . $tablename;
        $sql = 'CREATE TABLE IF NOT EXISTS `' . $tablename . '` (
  `id` int(20) NOT NULL auto_increment,
  `title_id` int(20) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ';
        $Model->query($sql);
    }

    /**
     * edittable
     * 更新数据表名
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function edittable($oldname, $newname)
    {
        $Model = new Model();
        if (empty($oldname) || empty($newname)) {
            $json = array('status' => '1', 'info' => '写入的数据表名为空，请确认输入。');
            echo json_encode($json);
            exit;
        }
        $oldname = C('DB_PREFIX') . C('DB_ADD_PREFIX') . $oldname;
        $newname = C('DB_PREFIX') . C('DB_ADD_PREFIX') . $newname;
        $sql = 'alter table ' . $oldname . ' rename to ' . $newname;
        $Model->query($sql);
    }

    /**
     * droptable
     * 删除数据表
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function droptable($tablename)
    {
        $Model = new Model();
        if (empty($tablename)) {
            $json = array('status' => '1', 'info' => '写入的数据表名为空，请确认输入。');
            echo json_encode($json);
            exit;
        }
        $tablename = C('DB_PREFIX') . C('DB_ADD_PREFIX') . $tablename;
        $sql = 'DROP TABLE ' . $tablename;
        $Model->query($sql);
    }

    /**
     * addfield
     * 增加数据表字段
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function addfield($tablename, $field, $type, $length)
    {
        $Model = new Model();
        $tablename = C('DB_PREFIX') . C('DB_ADD_PREFIX') . $tablename;
        switch ($type) {
            case varchar:
                $type = 'varchar';
                if (!is_int($length)||$length<0) {
                    $json = array('status' => '1', 'info' => '有效长度，不是数字或数字字符，请重新输入！');
                    echo json_encode($json);
                    exit;
                }
                $length = ($length>255)?255:$length;
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `'.$field.'` '.$type.'('.$length.') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL';
                break;
            case textarea:
                $type = 'text';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case htmltext:
                $type = 'text';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case int:
                $type = 'int';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case double:
                $type = 'double';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case datetime:
                $type = 'int';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case images:
                $type = 'varchar';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case media:
                $type = 'varchar';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case addon:
                $type = 'varchar';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case select:
                $type = 'varchar';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case radio:
                $type = 'varchar';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case checkbox:
                $type = 'varchar';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            case stepselect:
                $type = 'mediumint';
                $length = '';
                $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
                break;
            default :
                $json = array('status' => '1', 'info' => '字段类型选择错误，请重新选择字段类型！');
                echo json_encode($json);
                exit;
        }
        $json = array('status' => '1', 'info' => 't:' . $tablename . '已经存在！z:' . $field . '.l:' . $length);
        echo json_encode($json);
        exit;

        $sql = 'ALTER TABLE `' . $tablename . '` ADD `' . $field . '` INT( 8 ) UNSIGNED NULL';
        $Model->query($sql);
        $sql = 'alter table $table add $field $type($length) $null';
        $sql = 'ALTER TABLE `d2d` ADD `dede` INT( 8 ) UNSIGNED NULL';
        $sql = 'ALTER TABLE `d2d` ADD `test` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  \'得得\'';
    }

    /**
     * editfield
     * 修改数据表字段
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function editfield()
    {
        $Model = new Model();
        $sql = 'ALTER TABLE `d2d` CHANGE `dede` `dede22` INT( 8 ) UNSIGNED NULL DEFAULT NULL';
    }

    /**
     * detelefield
     * 删除数据表字段
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function detelefield($tablename, $field)
    {
        $Model = new Model();
        $sql = 'ALTER TABLE `d2d` DROP `dede22`';
    }

}

?>
