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
class SettingAction extends Action {
	//进入页面
        public function index(){
            $setting = M('Setting');
            $list = $setting->select();
            $name = array(
                '1'=>'站点设置',
                '2'=>'附件设置',
                '3'=>'信息相关',
                '4'=>'会员设置',
                '5'=>'邮箱设置',
                '6'=>'其它设置'
            );
            $array = array();
            foreach($name as $m=>$n){
                foreach ($list as $k=>$v){
                    if($m==$v['sys_gid']){
                        $array[$m]['title'] = $n;
                        $array[$m]['slist'][] = $v;
                    }
                }
            }
            $this->assign('list',$array);
            $this->display();
    }
	
	public function add(){
            $name = array(
                '1'=>'站点设置',
                '2'=>'附件设置',
                '3'=>'信息相关',
                '4'=>'会员设置',
                '5'=>'邮箱设置',
                '6'=>'其它设置'
            );
            $radios = array(
                'text'=>'文本',
                'radio'=>'布尔型',
                'textarea'=>'多行文本'
            );
            $this->assign('list',$name);
            $this->assign('radios',$radios);
            $this->assign('vv','565');
            $this->display();
	}
	
	public function edit(){
		
	}
	
	public function insert(){
		$setting = M('Setting');
		//判断参数是否符合条件
		//先判断是否有重复的名称
		$sys_name['sys_name'] = $_POST['sys_name'];
		$rs = $setting->where($sys_name)->find();
		if(!empty($rs)){//不为空说明存在，存在就不能添加
                    echo '1';
                    exit;
		}else{
                    $sys_type = $_POST['sys_type'];
                    $_POST['sys_type'] = $sys_type[0];
                    if($setting->create($_POST)){
                        $rs = $setting->add($_POST);
                        if($rs){
                            echo 2;
                        }else{
                            echo 3;
                        }
                    }
		}
		
		
		//echo $_POST['sys_name'];
		//exit;
		//$this->display();
	}
	
	public function update(){
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}