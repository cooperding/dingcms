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
        /* $id = 2;
          $s = M('NewsSort');
          $condition_sort['id'] = $id;
          $condition_sort['path'] = array('like','%,'.$id.',%');
          $condition_sort['_logic'] = 'OR';
          $data_sort = $s->field('id')->where($condition_sort)->select();

          $a = '';
          foreach($data_sort as $v){
          $a .= $v['id'].',';
          }
          $a = rtrim($a, ',');
          $condition['sort_id'] = array('in',$a);
          $condition['is_recycle'] = 'false';
          $data = $m->where($condition)->select();
          echo $m->getLastSql();
          //$data = $m->field('t.id,t.title,t.updatetime,t.editor,t.status')->join(' join '.C('DB_PREFIX').'title as t')->join(C('DB_PREFIX') . 'news_sort ns ON ns.id = t.sort_id ')
          //->where('ns.id='.$id.' or ns.path like \'%,'.$id.',%\' and t.is_recycle=false')->select();

          $condition['sort_id'] = $id;
          $data = $m->where($condition)->select();
          $array = array();
          $array['total'] = 50;
          $array['rows'] = $data;

          echo '<pre>';
          //        echo json_encode($array);
          //        echo '<br/>';
          echo time();
          echo '<br/>';
          print_r($data);
          exit; */
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
        $s = M('NewsSort');
        import('ORG.Util.Page'); // 导入分页类
        $id = intval($_GET['id']);
        if ($id != 0) {//id为0时调用全部文档
            $condition_sort['id'] = $id;
            $condition_sort['path'] = array('like', '%,' . $id . ',%');
            $condition_sort['_logic'] = 'OR';
            $data_sort = $s->field('id')->where($condition_sort)->select();
            $sort_id = '';
            foreach ($data_sort as $v) {
                $sort_id .= $v['id'] . ',';
            }
            $sort_id = rtrim($sort_id, ',');
            $condition['sort_id'] = array('in', $sort_id);
        }
        $pageNumber = intval($_POST['page']);
        $pageRows = intval($_POST['rows']);
        $pageNumber = (($pageNumber == null || $pageNumber == 0) ? 1 : $pageNumber);
        $pageRows = (($pageRows == FALSE) ? 10 : $pageRows);
        $condition['is_recycle'] = 'false';
        $count = $m->where($condition)->count();
        $page = new Page($count, $pageRows);
        $firstRow = ($pageNumber - 1) * $pageRows;
        $data = $m->where($condition)->limit($firstRow . ',' . $pageRows)->order('id desc')->select();
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
     * jsonSortTree
     * 分类树信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function jsonSortTree() {
        Load('extend');
        $m = M('NewsSort');
        $tree = $m->field('id,parent_id,text')->select();
        $tree = list_to_tree($tree, 'id', 'parent_id', 'children');
        $tree = array_merge(array(array('id' => 0, 'text' => '全部文档')), $tree);
        echo json_encode($tree);
    }

}