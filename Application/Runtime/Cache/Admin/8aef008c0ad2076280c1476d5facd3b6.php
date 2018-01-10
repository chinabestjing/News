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

		<ul class="nav nav-tabs mt10">
			<li role="presentation" class="active">
				<a href="<?php echo U('Port/index');?>">接口列表</a>
			</li>
			<li role="presentation">
				<a href="<?php echo U('Port/add');?>">添加接口</a>
			</li>
		</ul>

		<form action="" method="post">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>接口名称</th>
							<th>所属分类</th>
							<th>请求地址</th>
							<th>请求方式</th>
							<th>是否需要登录</th>
							<th width="200">操作</th>
						</tr>
					</thead>

					<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
							<td></td>
							<td><?php echo ($v["name"]); ?></td>
							<td><?php echo ($category[$v['cid']]); ?></td>
							<td><?php echo ($v["url"]); ?></td>
							<td><?php echo ($v["method"]); ?></td>
							<td>
								<?php if($v['islogin'] == '否'): ?><i class="glyphicon glyphicon-remove"></i>
	                            <?php else: ?>
	                                <i class="glyphicon glyphicon-ok"></i><?php endif; ?>
							</td>
							<td class="handle">
								<a href="<?php echo U('Port/edit',array('id'=>$v['id']));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>修改</a>
								<a href="javascript:;" class="del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('Port/del', array('id'=>$v['id']));?>'">
									<i class="glyphicon glyphicon-trash"></i>删除
								</a>
							</td>
						</tr><?php endforeach; endif; ?>
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