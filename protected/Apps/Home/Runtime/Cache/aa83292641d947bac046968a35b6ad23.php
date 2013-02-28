<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo ($title); ?>-站长管理</title>
        <meta name="keywords" content="<?php echo ($keywords); ?>" />
        <meta name="description" content="<?php echo ($description); ?>" />
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/default/style/comm.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/default/style/css.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/Skin/default/style/slide.css">
        <script type="text/javascript" src="__PUBLIC__/Style/Js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/Style/Js/jQuery.blockUI.js"></script>
        <script type="text/javascript" src="__PUBLIC__/Style/Js/jquery.SuperSlide.js"></script>
    </head>
    <body>
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
                                    <form action="__APP__/Search" method="post" target="_blank">
                                        <input type="text" class="sinput" name="words">
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
                    <?php Load("extend"); $_result=list_to_tree(M('NavHead')->order("id asc")->limit(0,50)->select(),"id", "parent_id", "children"); if ($_result): $i=0;foreach($_result as $key=>$nav):++$i;$mod = ($i % 2 );?><li><a href="__APP__/<?php echo ($nav["url"]); ?>" target="_self"><?php echo ($nav["text"]); ?></a></li><?php endforeach; endif;?>
                    <div class="clear"></div>
                </ul>
            </div><!--nav-->
        </div>
