<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo ($title); ?></title>
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/default/style/comm.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/default/style/css.css">
        <script type="text/javascript" src="__PUBLIC__/Style/Js/jquery-1.8.0.min.js"></script>
    </head>
    <body>




        <?php $_result=M('Title')->join(' right join ding_addarticle on ding_addarticle.title_id = id ')->where(" (`id` in(1,2,3,4,5,6,7,8,9,10,11,12,13)) ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><br/>
 <?php echo ($article["id"]); ?>==<?php echo ($article["dnewtitle"]); ?>

 <br/><?php endforeach; endif;?>



        <div class="top wpall">
            <div class="box wp">
                <div class="top_l f_left">
                    <span class="L_passport">&nbsp;您好,欢迎来到admin管理先生网<a href="/index.php/member_login">请登录</a><a href="/index.php/member_reg">免费注册</a><a href="/index.php/member_login/forgetpwd">忘记密码</a></span></div>
                <div class="top_r f_right">

                </div><!--top_r-->
                <div class="clear"></div>
            </div><!--box-->
        </div>
        <div class="box wpall">
            <div class="head">
                <div class="box wp">
                    <div class="logo f_left">
                        <h1><a href="http://www.adminsir.net/"><img src="__PUBLIC__/Skin/default/images/logo.jpg" alt=""></a></h1>
                    </div><!--mall_logo-->
                    <div class="search f_right">
                        <div class="box">
                            <div class="usual">
                                <div class="search_con">
                                    <form action="/index.php/Search" method="post" target="_blank">
                                        <input type="text" class="sinput" name="search_word">
                                        <input type="submit" value=" " class="search_sub">
                                    </form>
                                </div><!--search_con-->
                            </div></div><!--box-->

                    </div><!--mall_search-->
                    <div class="clear"></div>
                </div><!--box-->
            </div><!--head-->
        </div>
        <!--box-->

        <div class="box menu wpall">
            <div class="nav wp">
                <ul>
                    <li><a href="/index.php/" target="_self">首页</a></li><li><a href="/index.php/news_category?id=5" target="_self">视频教程</a></li><li><a href="/index.php/news_category?id=17" target="_self">开源项目</a></li><li><a href="/index.php/news_category?id=14" target="_self">物联网</a></li><li><a href="/index.php/news_category?id=13" target="_self">推荐书籍</a></li><li><a href="/index.php/news_category?id=10" target="_self">网站建设</a></li><li><a href="/index.php/news_category?id=8" target="_self">web开发</a></li><li><a href="/index.php/news_category?id=6" target="_self">图形图像</a></li><li><a href="/index.php/news_category?id=1" target="_self">网络资讯</a></li><li><a href="/index.php/news_category?id=30" target="_self">休闲一刻</a></li><li><a href="/index.php/news_category?id=31" target="_self">电商学院</a></li><li><a href="/index.php/news_category?id=28" target="_self">励志一生</a></li><div class="clear"></div>
                </ul>
            </div><!--nav-->
        </div>
<div class="blank"></div>


<div class="block wp">
	<div class="blockL f_left">
    <div class="box">
    <div class="flash">
<ul id="pub_slideplay" style="position: relative; z-index: 0; margin: 0px; padding: 0px; width: 280px; height: 200px; overflow: hidden;"><div class="dkTitle"><p style="position: absolute; margin: 0px; padding: 0px; z-index: 2; bottom: 0px; left: 0px; width: 100%; height: 21px; line-height: 21px; text-indent: 5px; text-decoration: initial; font-size: 12px; color: rgb(255, 255, 255); background-image: none; opacity: 1; overflow: hidden; display: block; background-position: initial initial; background-repeat: initial initial;">zTree -- jQuery 树插件</p><p style="position: absolute; margin: 0px; padding: 0px; z-index: 2; bottom: 0px; left: 0px; width: 100%; height: 21px; line-height: 21px; text-indent: 5px; text-decoration: initial; font-size: 12px; color: rgb(255, 255, 255); background-image: none; opacity: 1; overflow: hidden; display: none; background-position: initial initial; background-repeat: initial initial;">可视化HTML编辑器 KindEditor</p></div><div class="dkTitleBg" style="position: absolute; margin: 0px; padding: 0px; z-index: 1; bottom: 0px; left: 0px; width: 100%; height: 21px; background-color: rgb(0, 0, 0); opacity: 0.4; overflow: hidden; background-position: initial initial; background-repeat: initial initial;"></div><div style="position:absolute;z-index:20;right:0px;bottom:3px"><a style="float: left; margin-right: 3px; width: 15px; height: 14px; line-height: 15px; text-align: center; font-weight: 800; font-size: 12px; color: rgb(255, 255, 255); background-color: rgb(255, 125, 1); cursor: pointer; text-decoration: initial; background-position: initial initial; background-repeat: initial initial;">1</a><a style="float: left; margin-right: 3px; width: 15px; height: 14px; line-height: 15px; text-align: center; font-weight: 800; font-size: 12px; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); cursor: pointer; text-decoration: initial; background-position: initial initial; background-repeat: initial initial;">2</a></div>

       	<li style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; display: list-item;"><a target="_blank" href="http://adminsir.net/index.php/news_views?id=11"><img alt="zTree -- jQuery 树插件" src="/uploads/images/20120222/201202221830_98.jpg" style="border: none; width: 100%; height: 100%;"></a></li>

       	<li style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; display: none;"><a target="_blank" href="http://adminsir.net/index.php/news_views?id=38"><img alt="可视化HTML编辑器 KindEditor" src="/uploads/images/20120321/201203211232_792.png" style="border: none; width: 100%; height: 100%;"></a></li>
		    </ul>
    </div><!--flash-->
    </div><!--box-->

    <div class="blank"></div>
    <div class="box">

	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">专栏推荐</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont phototext">
        <ul>


       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=81"><img alt="MySql常用命令总结" src="/assets/common/images/defaultpic.gif"></a>
        </div><!--phototext_pic-->
        <div class="phototext_text f_right">
        <h3><a href="/index.php/news_views?id=81">MySql常用命令总结</a></h3>
        <p>MySql常用命令总结</p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>

       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=80"><img alt="21个常用的 PHP 代码汇总" src="/assets/common/images/defaultpic.gif"></a>
        </div><!--phototext_pic-->
        <div class="phototext_text f_right">
        <h3><a href="/index.php/news_views?id=80">21个常用的 PHP 代码汇总</a></h3>
        <p>PHP 是目前使用最广泛的基于 Web 的编程语言，驱动着数以百万计的网站，其中也包括如 Facebook 等一些大型站点。这里收集了 21个日常开发中实用便捷的 PHP 代码，希望可以对一些 PHP 开发者都会有所帮助。</p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>
		        </ul>
        </div><!--common_cont-->
    	<div class="common_cont text">
        <ul>

       	<li><a href="/index.php/news_views?id=81">MySql常用命令总结</a></li>

       	<li><a href="/index.php/news_views?id=80">21个常用的 PHP 代码汇总</a></li>

       	<li><a href="/index.php/news_views?id=77">PHP类的静态(static)方法和静态(static)变量</a></li>

       	<li><a href="/index.php/news_views?id=76">面向对象的开发5 抽象关键字abstract</a></li>

       	<li><a href="/index.php/news_views?id=71">10个操作PHP关联数组的技巧，熟练运用能帮助你提高开发效率</a></li>
		        </ul>
        </div><!--common_cont-->

    </div><!--common-->


    </div><!--box-->

    </div><!--blockL-->

	<div class="blockM f_left mleft">
    <div class="box">
	<div class="common commonbd">
    	<div class="common_cont headlinetop">

        <h3><a href="/index.php/news_views?id=81">MySql常用命令总结</a></h3>
        <p>MySql常用命令总结</p>

        </div><!--common_cont-->
    	<div class="common_cont ftext">
        <ul>

       	<li><a href="/index.php/news_views?id=81">MySql常用命令总结</a></li>

       	<li><a href="/index.php/news_views?id=80">21个常用的 PHP 代码汇总</a></li>

       	<li><a href="/index.php/news_views?id=77">PHP类的静态(static)方法和静态(static)变量</a></li>

       	<li><a href="/index.php/news_views?id=76">面向对象的开发5 抽象关键字abstract</a></li>

       	<li><a href="/index.php/news_views?id=71">10个操作PHP关联数组的技巧，熟练运用能帮助你提高开发效率</a></li>

       	<li><a href="/index.php/news_views?id=70">谷歌结束对Chrome浏览器搜索排名惩罚期</a></li>
		        <div class="clear"></div>
        </ul>
        </div><!--common_cont-->
    </div><!--common-->
    </div><!--box-->
    <div class="blank"></div>

    <div class="box">
	<div class="common commonbd">
    	<div class="common_cont text">
        <ul>

        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=11">[MySQL]</a><a href="/index.php/news_views?id=81">MySql常用命令总结</a></div>
        <div class="time f_right">[05-10]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=9">[php教程]</a><a href="/index.php/news_views?id=80">21个常用的 PHP 代码汇总</a></div>
        <div class="time f_right">[04-29]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=9">[php教程]</a><a href="/index.php/news_views?id=77">PHP类的静态(static)方法和静态(static)变量</a></div>
        <div class="time f_right">[04-24]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=9">[php教程]</a><a href="/index.php/news_views?id=76">面向对象的开发5 抽象关键字abstract</a></div>
        <div class="time f_right">[04-24]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=9">[php教程]</a><a href="/index.php/news_views?id=71">10个操作PHP关联数组的技巧，熟练运用能帮助你提高开发效率</a></div>
        <div class="time f_right">[04-07]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=13">[推荐书籍]</a><a href="/index.php/news_views?id=50">PHP和MySQL Web开发 （原书第4版</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=2">[互联网]</a><a href="/index.php/news_views?id=49">硅谷涌现大批21岁以下企业家 以扎克伯格为榜样</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>

		        </ul>
        </div><!--common_cont-->
    </div><!--common-->
    </div><!--box-->
    <div class="blank"></div>


    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">物联网资讯</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=15">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont text">
        <ul>

        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=42">满足工业与医疗走向智能化发展 2012年是服务器等级工业计算机发展元年</a></div>
        <div class="time f_right">[03-20]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=17">工信部：物联网建10个产业聚集区 杜绝盲目投资</a></div>
        <div class="time f_right">[02-23]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=16">2012中国深圳国际物联网技术与应用博览会</a></div>
        <div class="time f_right">[02-23]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=15">山东省推进移动物联网发展让城市更智慧</a></div>
        <div class="time f_right">[02-23]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=10">山东移动M2M物联网平台各行业广泛应用</a></div>
        <div class="time f_right">[02-15]</div>
        <div class="clear"></div>
        </li>

		        </ul>
        </div><!--common_cont-->
    </div><!--common-->
    </div><!--box-->

    </div><!--blockM-->

	<div class="blockR f_right">

    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">站内快讯</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont ftext">
        <ul>

       	<li><a href="/index.php/news_views?id=81">MySql常用命令总结</a></li>

       	<li><a href="/index.php/news_views?id=80">21个常用的 PHP 代码汇总</a></li>

       	<li><a href="/index.php/news_views?id=77">PHP类的静态(static)方法和静态(static)变量</a></li>

       	<li><a href="/index.php/news_views?id=76">面向对象的开发5 抽象关键字abstract</a></li>

       	<li><a href="/index.php/news_views?id=73">怎样把自己培养成为一个优秀的程序员</a></li>

       	<li><a href="/index.php/news_views?id=71">10个操作PHP关联数组的技巧，熟练运用能帮助你提高开发效率</a></li>
		        <div class="clear"></div>
        </ul>
        </div><!--common_cont-->
    </div><!--common-->

    </div><!--box-->
<div class="blank"></div>
        <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">开源项目</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=17">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont phototext">
        <ul>


       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=38"><img alt="可视化HTML编辑器 KindEditor" src="/uploads/images/20120321/201203211232_792.png"></a>
        </div><!--phototext_pic-->
        <div class="phototext_rtext f_right">
        <h3><a href="/index.php/news_views?id=38">可视化HTML编辑器 KindEditor</a></h3>
        <p>KindEditor是一套开源的HTML可视化编辑器，主要用于让用户在网站上获得所见即所得编辑效果，兼容IE、Firefox、 Chrome、Safari、Opera等主流浏览器。</p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>

       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=24"><img alt="Jquery图片放大镜-JQZoom" src="/assets/common/images/defaultpic.gif"></a>
        </div><!--phototext_pic-->
        <div class="phototext_rtext f_right">
        <h3><a href="/index.php/news_views?id=24">Jquery图片放大镜-JQZoom</a></h3>
        <p>介绍一个十分好用的JQUERY图片放大镜插件,在很多电子商务网站中,有时在看小图时,往往想再看这个货品的大图,

传统的另外打开一张大图的话,不大COOL,所以找到了这个插件</p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>

       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=18"><img alt="国产jQuery UI框架 DWZ" src="http://www.oschina.net/uploads/img/201007/03211140_SXMT.jpg"></a>
        </div><!--phototext_pic-->
        <div class="phototext_rtext f_right">
        <h3><a href="/index.php/news_views?id=18">国产jQuery UI框架 DWZ</a></h3>
        <p>DWZ富客户端框架(jQuery RIA framework), 是中国人自己开发的基于jQuery实现的Ajax RIA开源框架.

设计目标是简单实用,快速开发,降低ajax开发成本。</p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>

       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=11"><img alt="zTree -- jQuery 树插件" src="/uploads/images/20120222/201202221830_98.jpg"></a>
        </div><!--phototext_pic-->
        <div class="phototext_rtext f_right">
        <h3><a href="/index.php/news_views?id=11">zTree -- jQuery 树插件</a></h3>
        <p>zTree 是一个依靠 jQuery 实现的多功能 “树插件”。优异的性能、灵活的配置、多种功能的组合是 zTree 最大优点。

zTree 是开源免费的软件（MIT 许可证）。如果您对 zTree 感兴趣或者愿意资助 zTree 继</p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>
		        </ul>
        </div><!--common_cont-->
        </div><!--common-->
    </div><!--box-->


    </div><!--blockR-->
<div class="clear"></div>
</div><!--block-->
<div class="blank"></div>
<div class="block wp">
	<div class="blockL f_left">
    <div class="box">

	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">物联网技术</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=16">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont text">
        <ul>

       	<li><a href="/index.php/news_views?id=59">物联网冰箱</a></li>

       	<li><a href="/index.php/news_views?id=58">浅析公共安全监测物联网技术</a></li>

       	<li><a href="/index.php/news_views?id=57">ZigBee技术在物联网系统中的应用研究</a></li>

       	<li><a href="/index.php/news_views?id=56">红外线感应器</a></li>

       	<li><a href="/index.php/news_views?id=55">DTCC大会报道：物联网环境下数据库设计</a></li>

       	<li><a href="/index.php/news_views?id=54">全网通址 物联网时代手机是什么</a></li>

       	<li><a href="/index.php/news_views?id=53">解析M2M：物联网的四大支撑技术之一</a></li>

       	<li><a href="/index.php/news_views?id=52">朱志祥讲物联网（一）</a></li>

       	<li><a href="/index.php/news_views?id=51">实时数据库和关系数据库的设计特点</a></li>

       	<li><a href="/index.php/news_views?id=21">M2M简介</a></li>
		        </ul>
        </div><!--common_cont-->

    </div><!--common-->
    </div><!--box-->

<div class="blank"></div>
    <div class="box">

	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">图形图像</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=6">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont text">
        <ul>
        </ul>
        </div><!--common_cont-->

    </div><!--common-->
    </div><!--box-->

    </div><!--blockL-->

	<div class="blockM f_left mleft">

    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">互联网</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=2">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont text">
        <ul>

        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=70">谷歌结束对Chrome浏览器搜索排名惩罚期</a></div>
        <div class="time f_right">[04-01]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=64">13类互联网公司如何赚到1000万美元</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=49">硅谷涌现大批21岁以下企业家 以扎克伯格为榜样</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=48">扎克伯格：Facebook诞生是为追逐用户</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=47">盈利是电子商务的立足之本</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=46">创业家：李开复再谈美国天使</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=45">李开复：三条忠告为创业者引路</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=44">品牌词才是一个网站最重要的关键词</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=43">外贸B2C势不可挡，网络营销技能=核心竞争力</a></div>
        <div class="time f_right">[03-21]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_views?id=41">中美互联网公司揽才对比：中国靠房贷 美国靠自由</a></div>
        <div class="time f_right">[03-20]</div>
        <div class="clear"></div>
        </li>

		        </ul>
        </div><!--common_cont-->
    </div><!--common-->
    </div><!--box-->
<div class="blank"></div>
    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">PHP教程</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=9">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont ftext">
        <ul>

       	<li><a href="/index.php/news_views?id=80">21个常用的 PHP 代码汇总</a></li>

       	<li><a href="/index.php/news_views?id=77">PHP类的静态(static)方法和静态(static)变量</a></li>

       	<li><a href="/index.php/news_views?id=76">面向对象的开发5 抽象关键字abstract</a></li>

       	<li><a href="/index.php/news_views?id=71">10个操作PHP关联数组的技巧，熟练运用能帮助你提高开发效率</a></li>

       	<li><a href="/index.php/news_views?id=66">php怎么去除掉数组中为空或为false的项</a></li>

       	<li><a href="/index.php/news_views?id=35">PHP中getenv()函数</a></li>

       	<li><a href="/index.php/news_views?id=34">PHP开发人员应熟悉的五个概念</a></li>

       	<li><a href="/index.php/news_views?id=32">十个PHP高级应用技巧</a></li>

       	<li><a href="/index.php/news_views?id=14">浅析php人才面试带来的困惑!php人才如何面对未来?</a></li>

       	<li><a href="/index.php/news_views?id=13">PHP 开发的一般流程是什么？</a></li>

       	<li><a href="/index.php/news_views?id=8">10条PHP编程习惯</a></li>

       	<li><a href="/index.php/news_views?id=7">php程序员应该掌握的10个技能,看看你都掌握了哪些</a></li>
		        <div class="clear"></div>
        </ul>
        </div><!--common_cont-->
    </div><!--common-->
    </div><!--box-->

    </div><!--blockM-->
	<div class="blockR f_right">
    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">推荐书籍</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont phototext">
        <ul>


       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=50"><img alt="PHP和MySQL Web开发 （原书第4版" src="http://img36.ddimg.cn/89/6/20546846-1_l.jpg"></a>
        </div><!--phototext_pic-->
        <div class="phototext_rtext f_right">
        <h3><a href="/index.php/news_views?id=50">PHP和MySQL Web开发 （原书第4版</a></h3>
        <p>“这是PHP和MySQL程序员的最佳参考书，隆重推荐。” ——《The Internet Writing Journal》 “最佳的PHP快速教程，最全面的MySQL介绍。” ——WebDynamic</p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>

       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=6"><img alt="CSS3实用指南" src="http://img30.ddimg.cn/93/13/22610010-1_e.jpg"></a>
        </div><!--phototext_pic-->
        <div class="phototext_rtext f_right">
        <h3><a href="/index.php/news_views?id=6">CSS3实用指南</a></h3>
        <p></p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>

       	<li>
        <div class="phototext_pic f_left">
		<a href="/index.php/news_views?id=5"><img alt="高性能Linux服务器构建实战：运维监控、性能调优与集群应用" src="http://img10.360buyimg.com/n4/16363/aaa7c385-d54c-4eaf-8cb0-faf944ee896e.jpg"></a>
        </div><!--phototext_pic-->
        <div class="phototext_rtext f_right">
        <h3><a href="/index.php/news_views?id=5">高性能Linux服务器构建实战：运维监控、性能调优与集群应用</a></h3>
        <p></p>
        </div><!--phototext_text-->
        <div class="clear"></div>
        </li>
		        </ul>
        </div><!--common_cont-->
    </div><!--common-->

    </div><!--box-->
<div class="blank"></div>

    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">JQuery教程</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=23">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont ftext">
        <ul>

       	<li><a href="/index.php/news_views?id=33">jQuery的加法运算</a></li>

       	<li><a href="/index.php/news_views?id=31">jquery之empty()与remove()区别</a></li>

       	<li><a href="/index.php/news_views?id=27">jQuery操作input</a></li>

       	<li><a href="/index.php/news_views?id=26">jQuery判断输入的数是否是正整数？</a></li>

       	<li><a href="/index.php/news_views?id=25">JS判断是否为正整数，浮点数的函数</a></li>

       	<li><a href="/index.php/news_views?id=22">jquery ajax data 无法传值的原因</a></li>
		        <div class="clear"></div>
        </ul>
        </div><!--common_cont-->
    </div><!--common-->

    </div><!--box-->


    </div><!--blockR-->
<div class="clear"></div>
</div>

<div class="blank"></div>
<div class="block wp">
	<div class="blockL f_left">
    <div class="box">

	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">HTML/CSS</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="/index.php/news_category?id=12">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont text">
        <ul>

       	<li><a href="/index.php/news_views?id=63">HTML,CSS的命名的习惯总结</a></li>

       	<li><a href="/index.php/news_views?id=20">div css 圆角样式属性</a></li>

       	<li><a href="/index.php/news_views?id=19">使用CSS限制图片最大宽度(兼容IE6/IE7/IE8/FF)</a></li>
		        </ul>
        </div><!--common_cont-->

    </div><!--common-->


    </div><!--box-->

    </div><!--blockL-->
	<div class="blockM f_left mleft">


    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">MySQL教程</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"><a href="#">更多»</a></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont text">
        <ul>

        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=11">[MySQL]</a><a href="/index.php/news_views?id=82">总结PHP程序员最常犯的11个MySQL错误</a></div>
        <div class="time f_right">[05-10]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=11">[MySQL]</a><a href="/index.php/news_views?id=81">MySql常用命令总结</a></div>
        <div class="time f_right">[05-10]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=11">[MySQL]</a><a href="/index.php/news_views?id=12">MySQL SELECT LIKE like的用法</a></div>
        <div class="time f_right">[02-15]</div>
        <div class="clear"></div>
        </li>


        <li>
        <div class="title f_left"><a href="/index.php/news_category?id=11">[MySQL]</a><a href="/index.php/news_views?id=9">mysql的最长数据库名，表名，字段名可以是多长？</a></div>
        <div class="time f_right">[02-15]</div>
        <div class="clear"></div>
        </li>

		        </ul>
        </div><!--common_cont-->

    </div><!--common-->
    </div><!--box-->

    </div><!--blockM-->
	<div class="blockR f_right">

    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">网站建设</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont ftext">
        <ul>

       	<li><a href="/index.php/news_views?id=62">影响电子商务网站转化率的几点因素</a></li>

       	<li><a href="/index.php/news_views?id=61">外贸网站建设海外主机使用注意事项</a></li>

       	<li><a href="/index.php/news_views?id=60">网站设计师如何让雇主认可自己的作品</a></li>

       	<li><a href="/index.php/news_views?id=37">有些关于网站降级的原因和解决方法</a></li>

       	<li><a href="/index.php/news_views?id=4">企业网站如何实现赢利的思考?</a></li>

       	<li><a href="/index.php/news_views?id=3">做网站如何一个好的域名呢？</a></li>

       	<li><a href="/index.php/news_views?id=2">企业怎样才能建立一个成功的网站呢？</a></li>
		        <div class="clear"></div>
        </ul>
        </div><!--common_cont-->
    </div><!--common-->

    </div><!--box-->


    </div><!--blockR-->
<div class="clear"></div>
</div>
<div class="blank"></div>
<div class="block wp">
	<div class="blockL f_left">

    </div><!--blockL-->

	<div class="blockM f_left mleft">


    </div><!--blockM-->
	<div class="blockR f_right">



    </div><!--blockR-->
<div class="clear"></div>
</div>
<div class="blank"></div>
<div class="block wp">
    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">视频教程</div>
        	<div class="ctop_m f_left">
            <a href="#">PHP视频</a>|
            <a href="#">jQuery/AJAX视频</a>|
            <a href="#">办公软件教程</a>|
            <a href="#">平面设计</a>|
            <a href="#">网站制作</a>
            </div>
        	<div class="ctop_r f_right"></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont pic">
        <ul>
<div class="clear"></div>
        </ul>
        </div><!--common_cont-->
    </div><!--common-->
    </div><!--box-->

</div>

<div class="blank"></div>

<div class="block wp">
	<div class="blockL f_left">

    </div><!--blockL-->

	<div class="blockM f_left mleft">


    </div><!--blockM-->
	<div class="blockR f_right">



    </div><!--blockR-->
<div class="clear"></div>
</div>

<div class="blank"></div>

<div class="block wp">
    <div class="box">
	<div class="common commonbd">
    	<div class="common_top commontopbd">
        	<div class="ctop_l f_left">友情链接</div>
        	<div class="ctop_m f_left"></div>
        	<div class="ctop_r f_right"></div>
<div class="clear"></div>
        </div><!--common_top-->
    	<div class="common_cont link">
<a href="http://www.91python.com" title="IT农民工" target="_blank">IT农民工</a><a href="http://www.yesemeigui.com" title="夜色玫瑰" target="_blank">夜色玫瑰</a><a href="http://www.vilove.net" title="唯爱网" target="_blank">唯爱网</a><a href="http://www.yesejiaren.com" title="夜色佳人" target="_blank">夜色佳人</a><a href="http://www.qiluqiye.com" title="齐鲁企业" target="_blank">齐鲁企业</a><a href="http://www.ppecn.com" title="PPE劳保用品" target="_blank">PPE劳保用品</a><a href="http://www.doitphp.com" title="DoitPHP" target="_blank">DoitPHP</a><div class="clear"></div>
        </div><!--common_cont-->
    </div><!--common-->
    </div><!--box-->
</div>
<?php echo ($url); ?>

<div class="blank"></div>
<div class="foot wp">
<p>© （<a href="http://www.adminsir.net">www.adminsir.net</a>）站长先生网--版权所有，并保留所有权利。<br>
Powered by <a href="http://www.dingcms.com" target="_blank">www.dingcms.com</a></p>
</div>

<script type="text/javascript">new dk_slideplayer("#pub_slideplay",{width:"280px",height:"200px",fontsize:"12px",time:"5000"});</script>






</body>
</html>