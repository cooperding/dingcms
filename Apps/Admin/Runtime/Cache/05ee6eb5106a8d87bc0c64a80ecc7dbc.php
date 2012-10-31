<?php if (!defined('THINK_PATH')) exit();?><div class="pageform">
    <form action="__APP__/NavHead/update" id="form_navhead" method="post">
        <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
        <ul>
            <li>
                <label>分类名称：</label>
                <p><input type="text" name="text" value="<?php echo ($data["text"]); ?>" data-options="required:true" class="easyui-validatebox"/><span class="red">*</span></p>
            </li>
            <li>
                <label>上级分组名：</label>
                <p><input name="parent_id" id="combotree" class="easyui-combotree combotree" data-options="url:'__APP__/NavHead/jsonTree',required:true," value="<?php echo ($data["parent_id"]); ?>"  style="width:200px;"></p
            </li>
            <li>
                <label><?php echo L("keywords");?>：</label>
                <p><input type="text" name="keywords" value="<?php echo ($data["keywords"]); ?>" /></p>
            </li>
            <li>
                <label><?php echo L("description");?>：</label><p><textarea name="description" rows="3" cols="30"><?php echo ($data["description"]); ?></textarea><span class="red"></span></p>
            </li>
            <li>
                <label><?php echo L("orderby");?>：</label><p><input type="text" name="myorder" value="<?php echo ($data["myorder"]); ?>" /></p>
            </li>
        </ul>
    </form>
</div>