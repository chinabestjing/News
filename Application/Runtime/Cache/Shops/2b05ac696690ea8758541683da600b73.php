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
			<h2>订单管理 <small>订单列表</small></h2>
		</div>

		<ul class="nav nav-tabs mt10">
			<?php if(is_array($orderStatus)): foreach($orderStatus as $k=>$v): ?><li role="presentation" <?php if($status == $k): ?>class="active"<?php endif; ?>>
					<a href="<?php echo U('Order/index',array('status'=>$k));?>"><?php echo ($v); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>

		<form action="" method="post">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th width="160">#</th>
							<th>商品标题</th>
							<th>用户</th>
							<th>单价/购买量</th>
							<th><!--邮费/-->订单价</th>
							<th>订单号/收货地址</th>
							<th>时间</th>
							<th>状态</th>
							<th width="80">操作</th>
						</tr>
					</thead>

					<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
							<td><img src="<?php echo ($v["img"]); ?>_300x200.jpg" style="max-width: 100px;" alt=""></td>
							<td width="200" style="text-overflow:ellipsis;"><?php echo ($v["title"]); ?></td>
							<td>
								<?php echo ($v["nickname"]); ?> <br>
								<?php echo ($v["phone"]); ?>
							</td>

							<td>
								<?php echo ($v["price"]); ?> <br>
								<?php echo ($v["goods_num"]); ?>
							</td>

							<td>
								<!--<?php echo ($v["postage"]); ?> 满<?php echo ($v["m_postage"]); ?>包邮 <br>-->
								<?php echo ($v["order_price"]); ?>
							</td>

							<td>
								<?php echo ($v["order_num"]); ?> <br>
								<?php echo ($v["take_address"]); ?>
							</td>
							<td>
								创建时间： <?php echo (date('Y-m-d H:i:s',$v["createtime"])); ?>
								<br>
								支付时间：
								<?php if($v['paytime'] == 0): ?>----
								<?php else: ?>
									<?php echo (date('Y-m-d H:i:s',$v["paytime"])); endif; ?>
								<br>
								发货时间：
								<?php if($v['sendtime'] == 0): ?>----
								<?php else: ?>
									<?php echo (date('Y-m-d H:i:s',$v["sendtime"])); endif; ?>
								<br>
								收货时间：
								<?php if($v['taketime'] == 0): ?>----
								<?php else: ?>
									<?php echo (date('Y-m-d H:i:s',$v["taketime"])); endif; ?>
							</td>

							<td>
								<?php echo ($orderStatus[$v['status']]); ?>
							</td>

							<td class="handle">
								<?php if($status == 1): ?><a href="<?php echo U('Order/status',array('oid'=>$v['oid'],'status'=>2));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>发货</a><?php endif; ?>
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