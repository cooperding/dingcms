<?php

/**
 * NewsAction.class.php
 * 信息内容
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 信息各项操作
 */
class NewsAction extends AdminAction {

    /**
     * index
     * 信息列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index() {
        $m = M('Title');
        $id = intval($_GET['id']);
        $id = 1;
        $condition['sort_id'] = $id;
        $data = $m->where($condition)->select();
        $array = array();
        $array['total'] = 50;
        $array['rows'] = $data;
//        echo '<pre>';
//        echo json_encode($array);
//        echo '<br/>';
//        print_r($data);
//        exit;
        $this->display();
    }

    /**
     * newslist
     * 信息列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function newslist() {
        $id = intval($_GET['id']);
        $this->assign('id', $id);
        $this->display('newslist');
    }

    /**
     * listJsonId
     * 取得field信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function listJsonId() {
        $m = M('Title');
        //$c = M('Title');
        import('ORG.Util.Page');// 导入分页类
        $id = intval($_GET['id']);
        //$id = 1;
        $pageNumber = intval($_POST['page']);
       // $pageRows = intval($_POST['rows']);
        //$pageRows = intval($_GET['rows']);
        
        //$pageRows = (intval($_GET['rows'])==FALSE)?(intval($_POST['rows'])):intval($_GET['rows']);
        if($_POST){
            //$pageRows = intval($_GET['rows']);
            $pageRows = intval($_POST['rows']);
        }else{
            $pageRows = intval($_GET['rows']);
        }
        $pageNumber = (($pageNumber == null || $pageNumber == 0) ? 1:$pageNumber); 
        $pageRows = (($pageRows == FALSE) ? 20:$pageRows);
        //$pageRows = 5;
        //$condition['sort_id'] = array('like','%,'.$id.',%');
        $condition['sort_id'] = $id;
        $condition['is_recycle'] = 'false';
        $count = $m->where($condition)->count();
        $page       = new Page($count,$pageRows);
        //$this->dmsg('1', 'dede', true, true);
        //start = (intPage-1)*number
        $firstRow = ($pageNumber-1)*$pageRows;
        //limit($Page->firstRow.','.$Page->listRows)->
        $data = $m->where($condition)->limit($firstRow.','.$pageRows)->select();
        //$list = $User->where('status=1')->order('create_time')->limit($page->firstRow.','.$Page->listRows)->select();
       // $data = $m->where($condition)->limit('1,5')->select();
        
        
        //$data = $m->select();
        $array = array();
        $array['total'] = $count;
        $array['rows'] = $data;
        
        echo json_encode($array);
    }
    /**
     * json
     * 信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     
    public function json() {

        $m = M('NavHead');
        $list = $m->select();
        $navcatCount = $m->count("id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
        }
        $array = array();
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        echo json_encode($array);
        //echo $json;
    }
*/
    /**
     * jsonCateTree
     * 分类树信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonCateTree() {
        Load('extend');
        $m = M('NewsCate');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => '全部文档')), $tree);
        echo json_encode($tree);
    }

}