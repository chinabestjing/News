<?php if (!defined('THINK_PATH')) exit(); $_show_msg=show_msg();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>巴蜀画派后台管理系统</title>
        <link href="/Public/Common/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Common/base.css" rel="stylesheet">
        <link rel="stylesheet" href="/Public/Admin/css/main.css">
        <script src="/Public/Common/jquery-1.10.2.min.js"></script>
		<script src="/Public/Common/bootstrap/js/bootstrap.min.js"></script>
		<script src="/Public/Admin/js/admin.js"></script>
        <link rel="stylesheet" href="/Public/kindeditor/themes/default/default.css" />
        <script charset="utf-8" src="/Public/kindeditor/kindeditor-min.js"></script>
        <script charset="utf-8" src="/Public/kindeditor/lang/zh_CN.js"></script>
        <script>
            var editor;
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="content"]', {
                    allowFileManager : true
                });
                K('input[name=getHtml]').click(function(e) {
                    alert(editor.html());
                });
                K('input[name=isEmpty]').click(function(e) {
                    alert(editor.isEmpty());
                });
                K('input[name=getText]').click(function(e) {
                    alert(editor.text());
                });
                K('input[name=selectedHtml]').click(function(e) {
                    alert(editor.selectedHtml());
                });
                K('input[name=setHtml]').click(function(e) {
                    editor.html('<h3>Hello KindEditor</h3>');
                });
                K('input[name=setText]').click(function(e) {
                    editor.text('<h3>Hello KindEditor</h3>');
                });
                K('input[name=insertHtml]').click(function(e) {
                    editor.insertHtml('<strong>插入HTML</strong>');
                });
                K('input[name=appendHtml]').click(function(e) {
                    editor.appendHtml('<strong>添加HTML</strong>');
                });
                K('input[name=clear]').click(function(e) {
                    editor.html('');
                });
            });
        </script>
    </head>
    <body>
    <?php echo $_show_msg;?>
<div id="right-content">
    <div class="top">
        <h2>用户管理 <small>后台管理员列表</small></h2>
    </div>

    <ul class="nav nav-tabs mt10">
        <!-- <li role="presentation" class="active">
            <a href="<?php echo U('Category/index');?>">分类列表</a>
        </li> -->
        <li role="presentation">
            <a href="#" data-toggle="modal" data-target="#addBox">添加管理员</a>
        </li>
    </ul>

    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="120">#</th>
                    <th>管理员名</th>
                    <th>管理员状态</th>
                    <th width="200">操作</th>
                </tr>
                </thead>

                <?php if(is_array($_list)): foreach($_list as $key=>$v): ?><tr>
                        <td></td>
                        <td><?php echo ($v["username"]); ?></td>
                        <td><?php if(($v["status"]) == "0"): ?><span style="color: red;">禁用</span>
                            <?php else: ?>
                            <span>启用</span><?php endif; ?>
                        </td>
                        <td class="handle">
                            <a href="<?php echo U('AdminUser/edit',array('id'=>$v['id']));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>修改</a>
                            <a href="javascript:;" class="del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('AdminUser/del', array('id'=>$v['id']));?>'">
                                <i class="glyphicon glyphicon-trash"></i>删除
                            </a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="10" align="right"><?php echo ($page); ?></td>
                </tr>
            </table>
        </div>
    </form>
</div>

<!-- 添加框 begin -->
<div class="modal fade" id="addBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="glyphicon glyphicon-pencil mr5"></i>添加管理员
                </h4>
            </div>
            <form action="<?php echo U('AdminUser/add_adminuser');?>" method="post" class="form-horizontal">
                <div class="modal-body clearfix">
                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">管理员名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="">
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">管理员密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="repassword" value="">
                        </div>
                    </div>


                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">是否启用</label>
                        <div class="col-sm-10">
                            <input type="radio" checked="checked" name="status" value="0">否
                            <input type="radio"  name="status" value="1">是
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w100">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 添加框 end -->


	<!-- 消息提示框 begin -->
	<button id="showmsg" type="button" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#myModal"></button>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
						<?php if($_COOKIE['msgStatus']== 1): ?><b style="color: green;"><i class="glyphicon glyphicon-ok"></i>操作成功</b>
						<?php else: ?>
							<b style="color: red;"><i class="glyphicon glyphicon-remove"></i>操作失败</b><?php endif; ?>
					</h4>
				</div>
				<div class="modal-body tc">
					<?php echo (cookie('msgContent')); ?>
					<?php
 cookie('msgStatus', NULL); cookie('msgContent', NULL); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 消息提示框 end -->

	<!-- loding begin -->
	<div id="loding-bg" style="">
		
	</div>
	<div id="loding-info" style="">
		<p style="">努力加载中...</p>
	</div>
	<!-- loding end -->
	</body>
</html>