<?php

/**
 * NewsSortModel.class.php
 * 分类相关信息
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-12-3 20:22
 * @package  Controller
 * @todo
 */
class NewsSortModel extends Model {

    /**
     * updatePath
     * 更新路径
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function updatePath($sort_id, $sort_path, $tbname)
    {
        $m = M($tbname);
        $condition['path'] = array('like', '%,' . $sort_id . ',%');
        $condition['parent_id'] = array('eq', intval($sort_id));
        $condition['_logic'] = 'OR';
        $result = $m->field('id,path')->where($condition)->select();
        //$aa = $m->getLastSql();
        //$json = array('status' => '1', 'info' => $aa,);
        //echo json_encode($json);
        //exit;
        foreach ($result as $k => $v) {
            //if ($sort_path == ',')
            //unset($sort_path);
            $data['path'] = $sort_path . substr($v['path'], strpos($v['path'], $sort_id . ','), strlen($v['path']));
            //$json = array('status' => '1', 'info' => $sort_path .'++++'.$sort_id.'===='.$v['path'].'----'.$data['path']);
            //echo json_encode($json);
            //exit;
            $m->where('id=' . intval($v['id']))->save($data);
        }



//        $json = array('status' => '1', 'info' => '不能111！',);
//        echo json_encode($json);
//        exit;
//        exit;
//
//        $result = $this->db->select('SELECT cat_id,cat_path FROM sdb_goods_cat WHERE cat_path like \'' . $cat_id . ',%\' or parent_id=' . intval($cat_id) . '');
//        foreach ($result as $k => $v) {
//            if ($cat_path == ',')
//                unset($cat_path);
//            $path = $cat_path . substr($v['cat_path'], strpos($v['cat_path'], $cat_id . ','), strlen($v['cat_path']));
//
//
//            $this->db->exec('update sdb_goods_cat set cat_data-path="' . $path . '" where cat_id=' . intval($v['cat_id']));
//        }
    }

    /**
     * updateRolePath
     * 更新角色节点的路径
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    function updateRolePath($sort_id, $sort_path, $tbname)
    {
        $m = M($tbname);
        $condition['path'] = array('like', '%,' . $sort_id . ',%');
        $condition['pid'] = array('eq', intval($sort_id));
        $condition['_logic'] = 'OR';
        $result = $m->field('id,path')->where($condition)->select();
        foreach ($result as $k => $v) {
            $data['path'] = $sort_path . substr($v['path'], strpos($v['path'], $sort_id . ','), strlen($v['path']));
            $m->where('id=' . intval($v['id']))->save($data);
        }
    }

}