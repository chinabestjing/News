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
			<h2>接口管理 <small>接口管理</small></h2>
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
					<td width="150">接口名称</td>
					<td>
						<div class="radio">
							<input type="text" name="name" class="form-control w400" placeholder="" value="<?php echo ($oldData['name']); ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td width="150">所属分类</td>
					<td>
						<select name="cid" class="form-control w400">
							<?php if(is_array($category)): foreach($category as $k=>$v): ?><option value="<?php echo ($k); ?>" <?php if($k == $oldData['cid']): ?>selected="selected"<?php endif; ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>请求地址</td>
					<td>
						<input type="text" name="url" class="form-control w400" placeholder="" value="<?php echo ($oldData['url']); ?>">
					</td>
				</tr>

				<tr>
					<td>请求方式</td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="method" value="get" <?php if($oldData['method'] == 'get'): ?>checked="checked"<?php endif; ?>> GET
							</label>
							<label>
								<input type="radio" name="method" value="post" <?php if($oldData['method'] == 'post'): ?>checked="checked"<?php endif; ?>> POST
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<td>需要登录</td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="islogin" value="否" <?php if($oldData['islogin'] == '否'): ?>checked="checked"<?php endif; ?>> 否
							</label>
							<label>
								<input type="radio" name="islogin" value="是" <?php if($oldData['islogin'] == '是'): ?>checked="checked"<?php endif; ?>> 是
							</label>
						</div>
					</td>
				</tr>
				
				<tr>
					<td>请求参数</td>
					<td class="parambox">

						<?php if(is_array($oldData["param"])): foreach($oldData["param"] as $key=>$v): ?><div class="param clearfix mt10" style="">
								<div class="fl mr10">
									<label for="">名称</label><input type="text" name="param[name][]" class="form-control w200" value="<?php echo ($v["name"]); ?>">
								</div>

								<div class="fl mr10">
									<label for="">类型</label>
									<select name="param[type][]" class="form-control">
										<option value="String" <?php if($v["type"] == 'String'): ?>selected="selected"<?php endif; ?>>String</option>
										<option value="Int" <?php if($v["type"] == 'Int'): ?>selected="selected"<?php endif; ?>>Int</option>
									</select>
								</div>

								<div class="fl mr10">
									<label for="">是否必须</label>
									<select name="param[must][]" class="form-control">
										<option value="Yes" <?php if($v["must"] == 'Yes'): ?>selected="selected"<?php endif; ?>>Yes</option>
										<option value="No" <?php if($v["must"] == 'No'): ?>selected="selected"<?php endif; ?>>No</option>
									</select>
								</div>
								<div class="fl mr10">
									<label for="">示例值</label><input type="text" name="param[value][]" value="<?php echo ($v["value"]); ?>" class="form-control w200">
								</div>
								<div class="fl mr10">
									<label for="">描述</label><input type="text" name="param[msg][]" class="form-control w400" value="<?php echo ($v["msg"]); ?>">
								</div>
								<div class="fl mr10">
									<button type="button" class="btn btn-danger delparam" style="margin-top: 17px;">删除参数</button>
								</div>
							</div><?php endforeach; endif; ?>

					</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="10"><button type="button" class="btn btn-info addparam">增加参数</button></td>
				</tr>
				<tr>
					<td>加密参数顺序</td>
					<td>
						<div class="radio">
							<input type="text" name="sort" class="form-control w500" value="<?php echo ($oldData["sort"]); ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td>返回值示例</td>
					<td>
						<div class="radio">
							<textarea name="return"><?php echo ($oldData["return"]); ?></textarea>
						</div>
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?php echo ($oldData["id"]); ?>">
						<button type="submit" class="btn btn-primary w100">保存</button>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	
	<div class="paramcl param clearfix mt10" style="display: none;">
		<div class="fl mr10">
			<label for="">名称</label><input type="text" name="param[name][]" class="form-control w200">
		</div>
		<div class="fl mr10">
			<label for="">类型</label>
			<select name="param[type][]" class="form-control">
				<option value="String">String</option>
				<option value="Int">Int</option>
			</select>
		</div>
		<div class="fl mr10">
			<label for="">是否必须</label>
			<select name="param[must][]" class="form-control">
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</div>
		<div class="fl mr10">
			<label for="">示例值</label><input type="text" name="param[value][]" class="form-control w200">
		</div>
		<div class="fl mr10">
			<label for="">描述</label><input type="text" name="param[msg][]" class="form-control w400">
		</div>
		<div class="fl mr10">
			<button type="button" class="btn btn-danger delparam" style="margin-top: 17px; display: none;">删除参数</button>
		</div>
	</div>

	<script>
		$(function(){
			// 增加参数
			$('.addparam').click(function(){
				var _clone = $('.paramcl').clone();
				_clone.removeClass('paramcl').css({'display':'block'}).find('.delparam').css({'display':'block'});
				$('.parambox').append(_clone);
				// 删除参数
				$('.delparam').click(function(){
					$(this).parents('.param').remove();
				})
			})

			// 删除参数
			$('.delparam').click(function(){
				$(this).parents('.param').remove();
			})
		})
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