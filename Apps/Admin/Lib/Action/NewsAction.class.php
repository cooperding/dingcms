<?php

// +----------------------------------------------------------------------
// | DingCMS [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012- http://dingcms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 正侠客 <lookcms@gmail.com>
// +----------------------------------------------------------------------

/**
 * DingCMS 系统配置
 * 主要用于全站系统配置
 * @category   admin
 * @package  admin
 * @subpackage  admin Action
 * @author    正侠客 <lookcms@gmail.com>
 */
class NewsAction extends AdminAction {

    //进入页面
    public function index() {
        /*
        $NavCat = M('NavCat');
        $list = $NavCat->select();
        $navcatCount = $NavCat->count("cat_id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
            //$a[$k]['_parentId'] = intval($v['parent_id']);
        }
        $b = array();
        $b['total'] = $navcatCount;
        $b['rows'] = $a;
       $array = array(
            'total' => '9',
            'rows' => array(array(
                    'id' => 1,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id,
                    '_parentId' => '0'
                ), array(
                    'id' => 2,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id,
                    '_parentId' => '1'
                ), array(
                    'id' => 3,
                    'code' => 'code1',
                    'name' => 'name1',
                    'addr' => $id
                )
                ));

        echo '<pre>';
        echo json_encode($array);
        echo '<br/>';
        echo json_encode($b);
        */
        //print_r($a);
        $this->display();
    }

    public function json() {
        
        $m = M('NavCat');
        $list = $m->select();
        $navcatCount = $m->count("cat_id");
        $a = array();
        foreach ($list as $k => $v) {
            $a[$k] = $v;
        }
        $array = array();
        $array['total'] = $navcatCount;
        $array['rows'] = $a;
        
        $json = '{                                                      
	"total":239,                                                      
	"rows":[                                                          
		{"code":"0014","name":"Name 1","addr":"Address 11","col4":"col4 data"},         
		{"code":"002","name":"Name 2","addr":"Address 13","col4":"col4 data"},         
		{"code":"003","name":"Name 3","addr":"Address 87","col4":"col4 data"},         
		{"code":"004","name":"Name 4","addr":"Address 63","col4":"col4 data"},         
		{"code":"005","name":"Name 5","addr":"Address 45","col4":"col4 data"},         
		{"code":"006","name":"Name 6","addr":"Address 16","col4":"col4 data"},          
		{"code":"007","name":"Name 7","addr":"Address 27","col4":"col4 data"},          
		{"code":"008","name":"Name 8","addr":"Address 81","col4":"col4 data"},          
		{"code":"009","name":"Name 9","addr":"Address 69","col4":"col4 data"},          
		{"code":"010f","name":"Name 10","addr":"Address 78","col4":"col4 data"}     
	]                                                          
}  ';
        echo json_encode($array);
        //echo $json;
    }

}