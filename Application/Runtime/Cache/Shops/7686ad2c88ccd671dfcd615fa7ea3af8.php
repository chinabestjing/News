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
        <h2>优惠券管理</h2>
    </div>
    <ul class="nav nav-tabs mt10">
        <li role="presentation" class="active">
            <a href="<?php echo U('Coupon/index');?>">优惠券列表</a>
        </li>
        <li role="presentation">
            <a href="#" data-toggle="modal" data-target="#addBox">添加优惠券</a>
        </li>
    </ul>

    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>标题</th>
                    <th>优惠类型</th>
                    <th>发放数量</th>
                    <th>发放条件</th>
                    <th>到期时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>

                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v["title"]); ?></td>
                        <td>
                            <?php switch($v["quota"]): case "0": ?>满<?php echo ($v["amount"]["0"]); ?>元，减<?php echo ($v["amount"]["1"]); ?>元<?php break;?>
                                <?php default: ?>直免<?php echo ($v["quota"]); ?>元<?php endswitch;?>
                        </td>
                        <td><?php echo ($v["coupon_num"]); ?></td>
                        <td>
                            <?php switch($v["condition"]): case "1": ?>用户在5星好评后发放<?php break; endswitch;?>
                        </td>
                        <td><?php echo (date('Y-m-d H:i:s',$v["end_time"])); ?></td>
                        <td>
                            <?php switch($v["status"]): case "0": ?>未启用<?php break;?>
                                <?php case "1": ?>已启用<?php break;?>
                                <?php case "2": ?>已过期<?php break; endswitch;?>
                        </td>
                        <td>
                            <?php if($v['status'] == 0): ?><a href="javascript:;" onclick="if(confirm('启用后不能进行修改删除操作，确定启用吗？')) location.href='<?php echo U('Coupon/enable', array('id'=>$v['id'],'status'=>1));?>'"><i class="glyphicon glyphicon-ok"></i>启用</a>
                                <?php else: ?>
                                <a href="javascript:;" onclick="if(confirm('确定停用吗？')) location.href='<?php echo U('Coupon/enable', array('id'=>$v['id']));?>'"><i class="glyphicon glyphicon-no"></i>停用</a><?php endif; ?>
                            <a href="<?php echo U('Coupon/edit_coupon',array('id'=>$v['id']));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>修改</a>
                            <a href="javascript:;" class="del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('Coupon/del_coupon', array('id'=>$v['id']));?>'">
                                <i class="glyphicon glyphicon-trash"></i>删除
                            </a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="20" align="right"><?php echo ($page); ?></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<!-- 添加框 begin -->
<div class="modal fade" id="addBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="glyphicon glyphicon-pencil mr5"></i>添加优惠券
                </h4>
            </div>
            <form action="<?php echo U('Coupon/add_coupon');?>" method="post" class="form-horizontal">
                <div class="modal-body clearfix">
                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input type="text" name="title"  class="form-control"  value="">
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">优惠券类型(二选一)</label>
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                               <span class="fl mt10">1. 直免</span>
                               <input type="text" name="quota" class="form-control w100 fl" style="margin: 0 10px;"  value="">
                               <span class="fl mt10">元</span>
                            </div>
                            <div class="col-sm-10" style="margin-top:10px;">
                                <span class="fl mt10">2. 满&nbsp;&nbsp;&nbsp;</span>
                                <input type="text" name="amount1" value="" class="form-control w100 fl" style="margin: 0 10px;">
                                <span class="fl mt10">元，减 </span>
                                <input type="text" name="amount2" value="" class="form-control w100 fl" style="margin: 0 10px;">
                                <span class="fl mt10">元</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">发放数量</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="coupon_num" value="">
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">发放条件</label>
                        <div class="col-sm-10">
                            <select name="condition" class="form-control w200">
                                <option value="1">用户在5星好评后发放</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">到期时间</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="end_time" id="datetimepicker" ><br />
                            <span style="color:red;"> 启用后优惠券未到期不能删除修改</span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w100">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 添加框 end -->
<link rel="stylesheet" type="text/css" href="/Public/Common/laytime/jquery.datetimepicker.css"/>
<script src="/Public/Common/laytime/jquery.js"></script>
<script src="/Public/Common/laytime/jquery.datetimepicker.js"></script>
<script>
    $('#datetimepicker').datetimepicker();
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