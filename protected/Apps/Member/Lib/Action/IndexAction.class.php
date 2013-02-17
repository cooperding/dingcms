<?php

/**
 * IndexAction.class.php
 * 后台文件
 * 后台核心文件，登录后跳转页面
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:13
 * @package  Controller
 * @todo 权限验证
 */
class IndexAction extends Action
{

    /**
     * index
     * 会员中心首页方法
     * @access public
     * @return array
     * @version dogocms 1.0
     * @todo 权限验证
     */
    public function index()
    {
        //require_once(APP_PATH . '/Conf/menu.php'); //引入菜单
        foreach ($array as $key => $val) {
            foreach ($val['items'] as $skey => $sval) {

                foreach ($sval['items'] as $sskey => $ssval) {
                    if ($ssval['type'] == 'abc') {//echo '<pre>';print_r(c);//exit();
                        //unset($array[$key]['items'][$sskey]['items'][$sskey]);
                    }
                }
            }
        }
        $this->assign('menu', $array);

        $this->display();
    }

}

//// 本类由系统自动生成，仅供测试用途
//class IndexAction extends Action {
//    public function index(){
//	$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
//    }
//}
?>