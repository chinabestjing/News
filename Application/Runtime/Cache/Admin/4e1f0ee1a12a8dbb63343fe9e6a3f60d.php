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
<script src="/Public/js/jquery.toggle-password.min.js"></script>
<div id="right-content">
    <div class="top">
        <h2>学校管理 <small>添加管理员</small></h2>
    </div>

    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>设置项</th>
                    <th>设置值</th>
                </tr>
                </thead>
                <tr>
                    <td width="150">手机号</td>
                    <td>
                        <input type="text" name="phone" class="form-control w400" value="" >
                    </td>
                </tr>
                <tr>
                    <td width="150">密码</td>
                    <td>
                        <input type="password" id="password" name="password" class="form-control w400" value="" autocomplete="false">
                        <input type="checkbox" id="togglePassword"><label for="togglePassword">显示密码</label>
                    </td>
                </tr>
                <!--<tr>
                    <td width="150">确认密码</td>
                    <td>
                        <input type="password" name="repassword" class="form-control w400" value="" autocomplete="false">
                    </td>
                </tr>-->
                <tr>
                    <td>性别</td>
                    <td>
                        <div class="radio">
                            <label>
                                <input type="radio" name="sex"  value="0"> 女
                            </label>
                            <label>
                                <input type="radio" name="sex" value="1"> 男
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>用户状态</td>
                    <td>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status"  value="0"> 未启用
                            </label>
                            <label>
                                <input type="radio" name="status"  value="1"> 正常
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
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
<script type="text/javascript">
    $(function(){
        $('#password').togglePassword({
            el: '#togglePassword'
        });
    });
</script>