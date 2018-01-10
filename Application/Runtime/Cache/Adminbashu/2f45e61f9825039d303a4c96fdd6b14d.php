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
        editor = K.create('textarea[name="i_text1"]', {
            allowFileManager : true
        });
        var editor = K.editor({
            allowFileManager : true
        });
        K('#image1').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    imageUrl : K('#url1').val(),
                    clickFn : function(url, title, width, height, border, align) {
                        K('#url1').val(url);
                      //  alert(url);
                        $('<img style="width:150px;height:150px;" img src="'+url+'"/>').appendTo(".up_box");
                        editor.hideDialog();
                    }
                });
            });
        });
    });
</script>
	<div id="right-content">
		<div class="top">
			<h2>艺术交易 <small>宝墩艺术品</small></h2>
		</div>

		<form action="/Adminbashu/Trade/artwork" method="post">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>设置项</th>
						<th>设置值</th>
					</tr>
				</thead>
				<tr>
					<td width="150">链接地址设置（http://）</td>
					<td>
						<input type="text" name="i_url" class="form-control w400" value="<?php echo ($data['i_url']); ?>"  placeholder="名称设置" >
					</td>
				</tr>
				<tr>
					<td width="150">文章标题</td>
					<td>
						<input type="text" name="i_title1" class="form-control w400" value="<?php echo ($data['i_title1']); ?>"  placeholder="请填入该同事的职位" >
					</td>
				</tr>

                <tr>
                    <td>文章内容</td>
                    <td>
                        <textarea name="i_text1"  class="description_box" style="height: 400px;"><?php echo ($data["i_text1"]); ?></textarea>
                    </td>
                </tr>
				<tr>
					<td>用户照片</td>
					<td>
						<!-- 图片上传 begin -->
						<div class="up_box">
                            <p>
                                <input type="text" readonly name="i_pics" id="url1" value="<?php echo ($data['i_pics']); ?>" />
                                <input type="button" id="image1" value="选择图片" />（网络图片 + 本地上传）
                            </p>
                            <p id="pic1"></p>
							<img src="<?php echo ($data['i_pics']); ?>" alt="" width="150">
						</div>
						<!-- 载入上传文件 -->
<script src="/Public/Common/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" href="/Public/Common/uploadify/uploadify.css">

<!-- 上传配置 -->
<script>
'<?php $timestamp = time();?>';
$(function(){
	$('#file_upload').uploadify({
		'formData'     : {
			'timestamp'	: '<?php echo $timestamp?>',
			'token'     : '<?php echo md5(C("UP_KEY") . $timestamp);?>',
		},
		'swf'      		: '/Public/Common/uploadify/uploadify.swf',
		'uploader' 		: '<?php echo U("Upload/up");?>',
		"buttonText" 	: "上传图片",
		"fileObjName"     : "up",
		"width"           : 120,
		'fileTypeExts'    : '*.jpg; *.png; *.gif; *.jpeg;',
		"onUploadSuccess" : upcallback,
		'onFallback' : function() {
            alert('未检测到兼容版本的Flash.');
        }
	});
})
</script>

						<!-- 图片上传 end -->
					</td>
				</tr>
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