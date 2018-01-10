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
			<h2>系统设置 <small>基本设置</small></h2>
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
					<td width="150">应用状态</td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="app_status" <?php if($webset['app_status'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 关闭
							</label>
							<label>
								<input type="radio" name="app_status" <?php if($webset['app_status'] == 1): ?>checked="checked"<?php endif; ?> value="1"> 开启
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<td width="150">注册状态</td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="reg_status" <?php if($webset['reg_status'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 关闭
							</label>
							<label>
								<input type="radio" name="reg_status" <?php if($webset['reg_status'] == 1): ?>checked="checked"<?php endif; ?> value="1"> 开启
							</label>
						</div>
					</td>
				</tr>

                <tr>
                    <td width="150">签到规则</td>
                    <td>
                        <span class="fl mt10">签到一天得</span>
                        <input type="text" name="sign_rules[]" value="<?php echo ($webset['sign_rules'][0]); ?>" class="form-control w100 fl" style="margin: 0 10px;"/>
                        <span class="fl mt10">&nbsp;积分，连续签到</span>
                        <input type="text" name="sign_rules[]" value="<?php echo ($webset['sign_rules'][1]); ?>" class="form-control w100 fl" style="margin: 0 10px;"/>
                        <span class="fl mt10">&nbsp;天以上，得</span>
                        <input type="text" name="sign_rules[]" value="<?php echo ($webset['sign_rules'][2]); ?>" class="form-control w100 fl" style="margin: 0 10px;"/>
                        <span class="fl mt10">&nbsp;积分</span>
                    </td>
                </tr>

                <tr>
					<td width="150">邀请用户送</td>
					<td>
						<input type="text" class="form-control w300 fl" value="<?php echo ($webset['invite_integral']); ?>" name="invite_integral"><span class="fl ml5 mt10">积分</span>
					</td>
				</tr>

				<tr>
					<td width="150">用户协议</td>
					<td>
						<textarea name="user_protocol"><?php echo ($webset['user_protocol']); ?></textarea>
					</td>
				</tr>
				<tr>
					<td width="150">关于我们</td>
					<td>
						<textarea name="about"><?php echo ($webset['about']); ?></textarea>
					</td>
				</tr>
				

				<!-- 载入上传文件 -->
				<script src="/Public/Common/uploadify/jquery.uploadify.min.js"></script>
				<link rel="stylesheet" href="/Public/Common/uploadify/uploadify.css">

				<tr>
					<td>Android二维码</td>
					<td>
						<input id="file_upload2" name="file_upload2" type="file" multiple="true">
						<div class="android_bao">
							<input type="hidden" name="android_bao" value="<?php echo ($webset['android_bao']); ?>" class="form-control w400">
							<img src="<?php echo ($webset['android_bao']); ?>" alt="" style="max-width: 200px;">
						</div>
					</td>
					<!-- 上传配置 -->
					<script>
						$(function(){
							$('#file_upload2').uploadify({
								'formData'     : {},
								'swf'      		: '/Public/Common/uploadify/uploadify.swf',
								'uploader' 		: '<?php echo U("Upload/up");?>',
								"buttonText" 	: "上传二维码",
								"fileObjName"     : "up",
								"width"           : 120,
								'fileTypeExts'    : '*.jpg; *.png; *.gif; *.jpeg;',
								"onUploadSuccess" : baocallback,
								'onFallback' : function() {
						            alert('未检测到兼容版本的Flash.');
						        }
							});
						})
					</script>
				</tr>

				<tr>
					<td>IOS二维码</td>
					<td>
						<input id="file_upload3" name="file_upload3" type="file" multiple="true">
						<div class="ios_bao">
							<input type="hidden" name="ios_bao" value="<?php echo ($webset['ios_bao']); ?>">
							<img src="<?php echo ($webset['ios_bao']); ?>" alt="" style="max-width: 200px;">
						</div>
					</td>
					<!-- 上传配置 -->
					<script>
						$(function(){
							$('#file_upload3').uploadify({
								'formData'     : {},
								'swf'      		: '/Public/Common/uploadify/uploadify.swf',
								'uploader' 		: '<?php echo U("Upload/up");?>',
								"buttonText" 	: "上传二维码",
								"fileObjName"     : "up",
								"width"           : 120,
								'fileTypeExts'    : '*.jpg; *.png; *.gif; *.jpeg;',
								"onUploadSuccess" : baocallback2,
								'onFallback' : function() {
						            alert('未检测到兼容版本的Flash.');
						        }
							});
						})
					</script>
				</tr>

				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-primary w100">保存</button>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</div>

<script>
function baocallback(file, data){
	// json字符串转为对象
	var _data = eval('('+data+')');
	console.log(_data);
	// 失败提示
	if (_data.status == 0) {
		show_msg(_data.msg, 0);
		return;
	} 
	// 成功提示
	if (_data.status == 1) {
		show_msg(_data.msg, 1);
		$('input[name=android_bao]').val(_data.data.path);
		$('.android_bao img').attr({'src':''+_data.data.path});
	}
}

function baocallback2(file, data){
	// json字符串转为对象
	var _data = eval('('+data+')');
	console.log(_data);
	// 失败提示
	if (_data.status == 0) {
		show_msg(_data.msg, 0);
		return;
	} 
	// 成功提示
	if (_data.status == 1) {
		show_msg(_data.msg, 1);
		$('input[name=ios_bao]').val(_data.data.path);
		$('.ios_bao img').attr({'src':''+_data.data.path});
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