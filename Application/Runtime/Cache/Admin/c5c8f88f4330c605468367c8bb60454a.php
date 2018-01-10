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
			<h2>用户管理 <small>修改用户</small></h2>
		</div>

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
					<td width="150">用户名</td>
					<td>
						<input type="text" name="name" class="form-control w400" value="<?php echo ($oldData['username']); ?>"  placeholder="<?php echo ($oldData['username']); ?>" disabled>
					</td>
				</tr>
				<tr>
					<td width="150">邮箱</td>
					<td>
						<input type="text" name="name" class="form-control w400" value="<?php echo ($oldData['email']); ?>"  placeholder="<?php echo ($oldData['email']); ?>" disabled>
					</td>
				</tr>
				<tr>
					<td width="150">手机号</td>
					<td>
						<input type="text" name="name" class="form-control w400" value="<?php echo ($oldData['phone']); ?>"  placeholder="<?php echo ($oldData['phone']); ?>" disabled>
					</td>
				</tr>
				<tr>
					<td width="150">密码</td>
					<td>
						<input type="password" name="password" class="form-control w400" value="" autocomplete="false">
					</td>
				</tr>
				<tr>
					<td>性别</td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="sex" <?php if($oldData['sex'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 女
							</label>
							<label>
								<input type="radio" name="sex" <?php if($oldData['sex'] == 1): ?>checked="checked"<?php endif; ?> value="1"> 男
							</label>
						</div>
					</td>
				</tr>
				
				<tr>
					<td width="150">用户类型</td>
					<td>
						<span class="label label-primary f12">
							<?php if($oldData['type'] == 0): ?>需求用户
							<?php else: ?>
								维修医生<?php endif; ?>
						</span>
						<input type="hidden" name="type" value="<?php echo ($oldData['type']); ?>">
					</td>
				</tr>
				<tr>
					<td>用户状态</td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="status" <?php if($oldData['status'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 未启用
							</label>
							<label>
								<input type="radio" name="status" <?php if($oldData['status'] == 1): ?>checked="checked"<?php endif; ?> value="1"> 正常
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<td>头像</td>
					<td>
						<!-- 图片上传 begin -->
						<input id="file_upload" name="file_upload" type="file" multiple="true">
						<div class="up_box">
							<input type="hidden" name="img" value="<?php echo ($oldData['img']); ?>">
							<img src="<?php echo ($oldData['img']); ?>" alt="" width="150">
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
						<input type="hidden" name="uid" value="<?php echo ($oldData['uid']); ?>">
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
			console.log(data);
			// json字符串转为对象
			var _data = eval('('+data+')');
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