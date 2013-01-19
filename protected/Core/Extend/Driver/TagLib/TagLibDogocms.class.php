<?php

//自定义标签
class TagLibDogocms extends TagLib {

    protected $tags = array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        // 'test' => array("attr" => "attr1,attr2", level => 3),
        'nav' => array("attr" => "limit,type,order,name", level => 3), //网站导航 type:top,son,all;name:head,foot
        'article' => array('attr' => 'typeid,type,tid,modeid,limit,flag,orderby,keyword,sql', 'level' => 3), //文章内容
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
    public function _nav($attr, $content)
    {
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

    public function _article($attr, $content)
    {
//'article' => array('attr' => 'typeid,type,tid,modeid,limit,flag,orderby,keyword', 'level' => 3),//文章内容
        $tag = $this->parseXmlAttr($attr, 'article');
        $typeid = $tag['typeid']; //分类id
        $type = $tag['type']; //分类类型type:all
        $tid = $tag['tid']; //指定文档id
        $modeid = $tag['modeid']; //模型id
        $limit = $tag['limit']; //显示信息数 默认10
        $flag = $tag['flag']; //信息属性
        $order = $tag['order']; //信息排序
        $keyword = $tag['keyword']; //包含关键词
        if ($typeid) {
            if ($type) {//分类类型存在时，分类id一定存在，此处根据type获取所有子类id
                $condition['sort_id'] = $typeid;
            } else {
                $condition['sort_id'] = $typeid;
            }
        }
        if ($tid) {
            //$condition['id'] = array('in',$tid);
        }

        $tag['where'] = ' id in('.$tid.') ';
        $tag['where'] .= ' and sort_id in('.$typeid.')';

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