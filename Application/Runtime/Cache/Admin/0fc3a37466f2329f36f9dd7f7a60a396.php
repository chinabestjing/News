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
<script src="/Public/Common/Chart.min.js"></script>
<div id="right-content">
    <div class="top">
        <h2>资金管理 <small>消费记录</small></h2>
    </div>
    <div class="clearfix mt10">
    	<span class="fl" style="line-height: 33px;">选择月份：</span>
		<form action="" method="get">
			<select name="month" id="" class="fl" style="width: 50px; height: 33px; padding-left: 10px;">
				<?php for($i=1; $i < 13; $i++):?>
					<option value="<?php echo ($i); ?>" <?php if($month == $i): ?>selected="selected"<?php endif; ?>><?php echo ($i); ?></option>
				<?php endfor?>
			</select>
			<input type="submit" class="btn btn-primary w100 ml10" value="查询">
		</form>
    </div>
    
	
    <canvas id="myChart"></canvas>
	<p>本月总计：<b style="color: red;"><?php echo ($total); ?></b> 元</p>
    

</div>

<script>
	$(function(){
		var _width  = $(window).width() - 80;
		var _height = $(window).height() - 300;
		$('#myChart').attr({'width':_width});
		$('#myChart').attr({'height':_height});

		var data = {
			labels : [<?php echo ($x); ?>],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : [<?php echo ($y); ?>]
				}
			]
		}
		var ctx = $("#myChart").get(0).getContext("2d");
		var myNewChart = new Chart(ctx);
		new Chart(ctx).Line(data);
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