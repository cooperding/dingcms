<?php

//自定义标签
class TagLibDogocms extends TagLib {

    protected $tags = array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        // 'test' => array("attr" => "attr1,attr2", level => 3),
        'nav' => array("attr" => "id,limit,type,order,name,key,mod", level => 3), //网站导航 type:top,son,all;name:head,foot
        'article' => array('attr' => 'id,typeid,type,tid,modeid,limit,flag,order,keywords,model_name', 'level' => 3), //文章内容
        'sort' => array("attr" => "id,limit,type,order,name,key,mod", level => 3), //栏目分类
        'message' => array("attr" => "attr1,attr2", level => 3), //咨询留言
        'comment' => array("attr" => "attr1,attr2", level => 3), //评论
        'list' => array("attr" => "attr1,attr2", level => 3), //列表页内容
        'pagelist' => array("attr" => "attr1,attr2", level => 3), //分页
        'ad' => array("attr" => "attr1,attr2", level => 3), //广告（包含幻灯）
        'page' => array("attr" => "attr1,attr2", level => 3), //广告（包含幻灯）
        'block' => array("attr" => "attr1,attr2", level => 3), //碎片
        'member' => array("attr" => "attr1,attr2", level => 3), //会员信息(个人)
    );

//  头部和底部导航
    public function _nav($attr, $content)
    {
        $tag = $this->parseXmlAttr($attr, 'nav');
        $name = $tag['name'];
        $limit = $tag['limit'];
        $order = $tag['order'];//字符串加引号
        $type = $tag['type'];
        $id   = $tag['id'];
        $tag['name'] = ucfirst($tag['name']);
        $sql = "M('Nav{$tag['name']}')->";
        $sql .= ($tag['row']) ? "field({$tag['row']})->" : '';
        $sql .= ($order) ? "order(\"{$order}\")->" : '';
        $sql .= ($tag['limit']) ? "limit({$tag['limit']})->" : '';
        //$sql .= ($tag['type']) ? "order({$tag['type']})->" : '';
        $sql .= ($tag['where']) ? "where(\"{$tag['where']}\")->" : '';   //被重新处理过了
        $sql .= "select()";
        $result = !empty($id) ? $id : 'nav'; //定义数据查询的结果存放变量
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';


        //下面拼接输出语句
        $parsestr = '<?php Load("extend"); ';
        $parsestr .= '$_result=list_to_tree('.$sql.',"id", "parent_id", "children"); if ($_result): $' . $key . '=0;';
        $parsestr .= 'foreach($_result as $key=>$' . $result . '):';
        $parsestr .= '++$' . $key . ';$mod = ($' . $key . ' % ' . $mod . ' );?>';
        $parsestr .= $content; //解析在article标签中的内容
        $parsestr .= '<?php endforeach; endif;?>';
       // echo $parsestr;

        return $parsestr;

    }

    public function _article($attr, $content)
    {
        $tag = $this->parseXmlAttr($attr, 'article');
        $typeid = trim($tag['typeid']); //分类id
        $type = strtoupper($tag['type']); //分类类型type:all
        $tid = $tag['tid']; //指定文档id
        $id   = $tag['id'];
        $modeid = trim($tag['modeid']); //模型id
        $model_name = trim($tag['model_name']); //模型名称
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
                    foreach ($rs as $k => $v) {
                        $modeid_arr[] = $v['id'];
                    }
                    $he_arr = array_intersect($modeid_arr, explode(',', $typeid));
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
        if ($flag) {
            foreach (explode(',', $flag) as $k => $v) {
                $flag_like .= ' (`flag` like \'%' . $v . '%\') or ';
            }
            $flag_like = rtrim($flag_like, 'or ');
            if ($tag['where']) {
                $tag['where'] .= ' and (' . $flag_like . ') ';
            } else {
                $tag['where'] = ' (' . $flag_like . ') ';
            }
        }//if
        if ($keywords) {
            if ($tag['where']) {
                $tag['where'] .= ' and (`keywords` like \'%' . $keywords . '%\') ';
            } else {
                $tag['where'] = ' (`keywords` like \'%' . $keywords . '%\') ';
            }
        }//if
        if ($model_name) {//写出模型名称（此处以后完善）
            $join = 'join(\' right join ' . C('DB_PREFIX') . C('DB_ADD_PREFIX') . $model_name . ' on ' . C('DB_PREFIX') . C('DB_ADD_PREFIX') . $model_name . '.title_id = id \')->';
            /*
            foreach (explode(',', $model_name) as $k => $v) {
                $join .= 'join(\' right join ' . C('DB_PREFIX') . C('DB_ADD_PREFIX') . $v . ' on ' . C('DB_PREFIX') . C('DB_ADD_PREFIX') . $v . '.title_id = id \')->';
            }
             *
             */
            //$join = ' right join '.C('DB_PREFIX') . C('DB_ADD_PREFIX').'article an on an.title_id = id';
        }
        if($tag['where']){
            $tag['where'] .= ' and (status=\'true\') and (is_recycle=\'false\') ';
        }else{
            $tag['where'] = ' (status=\'true\') and (is_recycle=\'false\') ';
        }
        $result = !empty($id) ? $id : 'article'; //定义数据查询的结果存放变量
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';


        $sql = "M('Title')->";
        $sql .= ($model_name) ? $join : '';
        $sql .= ($tag['field']) ? "field({$tag['field']})->" : '';
        $sql .= ($order) ? "order(\"{$order}\")->" : 'order(\'id desc\')->';
        $sql .= ($tag['where']) ? "where(\"{$tag['where']}\")->" : '';   //被重新处理过了
        $sql .= ($tag['limit']) ? "limit({$tag['limit']})->" : '';
        $sql .= "select()";



        //下面拼接输出语句
        $parsestr = '<?php $_result=' . $sql . '; if ($_result): $' . $key . '=0;';
        $parsestr .= 'foreach($_result as $key=>$' . $result . '):';
        $parsestr .= '++$' . $key . ';$mod = ($' . $key . ' % ' . $mod . ' );?>';
        $parsestr .= $content; //解析在article标签中的内容
        $parsestr .= '<?php endforeach; endif;?>';
        return $parsestr;
        /*
         * 备份这段代码
        //下面拼接输出语句
        $parsestr = '<?php $_result=' . $sql . '; if ($_result): $' . $key . '=0;';
        $parsestr .= 'foreach($_result as $key=>$' . $result . '):';
        $parsestr .= '++$' . $key . ';$mod = ($' . $key . ' % ' . $mod . ' );?>';
        $parsestr .= $content; //解析在article标签中的内容
        $parsestr .= '<?php endforeach; endif;?>';
        return $parsestr;
         *
         */
    }
    //文档分类
     public function _sort($attr, $content)
    {
        $tag = $this->parseXmlAttr($attr, 'sort');
        $limit = $tag['limit'];
        $order = $tag['order'];//字符串加引号
        $type = $tag['type'];
        $id   = $tag['id'];
        $tag['name'] = ucfirst($tag['name']);
        $sql = "M('NewsSort')->";
        $sql .= ($tag['row']) ? "field({$tag['row']})->" : '';
        $sql .= ($order) ? "order(\"{$order}\")->" : '';
        $sql .= ($tag['limit']) ? "limit({$tag['limit']})->" : '';
        //$sql .= ($tag['type']) ? "order({$tag['type']})->" : '';
        $sql .= ($tag['where']) ? "where(\"{$tag['where']}\")->" : '';   //被重新处理过了
        $sql .= "select()";
        $result = !empty($id) ? $id : 'sort'; //定义数据查询的结果存放变量
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $mod = isset($tag['mod']) ? $tag['mod'] : '2';


        //下面拼接输出语句
        $parsestr = '<?php Load("extend"); ';
        $parsestr .= '$_result=list_to_tree('.$sql.',"id", "parent_id", "children"); if ($_result): $' . $key . '=0;';
        $parsestr .= 'foreach($_result as $key=>$' . $result . '):';
        $parsestr .= '++$' . $key . ';$mod = ($' . $key . ' % ' . $mod . ' );?>';
        $parsestr .= $content; //解析在article标签中的内容
        $parsestr .= '<?php endforeach; endif;?>';
       // echo $parsestr;

        return $parsestr;

    }

}

?>