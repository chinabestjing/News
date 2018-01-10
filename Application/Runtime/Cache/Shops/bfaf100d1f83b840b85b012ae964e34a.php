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
        <h2>人个中心 <small>店铺信息</small></h2>
    </div>
    <form action="<?php echo U('School/setShops');?>" method="post" >
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>设置项</th>
                    <th>设置值</th>
                </tr>
                </thead>
                <tr>
                    <td width="150">店铺名称</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="shop_name" class="form-control w400" placeholder="" value="<?php echo ($shops['shop_name']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">联系电话</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="telephone" class="form-control w400" placeholder="" value="<?php echo ($shops['telephone']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">联系人姓名</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="user_name" class="form-control w400" placeholder="" value="<?php echo ($shops['user_name']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">营业时间</td>
                    <td>
                        <div class="radio">
                            <input type="text" name="shop_hours" class="form-control w400" placeholder="" value="<?php echo ($shops['shop_hours']); ?>" />
                        </div>
                    </td>
                </tr>


                <tr>
                    <td width="150">详情地址</td>
                    <td>
                        <div class="radio">
                            <input type="text" name="detail" class="form-control w400" placeholder="" value="<?php echo ($shops['detail']); ?>" />
                        </div>
                    </td>
                </tr>



                <tr>
                    <td></td>
                    <td>
                        <!-- <input type="hidden" name="_province">
                        <input type="hidden" name="_city">
                        <input type="hidden" name="_county"> -->
                        <button type="submit" class="btn btn-primary w100">保存</button>
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