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
<!-- 载入上传文件 -->
<script type="text/javascript" src="/Public/js/jquery-2.0.2.js"></script>
    <script>
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="n_text"]', {
                allowFileManager : true
            });
            editor = K.create('textarea[name="n_intro"]', {
                allowFileManager : true
            });
        });
    </script>
<div id="right-content">
    <div class="top">
        <h2>新闻管理 <small>添加新闻</small></h2>
    </div>

    <form action="<?php echo U('News/add');?>" method="post">
        <div class="table-responsive">
            <table class="table table-hover">

                <tr>
                    <td width="100">新闻标题</td>
                    <td>
                        <input type="text" class="form-control w400" name="n_title" value="" />
                    </td>
                </tr>
                <tr>
                    <td>请选择新闻类型</td>
                    <td>
                        <select name="n_type" class="form-control w400">
                            <option value="1">集团新闻</option>
                            <option value="2">行业新闻</option>
                            <option value="3">媒体关注</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>新闻内容</td>
                    <td>
                        <div class="col-sm-10">
                            <textarea name="n_text" style="width:800px;height:400px;visibility:hidden;"><?php echo ($data["i_text2"]); ?></textarea>
                            <!-- <script type="text/plain" id="container" name="i_text1" style="width:100%;height:500px;"><?php echo ($data["i_text1"]); ?></script>-->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>新闻简介</td>
                    <td>
                        <textarea name="n_intro" class="description_box"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary w100">保存</button>
                        <button type="button" id="f" class="btn btn-primary w100">取消</button>
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