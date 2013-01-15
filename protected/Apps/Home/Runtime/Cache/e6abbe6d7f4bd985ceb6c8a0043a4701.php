<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <title>5555</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>

<body>
<?php echo ($url); ?>
M('NavHead')->order(id asc)->limit(0,5)->order(son)->select()
 <?php $_result=M('Title')->limit(2,5)->select(); if ($_result): $i=0;foreach($_result as $key=>$article):++$i;$mod = ($i % 2 );?><br/>
 <?php echo ($article["id"]); ?>==<?php echo ($article["title"]); ?>

 <br/><?php endforeach; endif;?>
<br/>
54654564
</body>
</html>