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
            var data = jQuery.parseJSON(data);
            //alert(data.msg+'=======dede====');
            //return false;
            if(data.code==1){
                $.messager.alert(data.msg,data.msg,'error');
            }else if(data.code==2){
                $.messager.show({
                    title:data.msg,
                    msg:data.msg,
                    timeout:5000,
                    showType:'slide'
                });
                if(data.isclose=='ok'){
                    $('#dialog'+classId).dialog('close');
                }
            }
        }
    }); 
}
/*更新tab功能*/
function updateTab(classId,url,subtitle){
    //alert(url);
    //return false;
    $('#tabs'+classId).tabs('select',subtitle);
    var tab = $('#tabs'+classId).tabs('getSelected');
    tab.panel('refresh', url);
    closeCombo();
}
/*
 *openDialog 弹出框
 *href 传递控制器的url地址
 *title 弹出窗口的标题
 */
function openDialog(classId,href,title){
    $('#dialog'+classId).dialog({
        href:href,
        width:500,
        height:200,
        resizable:true,
        title:title,
        // modal:true,
        resizable:true,
        collapsible:true,
        maximizable:true,
        cache: false,
        buttons:[{
            text:'保存',
            iconCls:'icon-ok',
            handler:function(){
                submitForm(classId);
            }
        },{
            text:'取消',
            iconCls:'icon-canel',
            handler:function(){
                $('#dialog'+classId).dialog('close');
            //closeCombo();
            }
        }
        ]	
    });
//$('#dialog'+classId).dialog('refresh', href);
}
function closeCombo(){
    $('body.layoutindex>.combo-p').remove();
    $('body.layoutindex>.window').remove();
    $('body.layoutindex>.window-shadow').remove();
    $('body.layoutindex>.window-mask').remove();
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
$('.window').click(function(){
    //$('a.panel-tool-close').click(function(){
    alert('44444');
});
