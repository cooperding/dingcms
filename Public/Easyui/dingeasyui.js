/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function submitform(formid,url){
    $(formid).form('submit',{
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
                $('#dialog').dialog('refresh', href);//此处需要调整
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
                    msg:'未修改信息!',
                    timeout:5000,
                    showType:'slide'
                });
            }
        }
    }); 
}
/*更新tab功能*/
function updateTab(url){
    var tab = $('#tabs').tabs('getSelected');
    $("#tabs").tabs('update',{
        tab: tab,
        options: {
            href: url
        }
    });
    tab.panel('refresh');
}
/*添加tab*/
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




