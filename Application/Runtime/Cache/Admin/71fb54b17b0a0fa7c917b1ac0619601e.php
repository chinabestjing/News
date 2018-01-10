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
        <h2>资金管理 <small>提现列表</small></h2>
    </div>

    <ul class="nav nav-tabs mt10">
        <li role="presentation" <?php if($status == 0): ?>class="active"<?php endif; ?>>
        <a href="<?php echo U('Funds/extractList',array('type'=>$type,'status'=>0));?>">待审核</a>
        </li>
        <li role="presentation" <?php if($status == 1): ?>class="active"<?php endif; ?>>
        <a href="<?php echo U('Funds/extractList',array('type'=>$type,'status'=>1));?>">批准</a>
        </li>
        <li role="presentation" <?php if($status == 2): ?>class="active"<?php endif; ?>>
        <a href="<?php echo U('Funds/extractList',array('type'=>$type,'status'=>2));?>">驳回</a>
        </li>
    </ul>

    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="160">#</th>
                    <th>用户名</th>
                    <th>提现金额</th>
                    <th>提现类型</th>
                    <th>账户信息</th>
                    <?php if($status == 0): ?><th>申请时间</th><?php endif; ?>
                    <?php if($status == 1): ?><th>交易号</th><?php endif; ?>
                    <?php if($status == 2): ?><th>驳回原因</th><?php endif; ?>
                    <th width="80">操作</th>
                </tr>
                </thead>

                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <th></th>
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
                        <?php if($v["status"] == 0): ?><td><?php echo (date('Y-m-d H:i:s',$v["create_time"])); ?></td><?php endif; ?>
                        <?php if($v["status"] == 1): ?><th><?php echo ($v["deal_num"]); ?></th><?php endif; ?>
                        <?php if($v["status"] == 2): ?><th><?php echo ($v["err_msg"]); ?></th><?php endif; ?>

                        <td class="handle">
                            <?php if($v['status'] == 0): ?><a href="#" data-toggle="modal" data-target="#addBox"><i class="glyphicon glyphicon-ok"></i>批准</a>
                                <a href="<?php echo U('Funds/reject',array('status'=>2,'id'=>$v['id'],'uid'=>$v['user_uid'],'money'=>$v['money']));?>" class="del"><i class="glyphicon glyphicon-remove"></i>驳回</a><?php endif; ?>
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
            <form action="<?php echo U('Funds/approval');?>" method="post" class="form-horizontal">
                <input type="hidden" name="id" value="<?php echo ($v["id"]); ?>" />
                <input type="hidden" name="status" value="<?php echo ($v["status"]); ?>">
                <div class="modal-body clearfix">
                    <div class="form-group clearfix mt10">
                        <label class="col-sm-2 control-label">交易号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deal_num" value="">
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