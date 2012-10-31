<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>内容管理系统</title>
<link id="easyuiTheme" rel="stylesheet" type="text/css" href="__PUBLIC__/Easyui/themes/cupertino/easyui.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Easyui/themes/default/portal.css"><!--此css引入要根据情况修改-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Style/Css/admin.css">
<script type="text/javascript" src="__PUBLIC__/Style/Js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Easyui/jquery.portal.js"></script>
<script type="text/javascript" src="__PUBLIC__/Easyui/dingeasyui.js"></script>
</head>

<body>

</head>
<body class="easyui-layout layoutindex">
    <script type="text/javascript">
        $.fn.panel.defaults.onBeforeDestroy = function() {/* 回收内存 */
		var frame = $('iframe', this);
		if (frame.length > 0) {
			frame[0].contentWindow.document.write('');
			frame[0].contentWindow.close();
			frame.remove();
			if ($.browser.msie) {
				CollectGarbage();
			}
		}
	};
        $(document).ready(function(){
            
            $('.sider li a').click(function(){
                var classId = 'index';
                var subtitle = $(this).text();
                var url = $(this).attr('href');
                if(!$('#tabs'+classId).tabs('exists',subtitle)){
                    $('#tabs'+classId).tabs('add',{
                        title:subtitle,
                        content:subtitle,
                        closable:true,
                        href:url,
                        tools:[{
                                iconCls:'icon-mini-refresh',
                                handler:function(){
                                    updateTab(classId,url,subtitle);
                                }
                            }]
                    });
                    return false;
                }else{
                    $('#tabs'+classId).tabs('select',subtitle);
                    return false;
                }
                
            });
        });
    </script>

    <noscript>
    <div style=" position:absolute; z-index:100000; height:246px;top:0px;left:0px; width:100%; background:white; text-align:center;">
        <img src="images/noscript.gif" alt='抱歉，请开启脚本支持！' />
    </div>
    </noscript>
    <div data-options="region:'north',border:false,split:true" style="height:80px;padding:2px">
        <div class="admintop">
            <div class="adminlogo fleft">
                <img src="__PUBLIC__/Style/images/logo2.gif" />
            </div>
            <div class="admincon fleft"></div>
            <div class="adminmember fright">

                
<div style="background:#fafafa;padding:5px;margin-top:20px;width:320px;border:1px solid #ccc">  
    <a href="#" class="easyui-menubutton" menu="#mm3" iconCls="icon-ok">个人资料</a>
    <a href="#" class="easyui-menubutton" menu="#mm1" iconCls="icon-edit">Edit</a> 
    <a href="#" class="easyui-menubutton" menu="#skin" iconCls="icon-edit">skin</a> 
    <a href="#" class="easyui-menubutton" menu="#mm2" iconCls="icon-help">Help</a>  
</div>  
<div id="mm1" style="width:150px;">  
    <div iconCls="icon-undo">Undo</div>  
    <div iconCls="icon-redo">Redo</div>  
    <div class="menu-sep"></div>  
    <div>Cut</div>  
    <div>Copy</div>  
    <div>Paste</div>  
    <div class="menu-sep"></div>  
    <div iconCls="icon-remove">Delete</div>  
    <div>Select All</div>  
</div>  
<div id="mm2" style="width:100px;">  
    <div>Help</div>  
    <div>Update</div>  
    <div>About</div>  
</div>
<div id="mm3" style="width:100px;">  
    <div iconCls="icon-search"><a href="__APP__/Login/logout" class="">个人资料</a></div>  
    <div iconCls="icon-edit"><a href="__APP__/Login/logout" class="">修改密码</a></div>  
    <div iconCls="icon-undo"><a href="__APP__/Login/logout" class="">退出登录</a></div>  
</div>
<div id="skin" style="width:100px;">  
    <div onclick="changeTheme('default');">default</div>
    <div onclick="changeTheme('gray');">gray</div>
    <div onclick="changeTheme('metro');">metro</div>
    <div onclick="changeTheme('cupertino');">cupertino</div>
    <div onclick="changeTheme('dark-hive');">dark-hive</div>
    <div onclick="changeTheme('pepper-grinder');">pepper-grinder</div>
    <div onclick="changeTheme('sunny');">sunny</div> 
</div> 
            </div>
            <div class="clear"></div>
        </div><!--admintop-->
    </div>
    <div data-options="region:'west',split:true,title:'<?php echo L('menu_name');?>'" style="width:200px;">
        <div class="easyui-accordion sider" data-options="fit:true,border:false">
            <!--//左侧菜单导航-->
            <?php if(is_array($menu)): foreach($menu as $key=>$list): ?><div title="<?php echo ($list["label"]); ?>" data-options="iconCls:'icon-mini-add'" style="padding:10px;">
        <ul class="easyui-tree" data-options="animate:true,dnd:true">
            <?php if(is_array($list["items"])): foreach($list["items"] as $skey=>$slist): ?><li data-options="state:'closed'">
                    <span><?php echo ($slist["label"]); ?></span>
                    <ul>
                        <?php if(is_array($slist["items"])): foreach($slist["items"] as $sskey=>$sslist): ?><li><a href="<?php echo ($sslist["link"]); ?>" rel="<?php echo ($sslist["type"]); ?>"><?php echo ($sslist["label"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </li><?php endforeach; endif; ?>
        </ul>
    </div><!--waiceng--><?php endforeach; endif; ?>
            <!--//左侧菜单导航-->	
        </div><!--accordion-->

    </div><!--west-->
    <div data-options="region:'east',split:true,collapsed:true,title:'公告及官方微博'" style="width:220px;padding:10px;">
        <iframe frameborder="0" scrolling="no" src="http://show.v.t.qq.com/index.php?c=show&a=index&n=dogocms&w=0&h=552&fl=2&l=30&o=21&co=0" width="100%" height="552"></iframe>
    </div>
    <div data-options="region:'south',split:false,border:false" style="height:50px;padding:10px; text-align:center;">dingcms版权south region<br/>hualo.net开发团队</div>
    <!--//主体内容部分-->
    <div data-options="region:'center'" class="indexcenter" title="内容管理系统">
        <div id="tabsindex" class="easyui-tabs"  fit="true" border="false"  >
            <div title="<?php echo L('home');?>" style="overflow:hidden; " >
                <div id="pp" style="position:relative;">
    <div style="width:50%;">
        <div title="Clock" style="height:200px;padding:5px;">
           
        </div>
        <div title="Tutorials" collapsible="true" closable="true" style="height:200px;padding:5px;">
            
        </div>
        
    </div>
    <div style="width:50%;">
        
        <div title="Tutorials" collapsible="true" closable="false" style="height:200px;padding:5px;">
            
        </div>
        <div title="Tutorials" collapsible="true" closable="true" style="height:200px;padding:5px;">
            
        </div>

    </div>

</div>
<script>
    $(function(){
        $('#pp').portal({
            border:false,
            fit:true,
        });
       
    });
    
</script>
            </div>

            <div title="<?php echo L('welcome');?>" style="padding:10px; " data-options="closable:true" >
                
            </div>
        </div>
    </div><!--center-->
    <!--//主体内容部分-->




</body>
</html>