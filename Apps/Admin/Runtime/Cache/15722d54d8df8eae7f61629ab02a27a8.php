<?php if (!defined('THINK_PATH')) exit();?><div class="pagecontent">

    <table  id="newsindex" class="easyui-datagrid datagrid">
        <thead>
            <tr>
                <th data-options="field:'id',align:'center'" rowspan="2" width="50">ID</th>
                <th data-options="field:'text'" width="200">标题</th>
                <th data-options="field:'parent_id'" width="200">parent_id</th>
                <th data-options="field:'myorder'" width="200">myorder</th>
                <th data-options="field:'do'" width="80">操作</th>
            </tr>
        </thead>
    </table>
    



    <script>
        $(function(){
            var height = $('.indexcenter').height();
            $('#newsindex').datagrid({
                url:'__APP__/News/json',
                idField:'id',
                //treeField:'cat_name',
                pagination:true,
                rownumbers:true,
                fitColumns:true,
                checkbox:true,
                //autoRowHeight:false,
                //showFooter:true,
                //singleSelect:true,
                height:height-50,
                frozenColumns:[[
                        {field:'ck',checkbox:true}
                    ]],
                //                columns:[[
                //                    {field:'myorder',title:'Operation',width:100,align:'center', rowspan:1,
                //                        formatter:function(value,rec){
                //                            return '<span style="color:red">编辑</span>';
                //                        }
                //                    }
                //                ]],
                toolbar:[{
                        id:'newsindexbtnadd',
                        text:'添加',
                        iconCls:'icon-add',
                        handler:function(){
                            $('#btnsave').linkbutton('enable');
                            alert('add')
                        }
                    },'-',{
                        id:'newsindexbtncancel',
                        text:'放入回收站',
                        iconCls:'icon-cancel',
                        handler:function(){
                            //$('#btnsave').linkbutton('enable');
                            var ids = [];
                            var rows = $('#newsindex').datagrid('getSelections');
                            for(var i=0;i<rows.length;i++){
                                ids.push(rows[i].id);
                            }
                            //alert('cancel');
                            alert(ids.join(','));
                        }
                    }
                ]
            });
            
           
        })
    </script>
    <div id="dialog" data-options="iconCls:'icon-save'">

    </div>
</div><!--pagecontent-->