<?php if (!defined('THINK_PATH')) exit();?><div class="pagecontent">

    <table title="<?php echo L('menu_nav_head');?>" id="treegrid_navhead" class="easyui-treegrid treegrid">

    </table>
    <script>
        $(function(){
            var classId = 'navhead';
            var urljson = '__APP__/NavHead/json';
            var hrefadd = '__APP__/NavHead/add';
            var hrefedit = '__APP__/NavHead/edit';
            var hrefcancel = '__APP__/NavHead/delete';
            openTreeGrid(classId,urljson,hrefadd,hrefedit,hrefcancel);
            $('#treegrid_'+classId).treegrid({
                columns:[[  
                        {field:'id',title:'id',width:50},
                        {field:'text',title:'text',width:200},
                        {field:'parent_id',title:'parent_id',width:200},
                        {field:'myorder',title:'myorder',width:80}
                    ]]
            })
        })
    </script>
    <div id="dialog_navhead" data-options="iconCls:'icon-save'">

    </div>
</div><!--pagecontent-->