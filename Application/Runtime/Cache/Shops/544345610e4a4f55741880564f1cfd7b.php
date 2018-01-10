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
        <h2>资金管理</h2>
    </div>
    <ul class="nav nav-tabs mt10">
        <li role="presentation" class="active">
            <a href="<?php echo U('Funds/extract_list');?>">提现列表</a>
        </li>
        <li role="presentation">
            <a href="#" data-toggle="modal" data-target="#addBox">提现</a>
        </li>
    </ul>

    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>提现金额</th>
                    <th>提现类型</th>
                    <th>账户信息</th>
                    <th>申请时间</th>
                    <th>操作</th>
                </tr>
                </thead>

                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v["nickname"]); ?></td>
                        <td><?php echo ($v["money"]); ?></td>
                        <td>
                            <?php switch($v["wit_type"]): case "1": ?>支付宝<?php break;?>
                                <?php case "2": ?>银行卡<?php break; endswitch;?>
                        </td>
                        <td>
                            <?php switch($v["wit_type"]): case "1": echo ($v["alipay_name"]); ?><br/><?php echo ($v["alipay"]); break;?>
                                <?php case "2": echo ($v["bank_name"]); ?><br/><?php echo ($v["bank_card"]); break; endswitch;?>
                        </td>
                        <td><?php echo (date('Y-m-d H:i:s',$v["create_time"])); ?></td>
                        <td>
                            <a href="<?php echo U('Funds/del_extract',array('id'=>$v['id'],'uid'=>$v['user_uid'],'money'=>$v['money']));?>" class="del"><i class="glyphicon glyphicon-remove"></i>取消提现</a>
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
                    <i class="glyphicon glyphicon-pencil mr5"></i>提现
                </h4>
            </div>
            <form action="<?php echo U('Funds/extract_index');?>" method="post" class="form-horizontal">
                <input type="hidden" name="uid" value="<?php echo ($row["uid"]); ?>"/>
                <div class="modal-body clearfix">
                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">余额</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" class="form-control"  value="<?php echo ($row["money"]); ?>">
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">提现账户</label>
                        <div class="col-sm-10">
                            <select name="wit_type">
                                <option value="1">支付宝</option>
                                <option value="2">银行卡</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">提现金额</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ex_money" value="">
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