<?php

//自定义标签
class TagLibDogocms extends TagLib {

    protected $tags = array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        // 'test' => array("attr" => "attr1,attr2", level => 3),
        'nav' => array("attr" => "limit,type,order,name", level => 3), //网站导航 type:top,son,all;name:head,foot
        'article' => array('attr' => 'typeid,type,tid,modeid,limit,flag,order,keywords,sql', 'level' => 3), //文章内容
        'sort' => array("attr" => "attr1,attr2", level => 3), //栏目分类
        'message' => array("attr" => "attr1,attr2", level => 3), //咨询留言
        'comment' => array("attr" => "attr1,attr2", level => 3), //评论
        'list' => array("attr" => "attr1,attr2", level => 3), //列表页内容
        'pagelist' => array("attr" => "attr1,attr2", level => 3), //分页
        'ad' => array("attr" => "attr1,attr2", level => 3), //广告（包含幻灯）
        'page' => array("attr" => "attr1,attr2", level => 3), //广告（包含幻灯）
        'block' => array("attr" => "attr1,attr2", level => 3), //碎片
        'member' => array("attr" => "attr1,attr2", level => 3), //会员信息(个人)
    );

//$m->table()->alias()->page()->group()->having()->join()->union()->field()->where()->order()->limit()->select();
    public function _nav($attr, $content) {
        $tag = $this->parseXmlAttr($attr, 'nav');
        $name = $tag['name'];
        $limit = $tag['limit'];
        $order = $tag['order'];
        $type = $tag['type'];
        $tag['name'] = ucfirst($tag['name']);
        $sql = "M('Nav{$tag['name']}')->";
        $sql .= ($tag['row']) ? "field({$tag['row']})->" : '';
        $sql .= ($tag['order']) ? "order({$tag['order']})->" : '';
        $sql .= ($tag['limit']) ? "limit({$tag['limit']})->" : '';
        $sql .= ($tag['type']) ? "order({$tag['type']})->" : '';
        $sql .= "select()";
        $parsestr = $sql;
        return $parsestr;
    }

    public function _article($attr, $content) {
//'article' => array('attr' => 'typeid,type,tid,modeid,limit,flag,orderby,keyword', 'level' => 3),//文章内容
        $tag = $this->parseXmlAttr($attr, 'article');
        $typeid = trim($tag['typeid']); //分类id
        $type = strtoupper($tag['type']); //分类类型type:all
        $tid = $tag['tid']; //指定文档id
        $modeid = trim($tag['modeid']); //模型id
        $limit = $tag['limit']; //显示信息数 默认10
        $flag = $tag['flag']; //信息属性
        $order = $tag['order']; //信息排序
        $keywords = $tag['keywords']; //包含关键词
        if (!$modeid) {
            if ($typeid) {
                if ($type == 'ALL') {//分类类型存在时，分类id一定存在，此处根据type获取所有子类id
                    $ns = M('NewsSort');
                    $typeid_arr = array();
                    foreach (explode(',', $typeid) as $k => $vid) {
                        $path .= ' (path `like` \'%,' . $vid . ',%\') or';
                        $path .= ' (`id` = ' . $vid . ') or';
                    }
                    $path = rtrim($path, 'or ');
                    $rs = $ns->field('id')->where($path)->select();
                    foreach ($rs as $v) {
                        $sort_id .= $v['id'] . ',';
                    }
                    $sort_id = rtrim($sort_id, ', ');
                    $tag['where'] = ' (`sort_id` in(' . $sort_id . '))';
                } else {
                    $tag['where'] = ' (`sort_id` in(' . $typeid . '))';
                }
            }//if
        } else {
            $ns = M('NewsSort');
            if ($typeid) {
                if ($type == 'ALL') {//分类类型存在时，分类id一定存在，此处根据type获取所有子类id
                    $typeid_arr = array();
                    foreach (explode(',', $typeid) as $k => $vid) {
                        $path .= ' (`path` like \'%,' . $vid . ',%\') or';
                        $path .= ' (`id` = ' . $vid . ') or';
                    }
                    $path = rtrim($path, 'or ');
                    $path .= ' and (`model_id` in(' . $modeid . ')) ';
                    $rs = $ns->field('id')->where($path)->select();
                    foreach ($rs as $v) {
                        $sort_id .= $v['id'] . ',';
                    }
                    $sort_id = rtrim($sort_id, ', ');
                    $tag['where'] = ' (`sort_id` in(' . $sort_id . '))';
                } else {
                    $path .= ' (`model_id` in(' . $modeid . ')) ';
                    $rs = $ns->field('id')->where($path)->select();
                    foreach($rs as $k=>$v){
                        $modeid_arr[] = $v['id'];
                     }
                     $he_arr = array_intersect($modeid_arr,explode(',', $typeid));
                    //此处应该是两个数组取交集
                    $tag['where'] = ' (`sort_id` in(' . implode(',', $he_arr) . '))';
                }
            } else {//查出所有sort_id再组装语句
                $path .= ' (`model_id` in(' . $modeid . ')) ';
                $rs = $ns->field('id')->where($path)->select();
                foreach ($rs as $v) {
                    $sort_id .= $v['id'] . ',';
                }
                $sort_id = rtrim($sort_id, ', ');
                $tag['where'] = ' (`sort_id` in(' . $typeid . '))';
            }//if
        }
        if ($tid) {
            if ($tag['where']) {
                $tag['where'] .= ' and (`id` in(' . $tid . ')) ';
            } else {
                $tag['where'] = ' (`id` in(' . $tid . ')) ';
            }
        }//if
        if($flag){
            foreach(explode(',', $flag) as $k=>$v){
                $flag_like .= ' (`flag` like \'%' . $v . '%\') or ';
            }
            $flag_like = rtrim($flag_like, 'or ');
            if($tag['where']){
                $tag['where'] .= ' and ('.$flag_like.') ';
            }else{
                $tag['where'] = ' ('.$flag_like.') ';
            }
        }//if
        if($keywords){
            if($tag['where']){
                $tag['where'] .= ' and (`keywords` like \'%' . $keywords . '%\') ';
            }else{
                $tag['where'] = ' (`keywords` like \'%' . $keywords . '%\') ';
            }
        }//if
        /*
         * 此处考虑join方式查询扩展的内容模型表信息
         * 当开启的时候组装join语句，联合查询
         * 
         */
        $typeid = !empty($typeid);
        $result = !empty($tag['result']) ? $tag['result'] : 'article'; //定义数据查询的结果存放变量
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';

        if ($tag['name']) {
            $sql = "M('{$tag['name']}')->";
            $sql .= ($tag['field']) ? "field({$tag['field']})->" : '';
            $sql .= ($tag['order']) ? "order({$tag['order']})->" : '';
            $sql .= ($tag['where']) ? "where(\"{$tag['where']}\")->" : '';   //被重新处理过了
            $sql .= ($tag['limit']) ? "limit({$tag['limit']})->" : '';
            $sql .= "select()";
        }

        //下面拼接输出语句
        $parsestr = '<?php $_result=' . $sql . '; if ($_result): $' . $key . '=0;';
        $parsestr .= 'foreach($_result as $key=>$' . $result . '):';
        $parsestr .= '++$' . $key . ';$mod = ($' . $key . ' % ' . $mod . ' );?>';
        $parsestr .= $content; //解析在article标签中的内容
        $parsestr .= '<?php endforeach; endif;?>';
        return $parsestr;
    }

}

?>