<div class="blank"></div>
<div class="block wp">
    <div class="blockL f_left">
        <div class="box">
            <div class="flash">
                <!-- content S -->
                <div class="effect">
                    <div id="slideBox" class="slideBox">
                        <div class="hd">
                            <ul><li>1</li><li>2</li></ul>
                        </div>
                        <div class="bd">
                            <ul>
                                <?php $_result=M('Flash')->order("id desc")->limit(0,6)->where(" (`status`='true') ")->select(); if ($_result): $i=0;foreach($_result as $key=>$flash):++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($flash["eurl"]); ?>"><img src="<?php echo ($flash["epic"]); ?>" title="<?php echo ($flash["emark"]); ?>" /></a></li><?php endforeach; endif;?>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- content E -->
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
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.status='true') and (t.is_recycle='false') ")->limit(0,2)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li>
                                <div class="phototext_pic f_left">
                                    <a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>"><img alt="<?php echo ($article["title"]); ?>" src="<?php echo ($article["titlepic"]); ?>"></a>
                                </div><!--phototext_pic-->
                                <div class="phototext_text f_right">
                                    <h3><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>"><?php echo ($article["title"]); ?></a></h3>
                                    <p><?php echo ($article["description"]); ?></p>
                                </div><!--phototext_text-->
                                <div class="clear"></div>
                            </li><?php endforeach; endif;?>
                    </ul>
                </div><!--common_cont-->
                <div class="common_cont text">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.status='true') and (t.is_recycle='false') ")->limit(0,5)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
                    </ul>
                </div><!--common_cont-->

            </div><!--common-->


        </div><!--box-->

    </div><!--blockL-->

    <div class="blockM f_left mleft">
        <div class="box">
            <div class="common commonbd">
                <div class="common_cont headlinetop">
                    <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.status='true') and (t.is_recycle='false') ")->limit(0,1)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><h3><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>"><?php echo ($article["title"]); ?></a></h3>
                        <p><?php echo ($article["description"]); ?></p><?php endforeach; endif;?>
                </div><!--common_cont-->
                <div class="common_cont ftext">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.status='true') and (t.is_recycle='false') ")->limit(0,6)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.status='true') and (t.is_recycle='false') ")->limit(0,7)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li>
                                <div class="title f_left">
                                    <a href="__APP__/List/?id=<?php echo ($article["sort_id"]); ?>">[<?php echo ($article["sortname"]); ?>]</a>
                                    <a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>"><?php echo ($article["title"]); ?></a></div>
                                <div class="time f_right">[<?php echo (date("m-d",$article["addtime"])); ?>]</div>
                                <div class="clear"></div>
                            </li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=26">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont text">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(26)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,5)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li>
                                <div class="title f_left"><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>"><?php echo ($article["title"]); ?></a></div>
                                <div class="time f_right">[<?php echo (date("m-d",$article["addtime"])); ?>]</div>
                                <div class="clear"></div>
                            </li><?php endforeach; endif;?>
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
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.status='true') and (t.is_recycle='false') ")->limit(0,6)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=28">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont phototext">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(28)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,4)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li>
                                <div class="phototext_pic f_left">
                                    <a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>"><img alt="<?php echo ($article["title"]); ?>" src="<?php echo ($article["titlepic"]); ?>"></a>
                                </div><!--phototext_pic-->
                                <div class="phototext_rtext f_right">
                                    <h3><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>"><?php echo ($article["title"]); ?></a></h3>
                                    <p><?php echo ($article["description"]); ?></p>
                                </div><!--phototext_text-->
                                <div class="clear"></div>
                            </li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=27" target="_blank">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont text">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("t.id desc")->where(" (t.`sort_id` in(27)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=12" target="_blank">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont text">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(12)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=2" target="_blank">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont text">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(2)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li>
                                <div class="title f_left"><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>"><?php echo ($article["title"]); ?></a></div>
                                <div class="time f_right">[<?php echo (date("m-d",$article["addtime"])); ?>]</div>
                                <div class="clear"></div>
                            </li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=15" target="_blank">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont ftext">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(15)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,12)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=24" target="_blank">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont phototext">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(24)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,3)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li>
                                <div class="phototext_pic f_left">
                                    <a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>"><img alt="<?php echo ($article["title"]); ?>" src="<?php echo ($article["titlepic"]); ?>"></a>
                                </div><!--phototext_pic-->
                                <div class="phototext_rtext f_right">
                                    <h3><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>"><?php echo ($article["title"]); ?></a></h3>
                                    <p><?php echo ($article["description"]); ?></p>
                                </div><!--phototext_text-->
                                <div class="clear"></div>
                            </li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=18">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont ftext">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(18)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=17">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont text">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(17)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=16">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont text">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(16)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li>
                                <div class="title f_left"><a href=""></a><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>"><?php echo ($article["title"]); ?></a></div>
                                <div class="time f_right">[<?php echo (date("m-d",$article["addtime"])); ?>]</div>
                                <div class="clear"></div>
                            </li><?php endforeach; endif;?>
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
                    <div class="ctop_r f_right"><a href="__APP__/List/?id=23">更多»</a></div>
                    <div class="clear"></div>
                </div><!--common_top-->
                <div class="common_cont ftext">
                    <ul>
                        <?php $_result=M('Title')->table('ding_title t')->join(' ding_news_sort ns on ns.id=t.sort_id ')->field( 't.*,ns.text as sortname' )->order("id desc")->where(" (t.`sort_id` in(23)) and (t.status='true') and (t.is_recycle='false') ")->limit(0,10)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><li><a href="__APP__/Content/?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif;?>
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
                <?php Load("extend"); $_result=list_to_tree(M('Links')->order("id desc")->limit(0,10)->where(" (`status`='true') ")->select(),"id", "parent_id", "children"); if ($_result): $i=0;foreach($_result as $key=>$links):++$i;$mod = ($i % 2 );?><a href="<?php echo ($links["weburl"]); ?>" title="<?php echo ($links["emark"]); ?>" target="_blank"><?php echo ($links["webname"]); ?></a><?php endforeach; endif;?>
                <div class="clear"></div>
            </div><!--common_cont-->
        </div><!--common-->
    </div><!--box-->
</div>

<div class="blank"></div>
<div class="foot wp">
<p>© （<a href="http://www.adminsir.net">www.adminsir.net</a>）站长先生网--版权所有，并保留所有权利。<br />
Powered by <a href="http://www.dingcms.com" target="_blank">www.dingcms.com</a><a href="http://webscan.360.cn/index/checkwebsite/url/www.adminsir.net"></a></p>
</div>
<script type="text/javascript">jQuery(".slideBox").slide( { mainCell:".bd ul",effect:"leftLoop",autoPlay:true} );</script>


</body>
</html>