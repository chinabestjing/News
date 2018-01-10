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
        <link rel="stylesheet" href="/Public/kindeditor/themes/default/default.css" />
        <script charset="utf-8" src="/Public/kindeditor/kindeditor-min.js"></script>
        <script charset="utf-8" src="/Public/kindeditor/lang/zh_CN.js"></script>
        <script>
            var editor;
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="content"]', {
                    allowFileManager : true
                });
                K('input[name=getHtml]').click(function(e) {
                    alert(editor.html());
                });
                K('input[name=isEmpty]').click(function(e) {
                    alert(editor.isEmpty());
                });
                K('input[name=getText]').click(function(e) {
                    alert(editor.text());
                });
                K('input[name=selectedHtml]').click(function(e) {
                    alert(editor.selectedHtml());
                });
                K('input[name=setHtml]').click(function(e) {
                    editor.html('<h3>Hello KindEditor</h3>');
                });
                K('input[name=setText]').click(function(e) {
                    editor.text('<h3>Hello KindEditor</h3>');
                });
                K('input[name=insertHtml]').click(function(e) {
                    editor.insertHtml('<strong>插入HTML</strong>');
                });
                K('input[name=appendHtml]').click(function(e) {
                    editor.appendHtml('<strong>添加HTML</strong>');
                });
                K('input[name=clear]').click(function(e) {
                    editor.html('');
                });
            });
        </script>
    </head>
    <body>
    <?php echo $_show_msg;?>
<div id="right-content">
    <div class="top">
        <h2>集团介绍 <small>设置</small></h2>
    </div>

    <ul class="nav nav-tabs mt10">
        <li role="presentation">
            <a href="/index.php/Admin1/Group/teamAdd">添加人员</a>
        </li>
    </ul>

    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>成员姓名</th>
                    <th>性别</th>
                    <th>成员职位</th>
                    <th>成员学历</th>
                    <th>成员排序</th>
                    <th>成员添加时间</th>
                    <th>成员状态</th>
                    <th width="200">操作</th>
                </tr>
                </thead>

                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($i); ?></td>
                        <td><?php echo ($v["m_name"]); ?></td>
                        <td>
                            <?php if($v["m_sex"] == 1 ): ?><span style="color:red;">女</span>
                                <?php else: ?>
                                <span style="color:blue;">男</span><?php endif; ?>
                        </td>
                        <td><?php echo ($v["m_position"]); ?></td>
                        <td><?php echo ($v["m_study"]); ?></td>
                        <td><?php echo ($v["m_order"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$v["m_time"])); ?></td>
                        <td>
                            <?php if($v["m_state"] == 1 ): ?><span style="color:blue;">在职</span>
                                <?php else: ?>
                                <span style="color:red;">离职</span><?php endif; ?>
                        </td>
                        <td class="handle">
                            <a href="<?php echo U('Group/teamCheck',array('id'=>$v['m_id'],'key'=>$v['m_state']));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>切换</a>
                            <a href="<?php echo U('Group/teamUpdate',array('id'=>$v['m_id']));?>" class="edit"><i class="glyphicon glyphicon-pencil"></i>修改</a>
                            <a href="javascript:;" class="del" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('Group/teamDel', array('id'=>$v['m_id']));?>'">
                                <i class="glyphicon glyphicon-trash"></i>删除
                            </a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="10" align="right"><span style="color: green;"><?php echo ($page); ?></span></td>
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