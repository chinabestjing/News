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
			<h2>订单管理 <small>订单列表</small></h2>
		</div>

		<!-- 筛选 -->
        <form action="/index.php/Admin/Order/index" method="get">
		<div class="mt10 clearfix">
            <select name="sid" class="form-control w400">
                <option >校区筛选</option>
                <?php if(is_array($school)): $i = 0; $__LIST__ = $school;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$school): $mod = ($i % 2 );++$i;?><option value="<?php echo ($school["id"]); ?>" <?php if($sid == $school['id']): ?>selected="selected"<?php endif; ?>><?php echo ($school["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
			<!--&lt;!&ndash;<p class="fl" style="width: 60px; height: 30px; line-height: 30px; font-weight: bold; font-size: 14px;">校区筛选</p>
			<div class="btn-group fl mr10">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php if($province_id == 0): ?>全部
					<?php else: ?>
						<?php echo ($province[$province_id]['name']); endif; ?>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" style="max-height: 400px; overflow-y:scroll;">
					<li><a href="<?php echo U('Order/index',array('status'=>$status));?>">全部</a></li>
					<?php if(is_array($province)): foreach($province as $key=>$v): ?><li><a href="<?php echo U('Order/index',array('status'=>$status,'province_id'=>$v['province_id']));?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
				</ul>&ndash;&gt;
        </div>-->
            <br/>
            <button type="submit" class="btn">提交</button>
            </div>
        </form>
			
			<?php if($province_id > 0): ?><div class="btn-group fl mr10">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php if($city_id == 0): ?>全部
						<?php else: ?>
							<?php echo ($city[$city_id]['name']); endif; ?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" style="max-height: 400px; overflow-y:scroll;">
						<li><a href="<?php echo U('Order/index',array('status'=>$status,'province_id'=>$province_id));?>">全部</a></li>
						<?php if(is_array($city)): foreach($city as $key=>$v): ?><li><a href="<?php echo U('Order/index',array('status'=>$status,'province_id'=>$province_id,'city_id'=>$v['city_id']));?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
			
			<?php if($city_id > 0): ?><div class="btn-group fl mr10">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php if($county_id == 0): ?>全部
						<?php else: ?>
							<?php echo ($county[$county_id]['name']); endif; ?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" style="max-height: 400px; overflow-y:scroll;">
						<li><a href="<?php echo U('Order/index',array('status'=>$status,'province_id'=>$province_id,'city_id'=>$city_id));?>">全部</a></li>
						<?php if(is_array($county)): foreach($county as $key=>$v): ?><li><a href="<?php echo U('Order/index',array('status'=>$status,'province_id'=>$province_id,'city_id'=>$city_id,'county_id'=>$v['county_id']));?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>

			<?php if($county_id > 0): ?><div class="btn-group fl mr10">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php if($shops_uid == 0): ?>全部
						<?php else: ?>
							<?php echo ($shops[$shops_uid]['company']); endif; ?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" style="max-height: 400px; overflow-y:scroll;">
						<li><a href="<?php echo U('Order/index',array('status'=>$status,'province_id'=>$province_id,'city_id'=>$city_id,'county_id'=>$county_id));?>">全部</a></li>
						<?php if(is_array($shops)): foreach($shops as $key=>$v): ?><li><a href="<?php echo U('Order/index',array('status'=>$status,'province_id'=>$province_id,'city_id'=>$city_id,'county_id'=>$county_id,'shops_uid'=>$v['uid']));?>"><?php echo ($v["company"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
		</div>


		<ul class="nav nav-tabs mt10">
			<?php if(is_array($orderStatus)): foreach($orderStatus as $k=>$v): ?><li role="presentation" <?php if($status == $k): ?>class="active"<?php endif; ?>>
					<a href="<?php echo U('Order/index',array('status'=>$k,'province_id'=>$province_id,'city_id'=>$city_id,'county_id'=>$county_id,'shops_uid'=>$uid));?>"><?php echo ($v); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>

		<form action="" method="post">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th width="160">#</th>
							<th>商品标题</th>
							<th>商家</th>
                         <!--   <th>所属校区</th>-->
							<th>用户</th>
							<th>单价/购买量</th>
						<!--	<th>邮费/订单价</th>-->
							<th>订单号/收货地址</th>
							<th>时间</th>
							<th>支付方式</th>
							<th>状态</th>
							<th width="80">操作</th>
						</tr>
					</thead>

					<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
							<td><img src="<?php echo ($v["img"]); ?>_300x200.jpg" style="max-width: 100px;" alt=""></td>
							<td width="200"><?php echo ($v["title"]); ?></td>
							<td>
								<?php echo ($v["s_name"]); ?> <br>
								<?php echo ($v["s_phone"]); ?>
							</td>
                         <!--   <td><?php echo ($v["name"]); ?></td>-->
							<td>
								<?php echo ($v["nickname"]); ?> <br>
								<?php echo ($v["phone"]); ?>
							</td>

							<td>
								<?php echo ($v["price"]); ?> <br>
								<?php echo ($v["goods_num"]); ?>
							</td>

							<!--<td>
								<?php echo ($v["postage"]); ?> 满<?php echo ($v["m_postage"]); ?>包邮 <br>
							</td>-->

							<td>
								<?php echo ($v["order_num"]); ?> <br>
								<?php echo ($v["take_address"]); ?>
							</td>
							<td>
								创建时间：<?php echo (date('Y-m-d H:i:s',$v["createtime"])); ?>
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
								<?php if($v['paymethod'] == 'alipay'): ?>支付宝
								<?php elseif($v['paymethod'] == 'wx'): ?>
									微信
								<?php elseif($v['paymethod'] == 'upacp'): ?>
									网银<?php endif; ?>
								<br>
							</td>

							<td>
								<?php echo ($orderStatus[$v['status']]); ?>
							</td>

							<td class="handle">
								
							</td>
						</tr><?php endforeach; endif; ?>
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