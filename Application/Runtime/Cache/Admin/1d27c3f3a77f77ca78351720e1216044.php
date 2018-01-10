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
			<h2>商品管理 <small>单位列表</small></h2>
		</div>


		<form action="" method="post">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>num</th>
							<th>单位名</th>
							<th>添加时间</th>
							<th width="150">操作</th>
						</tr>
					</thead>

					<?php if(is_array($unit)): $i = 0; $__LIST__ = $unit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$unit): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($i); ?></td>
                            <td><?php echo ($unit["u_name"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$unit["u_time"])); ?></td>
							<td class="handle">
                                <a href="<?php echo U('Goods/unitDel',array('u_id'=>$unit['u_id']));?>" class="del"><i class="glyphicon glyphicon-trash"></i>删除</a>
                            </td>
                            <!--<td class="handle">
									<a href="<?php echo U('Goods/edit',array('gid'=>$v['gid']));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>修改</a>
									<a href="javascript:;" class="del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('Goods/del', array('gid'=>$v['gid']));?>'">
										<i class="glyphicon glyphicon-trash"></i>删除
									</a>
							</td>-->
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr>
						<td colspan="20" align="right"><span style="color: green;"><?php echo ($page); ?></span></td>
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