<?php

/**
 * UploadAction.class.php
 * 上传文件中心
 * @author 正侠客 <lookcms@gmail.com>
 * @copyright 2012- http://www.dingcms.com http://www.dogocms.com All rights reserved.
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version dogocms 1.0 2012-11-5 11:23
 * @package  Controller
 * @todo 上传权限及各种安全过滤
 */
class UploadAction extends AdminAction {

    /**
     * upload
     * 上传文件
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function upload()
    {
        echo json_encode(array('error' => 1, 'message' => 'dddddddddddd'));
	exit;
    }

    /**
     * fileManagerJson
     * 罗列文件（文件浏览器）
     * @access public
     * @return array
     * @version dogocms 1.0
     */
    public function fileManagerJson()
    {
        echo json_encode(array('error' => 1, 'message' => 'file1234567'));
	exit;
    }

}

?>