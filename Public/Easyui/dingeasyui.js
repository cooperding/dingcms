/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 *  submitForm  提交表单时执行
 *  classId 为当前表单的id
 */
function submitForm(classId){
    var url = $('#form'+classId).attr('action');
    $('#form'+classId).form('submit',{
        url:url,
        onSubmit:function(){
        //$('#dialog').dialog('refresh', '__APP__/Setting/add');
        //alert(url); 
        //$('#dialog').dialog('close');
        },
        success:function(data){
            //alert(data);
            if(data==1){
                $.messager.alert('信息提示','变量名已经存在!','error');
            }else if(data==2){
                $.messager.show({
                    title:'信息提示',
                    msg:'添加修改成功!',
                    timeout:5000,
                    showType:'slide'
                });
                // $('#dialog').dialog('refresh', href);//此处需要调整
                $('#dialog'+classId).dialog('close');
            }else if(data==3){
                $.messager.show({
                    title:'信息提示',
                    msg:'添加修改失败!',
                    timeout:5000,
                    showType:'slide'
                });
            }else{
                $.messager.show({
                    title:'信息提示',
                    msg:'{:L("add")}!',
                    timeout:5000,
                    showType:'slide'
                });
            }
        }
    }); 
}
/*更新tab功能*/
function updateTab(classId,url,subtitle){
    $('#tabs'+classId).tabs('select',subtitle);
    var tab = $('#tabs'+classId).tabs('getSelected');  // get selected panel
    tab.panel('refresh', url);
}
/*
 *openDialog 弹出框
 *href 传递控制器的url地址
 *title 弹出窗口的标题
 */
function openDialog(classId,href,title){
    $('#dialog'+classId).dialog({
        href:href,
        width:600,
        height:400,
        resizable:true,
        title:title,
        modal:true,
        resizable:true,
        collapsible:true,
        maximizable:true,
        buttons:[{
            text:'保存',
            iconCls:'icon-ok',
            handler:function(){
                submitForm(classId);
            }
        }]	
    });
    $('#dialog'+classId).dialog('refresh', href);
}
function deleteConfirm(){
    
}
/*
 *添加tab
 *暂未使用，有问题
 */
function addTab(subtitle, url){
    //alert(555);
    if(!$('#tabs').tabs('exists',subtitle)){
        $('#tabs').tabs('add',{
            title:subtitle,
            content:subtitle,
            closable:true,
            href:url,
            tools:[{
                iconCls:'icon-mini-refresh',
                handler:function(){
                    updateTab(url);
                }
            }]
        });
        return false;
    }else{
        $('#tabs').tabs('select',subtitle);
        var tab = $('#tabs').tabs('getSelected');  // get selected panel
        tab.panel('refresh', url);
        return false;
    }
}

/*
* openTreeGrid 执行树结构的文档
*classId id
* urljson 读取数据的url地址
* hrefadd 添加信息路径
* hrefedit修改信息路径
* hrefcancel 删除信息路径 暂未使用
*/

function openTreeGrid(classId,urljson,hrefadd,hrefedit,hrefcancel){
    var height = $('.indexcenter').height();
    $('#index'+classId).treegrid({
        url:urljson,
        idField:'id',
        treeField:'text',
        pagination:true,
        rownumbers:true,
        fitColumns:true,
        autoRowHeight:false,
        showFooter:true,
        height:height-50,
        animate:true,
        toolbar:[{
            id:'btnadd'+classId,
            text:'添加',
            iconCls:'icon-add',
            handler:function(){
                var title = '添加分类';
                openDialog(classId,hrefadd,title);
            }
        },'-',{
            id:'btnedit'+classId,
            text:'编辑',
            iconCls:'icon-edit',
            handler:function(){
                var selected = $('#index'+classId).datagrid('getSelected');
                var id = selected.id;
                var href = hrefedit+'?id='+id;
                var title = '编辑信息';
                openDialog(classId,href,title);
            }
        },'-',{
            id:'btncancel'+classId,
            text:'删除',
            iconCls:'icon-cancel',
            handler:function(){
                var selected = $('#index'+classId).datagrid('getSelected');
                var id = selected.id;
                var href = hrefcancel+'?id='+id;
                var title = '删除信息';
                openDialog(classId,href,title);
            }
        }
        ]
    });         
}
function openDatagrid(){
    
}