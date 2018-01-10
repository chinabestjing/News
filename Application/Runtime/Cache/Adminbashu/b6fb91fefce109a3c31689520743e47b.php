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
<script>
    //文件上传插件
    KindEditor.ready(function(K) {
        var editor = K.editor({
            allowFileManager : true
        });
        K('#insertfile').click(function() {
            editor.loadPlugin('insertfile', function() {
                editor.plugin.fileDialog({
                    fileUrl : K('#url').val(),
                    clickFn : function(url, title) {
                        K('#url').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });
        editor = K.create('textarea[name="i_text1"]', {
            allowFileManager : true
        });
    });
</script>
	<div id="right-content">
		<div class="top">
			<h2>人力资源 <small>校园招聘</small></h2>
		</div>

		<form action="/Adminbashu/Resource/school" method="post">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>设置项</th>
						<th>设置值</th>
					</tr>
				</thead>
                <tr>
                    <td width="150">标题</td>
                    <td>
                        <input type="text" name="i_title1" class="form-control w400 fl" value="<?php echo ($data['i_title1']); ?>">
                        <b class="fl ml10 mt10" style="color: red;">*</b>
                    </td>
                </tr>
                <tr>
                    <td>内容</td>
                    <td>
                        <div class="col-sm-10">
                            <textarea name="i_text1" style="width:800px;height:400px;visibility:hidden;"><?php echo ($data["i_text1"]); ?></textarea>
                            <p>
                                <input type="button" name="clear" value="清空内容" />
                                <input type="reset" name="reset" value="Reset" />
                            </p>
                            <!-- <script type="text/plain" id="container" name="i_text1" style="width:100%;height:500px;"><?php echo ($data["i_text1"]); ?></script>-->
                        </div>
                    </td>
                </tr>
				<tr>
					<td width="150">文件访问域名设置：（http://）</td>
					<td>
						<input type="text" name="i_url" class="form-control w400" value="<?php echo ($data["i_pic"]["0"]["0"]); ?>"  placeholder="http://www.bashuart.com" ><span style="color: #ff0000">请填对，避免作品不能访问情况</span>
					</td>

				</tr>
                <tr>
                    <td>文件上传1</td>
                    <td>
                        <input type="text" name="url1" id="url" value="<?php echo ($data["i_pic"]["0"]["1"]); ?>"  />
                        <input type="button" id="insertfile" value="选择文件" />
                    </td>
                </tr>
               <!-- <tr>
                    <td>文件上传2</td>
                    <td>
                        <input type="text" name="url2" id="url" value="<?php echo ($data["i_pic"]["1"]["1"]); ?>" />
                        <input type="button" id="insertfile" value="选择文件" />
                    </td>
                </tr>-->
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-primary w100">修改</button>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</div>


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