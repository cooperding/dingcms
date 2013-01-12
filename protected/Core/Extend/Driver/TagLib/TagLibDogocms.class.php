<?php

//import("TagLib");  //引入TagLib 类

class TagLibDogocms extends TagLib {   //定义blog标签

    protected $tags = array(
        'test' => array("attr" => "attr1,attr2", level => 3),
        'article' => array('attr' => 'name,field,limit,order,where,sql,key,mod', 'level' => 3),
        'nav'=>array("attr"=>"attr1,attr2",level=>3),
        'sort'=>array("attr"=>"attr1,attr2",level=>3),
        'article'=>array("attr"=>"attr1,attr2",level=>3),
        'message'=>array("attr"=>"attr1,attr2",level=>3),
        'comment'=>array("attr"=>"attr1,attr2",level=>3),
        'list'=>array("attr"=>"attr1,attr2",level=>3),
        'pagelist'=>array("attr"=>"attr1,attr2",level=>3),
        'ad'=>array("attr"=>"attr1,attr2",level=>3),
        'page'=>array("attr"=>"attr1,attr2",level=>3),
        'block'=>array("attr"=>"attr1,attr2",level=>3),
    );

    public function _test($attr, $content) {
        $tag = $this->parseXmlAttr($attr, 'test');
        return $tag["attr1"] . "," . $tag["attr2"];
    }

    public function _article($attr, $content) {

        $tag = $this->parseXmlAttr($attr, 'article');
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