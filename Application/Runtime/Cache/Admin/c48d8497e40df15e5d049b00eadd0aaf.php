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
			<h2>用户管理 <small>学生兼职管理</h2>
		</div>

		<ul class="nav nav-tabs mt10">
			<li role="presentation" <?php if($status == 0): ?>class="active"<?php endif; ?>>
				<a href="<?php echo U('User/job',array('status'=>0));?>">待审核</a>
			</li>
			<li role="presentation" <?php if($status == 1): ?>class="active"<?php endif; ?>>
				<a href="<?php echo U('User/job',array('status'=>1));?>">通过</a>
			</li>
			<li role="presentation" <?php if($status == 2): ?>class="active"<?php endif; ?>>
				<a href="<?php echo U('User/job',array('status'=>2));?>">不通过</a>
			</li>
		</ul>

		<form action="" method="post">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th width="20">#</th>
							<th>用户</th>
							<th>性别</th>
							<th>年龄</th>
							<th>注册时间</th>
							<th>真实姓名</th>
							<th>头像</th>
							<th>学生证</th>
							<th>申请时间</th>
							<th>用户状态</th>
							<th width="200">操作</th>
						</tr>
					</thead>

					<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
							<td><img src="<?php echo ($v["img"]); ?>" width="60" height="60" alt="" class="img-circle"></td>
							<td>
								<i><?php echo ($v["nickname"]); ?></i> <br>
								<u><?php echo ($v["phone"]); ?></u>
							</td>
							<td>
								<?php if($v['sex'] == 1): ?>男
								<?php else: ?>
									女<?php endif; ?>
							</td>
							<td>
								<?php if($v['birthday'] > 0): echo date('Y') - date('Y',$v['birthday']); endif; ?>
							</td>
							<td><?php echo (date('Y-m-d H:i:s',$v["regtime"])); ?></td>
							<td><?php echo ($v["real_name"]); ?></td>
							<td><a href="<?php echo ($v["face"]); ?>" target="_blank"><img src="<?php echo ($v["face"]); ?>" style="max-width: 150px;" alt=""></a></td>
							<td><a href="<?php echo ($v["student_card"]); ?>" target="_blank"><img src="<?php echo ($v["student_card"]); ?>" style="max-width: 150px;" alt=""></a></td>
							<td><?php echo (date('Y-m-d H:i:s',$v["apply_time"])); ?></td>
							<td>
								<?php if($v['status'] == 1): ?><span class="label label-success f12">审核通过</span>
								<?php elseif($v['status'] == 0): ?>
									<span class="label label-danger f12">待审核</span>
								<?php elseif($v['status'] == 2): ?>
									<span class="label label-danger f12">审核不通过</span><?php endif; ?>
							</td>
							
							<td class="handle">
								<?php if($v['status'] == 0): ?><a href="<?php echo U('User/job_status',array('uid'=>$v['uid'],'status'=>'1'));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>通过</a>
									<a href="<?php echo U('User/job_status',array('uid'=>$v['uid'],'status'=>'2'));?>" class="del"><i class="glyphicon glyphicon-trash"></i>不通过</a>
								<?php elseif($v['status'] == 1): ?>
									<a href="<?php echo U('User/job_status',array('uid'=>$v['uid'],'status'=>'2'));?>" class="del"><i class="glyphicon glyphicon-trash"></i>不通过</a>
								<?php elseif($v['status'] == 2): ?>
									<a href="<?php echo U('User/job_status',array('uid'=>$v['uid'],'status'=>'1'));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>通过</a><?php endif; ?>
							</td>
						</tr><?php endforeach; endif; ?>
					<tr>
						<td colspan="20" align="right"><?php echo ($page); ?></td>
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