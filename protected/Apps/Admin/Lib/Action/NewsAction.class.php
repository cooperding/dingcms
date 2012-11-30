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
class NewsAction extends AdminAction
{

    /**
     * index
     * 信息列表
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function index()
    {

        $this->display();
    }

    /**
     * json
     * 信息json数据
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function json()
    {

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

}