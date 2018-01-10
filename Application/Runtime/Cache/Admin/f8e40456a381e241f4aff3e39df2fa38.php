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
<script src="/Public/Common/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" href="/Public/Common/uploadify/uploadify.css">
<script type="text/javascript" src="/Public/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/ueditor/ueditor.all.min.js"></script>
        <script>
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="i_text2"]', {
                    allowFileManager : true
                });
            });
        </script>
	<div id="right-content">
		<div class="top">
			<h2>集团介绍 <small>设置</small></h2>
		</div>
        <!-- 载入上传文件 -->
        <script src="/Public/Common/uploadify/jquery.uploadify.min.js"></script>
        <link rel="stylesheet" href="/Public/Common/uploadify/uploadify.css">
		<form action="/index.php/Admin/Group/honor" method="post" id="goods_add"  enctype="multipart/form-data">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>设置项</th>
						<th>设置值</th>
					</tr>
				</thead>

                <tr>
                    <td>内容简介(公司荣誉)</td>
                    <td>
                        <div class="col-sm-10">
                            <textarea name="i_text2" style="width:800px;height:200px;visibility:hidden;"><?php echo ($data["i_text2"]); ?></textarea>
                            <!-- <script type="text/plain" id="container" name="i_text1" style="width:100%;height:500px;"><?php echo ($data["i_text1"]); ?></script>-->
                        </div>
                    </td>
                </tr>
                <div id="contenter"></div>
                <?php if(is_array($data['i_text'])): $i = 0; $__LIST__ = $data['i_text'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td width="150">荣誉项目<?php echo ($i); ?><span class="click1" value="<?php echo ($i-1); ?>" style="color:#ff0000;cursor: pointer;">删除</span></td>
                    <td>
                        <input type="text" name="title[<?php echo ($i-1); ?>]" class="form-control w400" value="<?php echo ($vo['title']); ?>"  placeholder="请填写荣誉标题">
                        <textarea name="text[<?php echo ($i-1); ?>]" ><?php echo ($vo['text']); ?></textarea>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr id="addContent">
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-block w100">添加荣誉</button>
                    </td>
                </tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-primary w100">提交</button>
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
        <script>
            $(".click1").each(function(){
                $(this).click(function(){
                    var num = $(this).attr('value');
                   // $('<input type="hidden" name="del['+num+']" value="'+num+'" />').appendTo("#contenter");
                 //   $('<input type="hidden" name="textdel['+textnum+']" value="'+texttext+'" />').appendTo(".up_box");
                 //   $(this).next("span").remove();
                    $(this).parents('tr').remove();

                });
            });
            $(".btn-block").click(function(){
                //$('<input type="text" class="form-control w400" name=addtitle[]" >').appendTo(".btn");
                $("#addContent").before('<tr> <td width="150">新添荣誉</td> <td> <input type="text" name="addtitle[]" class="form-control w400" value=""  placeholder="请填写荣誉标题"> <textarea name="addtext[]"></textarea> </td> </tr>');
            });

        </script>