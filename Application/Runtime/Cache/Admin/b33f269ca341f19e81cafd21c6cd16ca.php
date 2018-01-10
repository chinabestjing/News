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
                        <?php echo ($data["title"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>门店价格</td>
                    <td>
                        <?php echo ($data["store_price"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>网购价格</td>
                    <td>
                        <?php echo ($data["price"]); ?>
                    </td>
                </tr>
                <tr>
                    <td width="150">活动类型</td>
                    <td>
                       <?php echo ($data["goods_tape"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>活动价</td>
                    <td>
                        <?php echo ($data["activity_price"]); ?>

                    </td>
                </tr>
                <tr>
                    <td>所需积分</td>
                    <td>
                        <?php echo ($data["integral"]); ?>

                    </td>
                </tr>
                <!--<tr>
                    <td>配送价格</td>
                    <td>
                        <?php echo ($data["postage"]); ?>
                    </td>
                </tr>
                <tr>
                    <td>满<span style="color:red;">N</span>元包配送</td>
                    <td>
                        <?php echo ($data["m_postage"]); ?>
                    </td>
                </tr>-->

                <tr>
                    <td>库存</td>
                    <td>
                        <?php echo ($data["stock"]); ?>

                    </td>
                </tr>
                <tr>
                    <td>所属分类</td>
                    <td>
                        <?php echo ($data["caty_name"]); ?>
                    </td>
                </tr>

                <tr>
                    <td>活动时间</td>
                    <td>
                        <?php echo ($data["begin_time"]); ?> - <?php echo ($data["over_time"]); ?>
                    </td>
                </tr>

                <tr>
                    <td>描述</td>
                    <td>
                        <textarea name="description" class="description_box"><?php echo ($data["description"]); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>缩略图</td>
                    <td>
                            <img src="<?php echo ($data["img"]); ?>" alt="" style="max-width: 150px;">

                    </td>
                </tr>
                <td class="handle">
                    <?php if($data['status'] == 0): ?><a href="<?php echo U('Goods/audit',array('status'=>1,'gid'=>$data['gid']));?>" class="edit"><i class="glyphicon glyphicon-ok"></i>通过</a>
                        <a href="<?php echo U('Goods/audit',array('status'=>2,'gid'=>$data['gid']));?>" class="del"><i class="glyphicon glyphicon-remove"></i>拒绝</a><?php endif; ?>

                    <?php if($data['status'] == 1 and $data['is_t'] == 0): ?><a class="edit" href="<?php echo U('Goods/tuijian',array('is_t'=>1,'gid'=>$data['gid'],'type'=>$data['goods_type'],'cid'=>$data['cat_cid']));?>">
                            <i class="glyphicon glyphicon-ok"></i>
                            设为推荐
                        </a><?php endif; ?>

                    <?php if($data['status'] == 1 and $data['is_t'] == 1): ?><a class="del" href="<?php echo U('Goods/tuijian',array('is_t'=>0,'gid'=>$data['gid'],'type'=>$data['goods_type'],'cid'=>$data['cat_cid']));?>">
                            <i class="glyphicon glyphicon-remove"></i>
                            取消推荐
                        </a><?php endif; ?>
                </td>
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