<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AdminAction {
    public function index(){
    	require_once(APP_PATH.'/Conf/leftermenu.php');//引入菜单
		foreach($array as $key=>$val){
			foreach($val['items'] as $skey=>$sval){
				
				foreach($sval['items'] as $sskey=>$ssval){
					if($ssval['type']=='abc'){//echo '<pre>';print_r(c);//exit();
						//unset($array[$key]['items'][$sskey]['items'][$sskey]);
					}
				}
			}
		}
		$this->assign('menu',$array);
		
		$this->display();
    }
    
//     public function left(){
//     	$this->display();
//     }


/*
 * foreach($array as $key=>$val){
			foreach($val['items'] as $skey=>$sval){
				
				foreach($sval['items'] as $sskey=>$ssval){
					if($ssval['type']=='abc'){//echo '<pre>';print_r(c);//exit();
						unset($array[$key]['items'][$sskey]['items'][$sskey]);
					}
				}
			}
		}
		
foreach($array as $key=>$val){
			$menu[$key] .= $val['label'];
			//echo $val['label'];
			//echo '<br/>';
			//echo '=========';
			//echo '<br/>';
			foreach($val['items'] as $skey=>$sval){
				$menu[$key][$skey] .= $val['label'];
				//echo '&nbsp;&nbsp;|-'.$sval['label'];
				//echo '<br/>';
				//echo '---------';
				//echo '<br/>';
				foreach($sval['items'] as $sskey=>$ssval){
					$menu[$key][$skey][$sskey] .= $val['label'];
					//echo '&nbsp;&nbsp;&nbsp;&nbsp;|-'.$ssval['label'];
					//echo '<br/>';
					//echo '*******';
					//echo '<br/>';
				}
			}
			
		}
*/
}