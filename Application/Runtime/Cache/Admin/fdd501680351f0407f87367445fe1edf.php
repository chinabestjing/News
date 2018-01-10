<?php if (!defined('THINK_PATH')) exit();?>
<?php $_show_msg=show_msg();?>
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
    <div class="right-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-pencil mr5"></i>添加学校
            </h4>
        </div>
        <form action="" method="post" class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo ($_data["id"]); ?>" />
            <div class="modal-body clearfix">
                <div class="form-group clearfix mt10">
                    <label class="col-sm-2 control-label">选择地区</label>
                    <div class="col-sm-10">
                        <select name="city_id" class="form-control w200">
                            <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["city_id"]); ?>" <?php if(($vo["city_id"]) == $_data["city_id"]): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group clearfix mt10">
                    <label class="col-sm-2 control-label">学校名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control w200" name="name" value="<?php echo ($_data["name"]); ?>">
                    </div>
                </div>

                <div class="form-group clearfix mt10">
                    <label class="col-sm-2 control-label">学校地址</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control w200" name="addess" value="<?php echo ($_data["addess"]); ?>">
                    </div>
                </div>
                <div class="form-group clearfix mt10">
                    <label class="col-sm-2 control-label">密码管理</label>
                    <div class="col-sm-10">
                        <button type="button" id="newPassword" class="btn btn-primary w100">重置密码</button>
                        <span style="color: #ff0000">(重置密码后，默认密码为123456)</span>
                    </div>
                </div>


                <!--<div class="form-group clearfix mt10">-->
                <!--<label class="col-sm-2 control-label">是否启用</label>-->
                <!--<div class="col-sm-10">-->
                <!--<input type="radio" checked="checked" name="status" value="0">否-->
                <!--<input type="radio"  name="status" value="1">是-->
                <!--</div>-->
                <!--</div>-->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w100">提交</button>
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
    $('.close').click(function(){
        window.location.href="<?php echo U('School/index');?>"
    })
    $('#newPassword').click(function(){
        var statu = confirm("确定要重置密码吗？");
        if(!statu){
            return false;
        }
        var id = $('input[name=id]').val();
        $.post("<?php echo U('User/newPassword');?>",{id:id},function(data){
            var data1 = eval("("+data+")");
            //console.info(data1);
            if(data1.status==1){
                show_msg(data1.msg,1);
            }else{
                show_msg(data1.msg,0);
            }
        })
    })
</script>