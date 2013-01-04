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
     * add
     * 添加信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function add() {
        $id = intval($_GET['id']);
        $flag = array(
            'h' => ' 头条[h] ',
            'r' => ' 推荐[r] ',
            's' => ' 特荐[s] ',
            't' => ' 置顶[t] ',
            'j' => ' 跳转[j] '
        );
        $this->assign('id', $id);
        $this->assign('flag', $flag);
        $this->display();
    }

    /**
     * edit
     * 编辑信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function edit() {
        $m = M('Title');
        $id = intval($_GET['id']);
        $data = $m->field('t.*,c.content,ms.id as msid,ms.emark as msemaerk')->join(' join ' . C('DB_PREFIX') . 'title as t')->join(C('DB_PREFIX') . 'content c ON c.title_id = t.id ')
                        ->join(C('DB_PREFIX') . 'news_sort ns ON ns.id=t.sort_id')->join(C('DB_PREFIX') . 'model_sort ms ON ms.id=ns.model_id')
                        ->where('t.id=' . $id)->find();
        $am = M(ucfirst(C('DB_ADD_PREFIX')) . $data['msemaerk']);
        $data_ms = $am->where('title_id=' . $id)->find();
        $mf = M('ModelField');
        $data_filed = $mf->where('sort_id =' . $data['msid'])->order('myorder asc,id asc')->select();
        foreach ($data_filed as $k => $v) {
            $exp = explode(',', $v['evalue']);
            if ($v['etype'] == 'radio') {
                $data_filed[$k]['opts'] = $exp;
            } elseif ($v['etype'] == 'checkbox') {
                $data_filed[$k]['opts'] = $exp;
            } elseif ($v['etype'] == 'select') {
                $data_filed[$k]['opts'] = $exp;
            }
        }
        $flag = array(
            'h' => ' 头条[h] ',
            'r' => ' 推荐[r] ',
            's' => ' 特荐[s] ',
            't' => ' 置顶[t] ',
            'j' => ' 跳转[j] '
        );
        $this->assign('data', $data);
        $this->assign('filed', $data_filed);
        $this->assign('datafiled', $data_ms);
        $this->assign('flag', $flag);
        $this->display();
    }

    /**
     * insert
     * 写入信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function insert() {
        $t = M('Title');
        $c = M('Content');
        $ns = M('NewsSort');
        $title = trim($_POST['title']);
        $sort_id = $_POST['sort_id'];
        if (empty($title)) {
            $this->dmsg('1', '文章标题不能为空！', false, true);
        }
        if ($sort_id == 0) {
            $this->dmsg('1', '请选择文档分类！', false, true);
        }
        $_POST['flag'] = implode(',', $_POST['flag']);
        $filed = array();
        foreach ($_POST['filed'] as $k => $v) {
            $filed[$k] = $v;
        }
        foreach ($_POST['filedtime'] as $k => $v) {
            $filed[$k] = strtotime($v);
        }
        foreach ($_POST['filedcheckbox'] as $k => $v) {
            $filed[$k] = implode(',', $v);
        }
        //通过取得的栏目id获得模型id，然后通过模型id获得模型的标识名（即表名），通过表名实例化相应的表信息
        $model_rs = $ns->field('ms.emark')->join(' join ' . C('DB_PREFIX') . 'news_sort as ns')
                        ->join(C('DB_PREFIX') . 'model_sort ms ON ms.id = ns.model_id ')
                        ->where('ns.id=' . intval($_POST['sort_id']))->find();
        $m = M(ucfirst(C('DB_ADD_PREFIX')) . $model_rs['emark']);
        //开始写入信息
        if ($t->create($_POST)) {
            $rs = $t->add($_POST);
            $last_id = $t->getLastInsID();
            if ($rs == true) {
                $_POST['title_id'] = intval($last_id);
                $filed['title_id'] = intval($last_id);
                $rsc = $c->data($_POST)->add();
                $rsm = $m->data($filed)->add();
                if ($rs == true || $rsc == true || $rsm == true) {
                    $this->dmsg('2', ' 操作成功！', true);
                }
            } else {
                $this->dmsg('1', '操作失败！', false, true);
            }
        } else {
            $this->dmsg('1', '根据表单提交的POST数据创建数据对象失败！', false, true);
        }
    }

    /**
     * update
     * 更新信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function update() {
        $t = M('Title');
        $c = M('Content');
        $ns = M('NewsSort');
        $data['id'] = intval($_POST['id']);
        $cdata['title_id'] = intval($_POST['id']);
        $title = trim($_POST['title']);
        $sort_id = $_POST['sort_id'];
        if (empty($title)) {
            $this->dmsg('1', '文章标题不能为空！', false, true);
        }
        if ($sort_id == 0) {
            $this->dmsg('1', '请选择文档分类！', false, true);
        }
        $_POST['flag'] = implode(',', $_POST['flag']);
        $filed = array();
        foreach ($_POST['filed'] as $k => $v) {
            $filed[$k] = $v;
        }
        foreach ($_POST['filedtime'] as $k => $v) {
            $filed[$k] = strtotime($v);
        }
        foreach ($_POST['filedcheckbox'] as $k => $v) {
            $filed[$k] = implode(',', $v);
        }
        //通过取得的栏目id获得模型id，然后通过模型id获得模型的标识名（即表名），通过表名实例化相应的表信息
        $model_rs = $ns->field('ms.emark')->join(' join ' . C('DB_PREFIX') . 'news_sort as ns')
                        ->join(C('DB_PREFIX') . 'model_sort ms ON ms.id = ns.model_id ')
                        ->where('ns.id=' . intval($_POST['sort_id']))->find();
        $m = M(ucfirst(C('DB_ADD_PREFIX')) . $model_rs['emark']);
        $rs = $t->where($data)->save($_POST);
        $rsc = $c->where($cdata)->save($_POST);
        $rsm = $m->where($cdata)->save($filed);
        if ($rs == true || $rsc == true || $rsm == true) {
            $this->dmsg('2', '更新成功！', true);
        } else {
            $this->dmsg('1', '更新失败,或者未有更新！', false, true);
        }
    }

    /**
     * delete
     * 删除文档到回收站
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function delete() {
        $t = M('Title');
        $data['id'] = array('in', $_POST['id']);
        if (empty($data['id'])) {
            $this->dmsg('1', '未有id值，操作失败！', false, true);
        }
        $rs = $t->where($data)->setField('is_recycle', 'true');
        if ($rs == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
    }

    /**
     * tempmodel
     * 写入信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function tempmodel() {
        $mf = M('ModelField');
        $id = intval($_POST['id']);
        $data_filed = $mf->where('sort_id =' . $id)->order('myorder asc,id asc')->select();
        foreach ($data_filed as $k => $v) {
            $exp = explode(',', $v['evalue']);
            if ($v['etype'] == 'radio') {
                $data_filed[$k]['opts'] = $exp;
            } elseif ($v['etype'] == 'checkbox') {
                $data_filed[$k]['opts'] = $exp;
            } elseif ($v['etype'] == 'select') {
                $data_filed[$k]['opts'] = $exp;
            }
        }
        $this->assign('id', time());
        $this->assign('filed', $data_filed);
        $this->display();
    }

    /**
     * recycle
     * 回收站信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function recycle() {
        $t = M('Title');
        $this->display();
    }

    /**
     * recycleRevert
     * 回收站还原信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function recycleRevert() {
        $t = M('Title');
        $data['id'] = array('in', $_POST['id']);
        if (empty($data['id'])) {
            $this->dmsg('1', '未有id值，操作失败！', false, true);
        }
        $rs = $t->where($data)->setField('is_recycle', 'false');
        if ($rs == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
    }

    /**
     * deleteRec
     * 从回收站彻底删除信息
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function deleteRec() {
        $t = M('Title');
        $c = M('Content');
        $data['id'] = array('in', $_POST['id']);
        $cdata['title_id'] = array('in', $_POST['id']);
        //id是唯一的值，要取得所有模型的表名，才能删除模型内的信息
        foreach ($_POST['id'] as $k => $v) {
            //通过取得的栏目id获得模型id，然后通过模型id获得模型的标识名（即表名），通过表名实例化相应的表信息
            $model_rs = $t->field('ms.emark')->join(' join ' . C('DB_PREFIX') . 'news_sort as ns')
                            ->join(C('DB_PREFIX') . 'model_sort ms ON ms.id = ns.model_id ')
                            ->join(C('DB_PREFIX') . 'title t ON t.sort_id = ns.id ')
                            ->where('t.id=' . $v)->find();
            //$sql = $t->getLastSql();
            //$this->dmsg('1', $sql, false, true);
            $m = M(ucfirst(C('DB_ADD_PREFIX')) . $model_rs['emark']);
            $m->where('title_id='.$v)->delete(); 
        }
        $rst = $t->where($data)->delete(); 
        $rsc = $c->where($cdata)->delete(); 
        if ($rst == true) {
            $this->dmsg('2', '操作成功！', true);
        } else {
            $this->dmsg('1', '操作失败！', false, true);
        }//if
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

        $condition['is_recycle'] = isset($_GET['is_recycle']) ? 'true' : 'false';
        $count = $m->where($condition)->count();
        $page = new Page($count, $pageRows);
        $firstRow = ($pageNumber - 1) * $pageRows;
        $data = $m->where($condition)->limit($firstRow . ',' . $pageRows)->order('id desc')->select();
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