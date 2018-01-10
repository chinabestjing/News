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
        editor = K.create('textarea[name="i_text1"]', {
            allowFileManager : true
        });
        editor = K.create('textarea[name="i_text2"]', {
            allowFileManager : true
        });
        editor = K.create('textarea[name="i_text3"]', {
            allowFileManager : true
        });
    });
</script>
<div id="right-content">
    <div class="top">
        <h2>艺术教育设置 <small>艺术学校</small></h2>
    </div>

    <form action="<?php echo U('School/art');?>" method="post">
        <div class="table-responsive">
            <table class="table table-hover">

                <!-- 载入上传文件 -->
                <tr>
                    <td width="100">链接网站设置（http://开头）</td>
                    <td>
                        <!--id隐藏域-->
                        <input type="text" class="form-control w400" name="i_url" value="<?php echo ($data["i_url"]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="100">艺奥国际少儿培训</td>
                    <td>
                        <!--id隐藏域-->
                        <input type="text" class="form-control w400" name="i_title1" value="<?php echo ($data["i_title1"]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>艺奥内容</td>
                    <td>
                        <textarea name="i_text1" class="description_box"><?php echo ($data["i_text1"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="100">艺术高考培训</td>
                    <td>
                        <!--id隐藏域-->
                        <input type="text" class="form-control w400" name="i_title2" value="<?php echo ($data["i_title2"]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>艺术高考内容</td>
                    <td>
                        <textarea name="i_text2" class="description_box"><?php echo ($data["i_text2"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="100">艺奥国际网</td>
                    <td>
                        <!--id隐藏域-->
                        <input type="text" class="form-control w400" name="i_title3" value="<?php echo ($data["i_title3"]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>艺奥国际网内容</td>
                    <td>
                        <textarea name="i_text3" class="description_box"><?php echo ($data["i_text3"]); ?></textarea>
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