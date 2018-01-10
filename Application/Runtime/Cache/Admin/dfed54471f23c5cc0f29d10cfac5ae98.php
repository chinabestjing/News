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
    </head>
    <body>
    <?php echo $_show_msg;?>
	<div id="right-content">
		<div class="top">
			<h2>商品管理 <small>商品分类</small></h2>
		</div>

		<ul class="nav nav-tabs mt10">
			<li role="presentation" class="active">
				<a href="javascript:;">修改分类</a>
			</li>
		</ul>

		<form action="" method="post">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>设置项</th>
						<th>设置值</th>
					</tr>
				</thead>
				<tr>
					<td width="150">分类名称</td>
					<td>
						<input type="text" name="name" maxlength="4" class="form-control w400" value="<?php echo ($oldData['name']); ?>">
					</td>
				</tr>
				<tr>
					<td>排序</td>
					<td>
						<input type="text" name="sort" class="form-control w400" value="<?php echo ($oldData['sort']); ?>">
					</td>
				</tr>
				<tr>
					<td>显示</td>
					<td>
						<label>
							<input type="radio" name="is_top" value="0" <?php if($oldData['is_top'] == 0): ?>checked="checked"<?php endif; ?>> 否
						</label>
						<label>
							<input type="radio" name="is_top" value="1" <?php if($oldData['is_top'] == 1): ?>checked="checked"<?php endif; ?>> 是
						</label>
					</td>
				</tr>
				<tr>
					<td>图片</td>
					<td>
						<!-- 图片上传 begin -->
						<input id="file_upload" name="file_upload" type="file" multiple="true">
						<div class="up_box">
							<input type="hidden" name="img" value="<?php echo ($oldData['img']); ?>">
							<img src="<?php echo ($oldData['img']); ?>" alt="" style="max-width: 150px;">
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
						<input type="hidden" name="cid" value="<?php echo ($oldData['cid']); ?>">
						<button type="submit" class="btn btn-primary w100">修改</button>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	<script>
		// 图片上传回调方法
		function upcallback(file, data){
			// json字符串转为对象
			var _data = eval('('+data+')');
			console.log(_data.state);
			// 失败提示
			if (_data.status == 0) {
				show_msg(_data.msg, 0);
				return;
			} 
			// 成功提示
			if (_data.status == 1) {
				show_msg(_data.msg, 1);
				$('input[name=img]').val(_data.data.path);
				$('.up_box img').attr({'src':''+_data.data.path});
			}
		}
	</script>


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