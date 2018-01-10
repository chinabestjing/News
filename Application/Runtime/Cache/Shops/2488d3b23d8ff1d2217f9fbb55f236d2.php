<?php if (!defined('THINK_PATH')) exit(); $_show_msg=show_msg();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo ($_SESSION['schoolUser']['school_name']); ?>管理中心</title>
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
			<h2>商品管理 <small>添加商品</small></h2>
		</div>

		<form action="" method="post" id="goods_add">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>设置项</th>
						<th>设置值</th>
					</tr>
				</thead>
				<tr>
					<td>商品标题</td>
					<td>
						<input type="text" name="title" class="form-control w400 fl">
						<b class="fl ml10 mt10" style="color: red;">*</b>
					</td>
				</tr>
				<tr>
					<td>门店价格</td>
					<td>
						<input type="text" name="store_price" class="form-control w400 fl">
						<b class="fl ml10 mt10" style="color: red;">*</b>
					</td>
				</tr>
				<tr>
					<td>网购价格</td>
					<td>
						<input type="text" name="price" class="form-control w400 fl">
						<b class="fl ml10 mt10" style="color: red;">*</b>
					</td>
				</tr>
                <tr>
                    <td>单位</td>
                    <td>
                        <select name="unit" class="form-control w400">
                            <option value="">请选择单位</option>
                            <option value="台">台</option>
                            <option value="K">K</option>
                            <option value="KG">KG</option>
                            <option value="件">件</option>
                            <option value="盒">盒</option>
                            <option value="台">箱</option>
                            <option value="台">袋</option>
                            <option value="台">瓶</option>
                        </select>

                    </td>
                </tr>
				<tr>
					<td width="150">活动类型</td>
					<td>
						<div class="radio">
							<?php if(is_array($goodsType)): foreach($goodsType as $k=>$v): ?><label>
									<input type="radio" name="goods_type" value="<?php echo ($k); ?>" <?php if($k == 1): ?>checked="checked"<?php endif; ?>> <?php echo ($v); ?>
								</label><?php endforeach; endif; ?>
						</div>
					</td>
				</tr>
				<tr>
					<td>活动价</td>
					<td>
						<input type="text" name="activity_price" value="0" class="form-control w400 fl">
						<b class="fl ml10 mt10" style="color: red;">普通商品和积分商城不需要填写活动价</b>
					</td>
				</tr>
				<tr>
					<td>所需积分</td>
					<td>
						<input type="text" name="integral" value="0" class="form-control w400 fl">
						<b class="fl ml10 mt10" style="color: red;">积分商城商品需填写积分</b>
					</td>
				</tr>
				<tr>
					<td>配送价格</td>
					<td>
						<input type="text" name="postage" value="0" class="form-control w400">
					</td>
				</tr>
				<tr>
					<td>满<span style="color:red;">N</span>元包配送</td>
					<td>
						<input type="text" name="m_postage" value="0" class="form-control w400">
					</td>
				</tr>

				<tr>
					<td>库存</td>
					<td>
						<input type="text" name="stock" value="0" class="form-control w400 fl">
						<b class="fl ml10 mt10" style="color: red;">0为没有库存限制（团购商品请设置库存）</b>
					</td>
				</tr>
				<tr>
					<td>所属分类</td>
					<td>
						<select name="cat_cid" class="form-control w400">
							<?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
						</select>
					</td>
				</tr>

				<tr>
					<td>活动时间</td>
					<td>
						<input type="text" id="J-xl" name="begin_time" class="form-control w200 fl mr10" value="<?=date('Y-m-d 00:00:00', time())?>" />
						<input type="text" id="J-x2" name="over_time" class="form-control w200 fl" value="<?=date('Y-m-d 00:00:00', time() + 60*60*24*10)?>" />
					</td>
				</tr>

				<tr>
					<td>描述</td>
					<td>
						<textarea name="description" class="description_box"></textarea>
					</td>
				</tr>

				<tr>
					<td>缩略图</td>
					<td>
						<p style="color: red; font-weight: bold;">建议尺寸：700x450</p>
						<!-- 图片上传 begin -->
						<input id="file_upload" name="file_upload" type="file" multiple="true">
						<div class="up_box">
							<input type="hidden" name="img" value="">
							<img src="" alt="" style="max-width: 150px;">
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
						<button type="submit" class="btn btn-primary w100">提交</button>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	<link rel="stylesheet" type="text/css" href="/Public/Common/laytime/jquery.datetimepicker.css"/>
	<script type="text/javascript" src="/Public/Common/laytime/jquery.datetimepicker.js"></script>
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
				$('.up_box img').attr({'src':''+_data.data.path+'_300x200.jpg'});
			}
		}
		 //时间选择插件
	    $('#J-xl').datetimepicker();
	    $('#J-xl').datetimepicker({step:10});
	    $('#J-x2').datetimepicker();
	    $('#J-x2').datetimepicker({step:10});

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