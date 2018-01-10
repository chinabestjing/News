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
    <ul class="nav nav-tabs mt10">
        <!-- <li role="presentation" class="active">
            <a href="<?php echo U('Category/index');?>">分类列表</a>
        </li> -->
        <li role="presentation">
            <a href="#" data-toggle="modal" data-target="#addBox">修改密码</a>
        </li>
    </ul>
    <div><!-- class="modal-content"-->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-pencil mr5"></i>修改密码
            </h4>
        </div>
        <form action="" method="post" class="form-horizontal">
            <div class="modal-body clearfix">
                <div class="form-group clearfix mt10">
                    <label class="col-sm-2 control-label">旧密码</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="oldPassword" value="">
                    </div>
                </div>

                <div class="form-group clearfix mt10">
                    <label class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>

                <div class="form-group clearfix mt10">
                    <label class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="repassword" value="">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="submit" class="btn btn-primary w100">提交</button>
            </div>
        </form>
    </div>
</div>
    <!--<form action="<?php echo U('School/userInfo');?>" method="post" >
        <div class="table-responsive">
            <table class="table table-hover">

                <tr>
                    <td width="150">用户昵称</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="nickname" class="form-control w400" placeholder="" value="<?php echo ($data['nickname']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">生日</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="birthday" class="form-control w400" placeholder="" value="<?php echo (date('Y-m-d',$data['birthday'])); ?>" />
                            格式为：0000-00-00
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">性别</td>
                    <td>

                            <input type="radio"  name="sex" value="1" <?php if(($data["sex"]) == "1"): ?>checked<?php endif; ?> />男
                            <input type="radio"  name="sex" value="0" <?php if(($data["sex"]) == "0"): ?>checked<?php endif; ?> />女
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        &lt;!&ndash; <input type="hidden" name="_province">
                        <input type="hidden" name="_city">
                        <input type="hidden" name="_county"> &ndash;&gt;
                        <button type="submit" class="btn btn-primary w100">保存</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>-->
</div>

<!-- 添加框 begin -->
<!--<div class="modal fade" id="addBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="glyphicon glyphicon-pencil mr5"></i>修改密码
                </h4>
            </div>
            <form action="" method="post" class="form-horizontal">
                <div class="modal-body clearfix">
                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">旧密码</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="oldPassword" value="">
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">新密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="repassword" value="">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="submit" class="btn btn-primary w100">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>-->
<!-- 添加框 end -->



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
    $('#submit').click(function(){
        var oldPassword = $('input[name=oldPassword]').val();
        var password    = $('input[name=password]').val();
        var repassword  = $('input[name=repassword]').val();
        $.post("<?php echo U('School/editPassword');?>",
                {oldPassword:oldPassword,password:password,repassword:repassword},
                function(data){
                    var data1 = eval("("+data+")");
                    if(data1.status==1){
                        show_msg(data1.msg);
                       window.location.reload();
                    }else{
                        show_msg(data1.msg);
                    }
        })
    })
</script>