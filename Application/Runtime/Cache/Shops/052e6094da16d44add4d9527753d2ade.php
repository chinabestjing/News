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
	<!-- 顶部 -->
	<div id="top" class="clearfix2">
		<p class="fl">巴蜀画派-<?php echo ($_SESSION['schoolUser']['school_name']); ?>商城管理中心</p>
		<span class="fr">
            学校所在城市：<?php echo ($_SESSION['schoolUser']['city_name']); ?>
			管理员 : <?php echo ($_SESSION['schoolUser']['username']); ?> |
			<a href="<?php echo U('Login/login_out');?>">[退出登录]</a>
		</span>
	</div>
	<div class="clearfix2">
		<!-- 左侧导航 -->
		<div id="left-menu" class="fl">
			<h2><i class="glyphicon glyphicon-user"></i>个人中心</h2>
	        <p>
                <a href="<?php echo U('School/userInfo');?>" target="iframe">个人信息</a>
              <!--  <a href="<?php echo U('Shops/setShops');?>" target="iframe">店铺设置</a>-->
	        </p>

	        <h2><i class="glyphicon glyphicon-tags"></i>商品管理</h2>
	        <p>
                <?php foreach(C('GOODS_TYPE') as $k => $v):?>
                <a href="<?php echo U('Goods/index',array('status'=>1,'type'=>$k));?>" target="iframe"><?php echo ($v); ?></a>
                <?php endforeach?>
               <!-- <a href="<?php echo U('Goods/add');?>" target="iframe">添加商品</a>-->
	        </p>

	        <h2><i class="glyphicon glyphicon-list-alt"></i>订单管理</h2>
	        <p>
	        	<a href="<?php echo U('Order/index');?>" target="iframe">订单列表</a>
	        </p>

	        <h2><i class="glyphicon glyphicon-usd"></i>资金管理</h2>
	        <p>
	        	<a href="<?php echo U('Funds/consume');?>" target="iframe">收益</a>
                <!--<a href="<?php echo U('Funds/extract_list');?>" target="iframe">提现列表</a>
                <a href="<?php echo U('Funds/extract_records');?>" target="iframe">提现记录</a>-->
	        </p>

            <!--<h2><i class="glyphicon glyphicon-list-alt"></i>优惠券管理</h2>
            <p>
                <a href="<?php echo U('Coupon/index');?>" target="iframe">优惠券列表</a>
            </p>-->

           <!-- <h2><i class="glyphicon glyphicon-list-alt"></i>银行卡管理</h2>
            <p>
                <a href="<?php echo U('Bankcard/binding_bankcard');?>" target="iframe">绑定银行卡</a>
                <a href="<?php echo U('Bankcard/binding_alipay');?>" target="iframe">绑定支付宝</a>
            </p>-->
		</div>

		<div id="content" class="fr">
			<iframe src="<?php echo U('Index/welcome');?>" scrolling="auto" frameborder="0" name="iframe"></iframe>
		</div>
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