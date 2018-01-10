<?php if (!defined('THINK_PATH')) exit(); $_show_msg=show_msg();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>顺拍后台管理中心</title>
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
			<h2>welcome</h2>
		</div>
		
		<form action="" method="post">
			<div class="table-responsive">
				<table class="table table-hover">
					
				</table>
			</div>
			<a href="<?php echo U('Index/update_cache');?>" class="btn btn-primary w200">更新数据库缓存(全部)</a><br/><br/>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'index'));?>" class="btn btn-primary w80">首页</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'group'));?>" class="btn btn-primary w80">集团介绍</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'news'));?>" class="btn btn-primary w80">新闻中心</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'school'));?>" class="btn btn-primary w80">艺术教育</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'trade'));?>" class="btn btn-primary w80">艺术交易</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'media'));?>" class="btn btn-primary w80">艺术传媒</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'culture'));?>" class="btn btn-primary w80">文化活动</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'contact'));?>" class="btn btn-primary w80">联系我们</a>
            <a href="<?php echo U('Index/update_cache_kinds',array('id'=>'resource'));?>" class="btn btn-primary w80">人力资源</a>
            <hr />
            <hr  />
            <a href="<?php echo U('Index/html',array('id'=>'html'));?>" class="btn btn-primary w200">更新静态缓存(全部)</a><br/><br/>
            <a href="<?php echo U('Index/model',array('id'=>'Index'));?>" class="btn btn-primary w80">首页</a>
            <a href="<?php echo U('Index/model',array('id'=>'Group'));?>" class="btn btn-primary w80">集团介绍</a>
            <a href="<?php echo U('Index/model',array('id'=>'News'));?>" class="btn btn-primary w80">新闻中心</a>
            <a href="<?php echo U('Index/model',array('id'=>'School'));?>" class="btn btn-primary w80">艺术教育</a>
            <a href="<?php echo U('Index/model',array('id'=>'Trade'));?>" class="btn btn-primary w80">艺术交易</a>
            <a href="<?php echo U('Index/model',array('id'=>'Media'));?>" class="btn btn-primary w80">艺术传媒</a>
            <a href="<?php echo U('Index/model',array('id'=>'Culture'));?>" class="btn btn-primary w80">文化活动</a>
            <a href="<?php echo U('Index/model',array('id'=>'Contact'));?>" class="btn btn-primary w80">联系我们</a>
            <a href="<?php echo U('Index/model',array('id'=>'Resource'));?>" class="btn btn-primary w80">人力资源</a>
		</form>
   <!--     <form action="/Adminshunp/Index/upload" enctype="multipart/form-data" method="post" >
            <input type="file" name="file" />
            <input type="submit" value="提交" >
        </form>-->
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