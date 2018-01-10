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
			<h2>商品管理 <small>商品列表</small></h2>
		</div>
			<?php if($type == 1): ?><ul class="nav nav-tabs mt10">
					<li role="presentation" <?php if($cid == 0): ?>class="active"<?php endif; ?>>
						<a href="<?php echo U('Goods/index',array('type'=>$type,'status'=>$status,'cid'=>0,'is_t'=>$is_t));?>">全部分类</a>
					</li>
					<?php if(is_array($category)): foreach($category as $key=>$v): ?><li role="presentation" <?php if($cid == $v['cid']): ?>class="active"<?php endif; ?>>
							<a href="<?php echo U('Goods/index',array('type'=>$type,'status'=>$status,'cid'=>$v['cid'],'is_t'=>$is_t));?>"><?php echo ($v["name"]); ?></a>
						</li><?php endforeach; endif; ?>
				</ul><?php endif; ?>

			<ul class="nav nav-tabs mt10">
				<!--<li role="presentation" <?php if($status == 0): ?>class="active"<?php endif; ?>>
					<a href="<?php echo U('Goods/index',array('cid'=>$cid,'type'=>$type,'status'=>0));?>">待审核</a>
				</li>-->
				<li role="presentation" <?php if($status == 1 and $is_t != 1): ?>class="active"<?php endif; ?>>
					<a href="<?php echo U('Goods/index',array('cid'=>$cid,'type'=>$type,'status'=>1));?>">商品列表</a>
				</li>
				<!--<li role="presentation" <?php if($status == 2): ?>class="active"<?php endif; ?>>
					<a href="<?php echo U('Goods/index',array('cid'=>$cid,'type'=>$type,'status'=>2));?>">审核失败</a>
				</li>-->
				<li role="presentation" <?php if($is_t == 1): ?>class="active"<?php endif; ?>>
					<a href="<?php echo U('Goods/index',array('cid'=>$cid,'type'=>$type,'status'=>1,'is_t'=>1));?>">推荐商品</a>
				</li>

				<div class="fr clearfix">
					<form action="" method="post">
						<input type="text" name="search" class="form-control w200 fl" value="<?php echo ($search); ?>" placeholder="商品名称">
						<button type="submit" class="fl btn btn-primary">搜索</button>
					</form>
				</div>
			</ul>

		<form action="" method="post">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th width="160">#</th>
							<!--<th>商家</th>-->
							<th>商品名称</th>
							<th>单价</th>

							<?php if($type == 2): ?><th>所需积分</th><?php endif; ?>
							<?php if($type == 3): ?><th>预售价</th><?php endif; ?>
							<?php if($type == 4): ?><th>活动价</th><?php endif; ?>
							
						<!--	<th>邮费</th>-->
							<th>库存<b>/</b>销量</th>

							<th>分类</th>
							<th>活动时间</th>
							<th>查看详情</th>
							<th width="150">操作</th>
						</tr>
					</thead>

					<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
							<td><img src="<?php echo ($v["img"]); ?>" style="max-width: 100px;" alt=""></td>
							<!--<td>
								<?php echo ($v["nickname"]); ?> <br>
								<?php echo ($v["phone"]); ?>
							</td>-->
							<td width="200"><?php echo ($v["title"]); ?></td>
							<td><?php echo ($v["price"]); ?></td>

							<?php if($type == 2): ?><td><?php echo ($v["integral"]); ?></td><?php endif; ?>
							<?php if($type == 3): ?><td><?php echo ($v["activity_price"]); ?></td><?php endif; ?>
							<?php if($type == 4): ?><td><?php echo ($v["activity_price"]); ?></td><?php endif; ?>

							<!--<td>
                                <?php if($v["postage"] == 0): ?>包邮
                                    <?php elseif($v["postage"] != 0 AND $v["m_postage"] == 0): ?>
                                    <?php echo ($v["postage"]); ?>
                                    <?php elseif($v["postage"] != 0 AND $v["m_postage"] != 0): ?>
                                    <?php echo ($v["postage"]); ?><br />
                                    满<?php echo ($v["m_postage"]); ?>元包邮<?php endif; ?>
							</td>-->

							<td>
								<?php if($v['stock'] == 0): ?>无限
								<?php else: ?>
									<?php echo ($v["stock"]); endif; ?>
								<b>/ </b><?php echo ($v["buy_num"]); ?>
							</td>

							<td><?php echo ($category[$v['cat_cid']]['name']); ?></td>
							<td>
								开始：<?php echo (date('Y-m-d H:i:s',$v["begin_time"])); ?> <br>
								结束：<?php echo (date('Y-m-d H:i:s',$v["over_time"])); ?> 
							</td>
							<td><a href="<?php echo U('Goods/goodsInfo',array('gid'=>$v['gid']));?>">查看</a></td>
							<td class="handle">
								<?php if($v['status'] == 0): ?><a href="<?php echo U('Goods/audit',array('status'=>1,'gid'=>$v['gid']));?>" class="edit"><i class="glyphicon glyphicon-ok"></i>通过</a>
									<a href="<?php echo U('Goods/audit',array('status'=>2,'gid'=>$v['gid']));?>" class="del"><i class="glyphicon glyphicon-remove"></i>拒绝</a><?php endif; ?>

								<?php if($v['status'] == 1 and $type == 1 and $v['is_t'] == 0): ?><a class="edit" href="<?php echo U('Goods/tuijian',array('is_t'=>1,'gid'=>$v['gid'],'type'=>$type,'cid'=>$cid));?>">
										<i class="glyphicon glyphicon-ok"></i>
										设为推荐
									</a><?php endif; ?>

								<?php if($v['status'] == 1 and $type == 1 and $v['is_t'] == 1): ?><a class="del" href="<?php echo U('Goods/tuijian',array('is_t'=>0,'gid'=>$v['gid'],'type'=>$type,'cid'=>$cid));?>">
										<i class="glyphicon glyphicon-remove"></i>
										取消推荐
									</a><?php endif; ?>
                                <a href="<?php echo U('Goods/edit',array('gid'=>$v['gid'],'type'=>$type));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>修改</a>
                                <a href="javascript:;" class="del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('Goods/del', array('gid'=>$v['gid']));?>'">
                                    <i class="glyphicon glyphicon-trash"></i>删除
                                </a>
							</td>
                            <!--<td class="handle">
									<a href="<?php echo U('Goods/edit',array('gid'=>$v['gid']));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>修改</a>
									<a href="javascript:;" class="del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('Goods/del', array('gid'=>$v['gid']));?>'">
										<i class="glyphicon glyphicon-trash"></i>删除
									</a>
							</td>-->
						</tr>
						<?php if($status == 2): ?><tr style="background: #FFFFCC;">
								<td>失败原因：</td>
								<td colspan="20"><?php echo ($v["error"]); ?></td>
							</tr><?php endif; endforeach; endif; ?>
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