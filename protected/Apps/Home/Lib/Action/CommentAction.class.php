<?php

/**
 * CommentAction.class.php
 * 评论相关操作文件
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:08
 * @package  Controller
 * @todo 完善更多方法
 */
class CommentAction extends BaseAction {

    public function index()
    {
        /*
          $m = M('Setting');
          $title['sys_name'] = array('eq', 'cfg_title');
          $keywords['sys_name'] = array('eq', 'cfg_keywords');
          $description['sys_name'] = array('eq', 'cfg_description');
          $data_title = $m->where($title)->find();
          $data_keywords = $m->where($keywords)->find();
          $data_description = $m->where($description)->find();

          $this->assign('title', $data_title['sys_value']);
          $this->assign('keywords', $data_keywords['sys_value']);
          $this->assign('description', $data_description['sys_value']);
          $this->display(':index');
         *
         */
    }

    /**
     * insert
     * 写入数据
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function insert()
    {
        $content = trim($_POST['content']);
        $yzm = trim($_POST['yzm']);
        if(session('verifycomment')!=md5($yzm)){
            $array = array('status'=>1,'msg'=>'验证码输入错误，或者输入为空');
            echo json_encode($array);
            exit;
        }
        if(empty($content)){
            $array = array('status'=>1,'msg'=>'请输入评论内容！');
            echo json_encode($array);
            exit;
        }
        $m = M('Comment');
        $data['title_id'] = intval($_POST['title_id']);
        $data['msgcontent'] = $content;
        $data['addtime'] = time();
        $data['ip'] = get_client_ip();
        $rs = $m->add($data);
        if($rs==true){
            $array = array('status'=>2,'msg'=>'dedeffgg===');
            echo json_encode($array);
            exit;
        }else{
            $array = array('status'=>1,'msg'=>'添加失败');
            echo json_encode($array);
            exit;
        }
    }

    /**
     * vercode
     * 生成验证码
     * @access public
     * @return boolean
     * @version dogocms 1.0
     */
    public function vercode()
    {
        import("ORG.Util.Image");
        $length = 4; //验证码的长度
        $mode = 1; //0 字母 1 数字 2 大写字母 3 小写字母 4中文 5混合
        $type = 'png'; //验证码的图片类型，默认为png
        $width = 70; //验证码的宽度
        $height = 25; //验证码的高度
        $verifyName = 'verifycomment'; //验证码的SESSION记录名称
        Image::buildImageVerify($length, $mode, $type, $width, $height, $verifyName);
    }

}