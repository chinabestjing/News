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
                editor = K.create('textarea[name="i_text1"]', {
                    allowFileManager : true
                });
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
		<form action="/Admin1/Group/brand" method="post" id="goods_add"  enctype="multipart/form-data">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>设置项</th>
						<th>设置值</th>
					</tr>
				</thead>
				<tr>
                    <td>内容1</td>
                    <td>
                        <div class="col-sm-10">
                            <textarea name="i_text1" style="width:800px;height:400px;visibility:hidden;"><?php echo ($data["i_text1"]); ?></textarea>
                           <!-- <script type="text/plain" id="container" name="i_text1" style="width:100%;height:500px;"><?php echo ($data["i_text1"]); ?></script>-->
                        </div>
                    </td>
				</tr>
                <tr>
                    <td>内容2</td>
                    <td>
                        <div class="col-sm-10">
                            <textarea name="i_text2" style="width:800px;height:400px;visibility:hidden;"><?php echo ($data["i_text2"]); ?></textarea>
                            <!-- <script type="text/plain" id="container" name="i_text1" style="width:100%;height:500px;"><?php echo ($data["i_text1"]); ?></script>-->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>图片管理（点击图片删除）</td>
                    <td>
                        <!-- 图片上传 begin -->
                        <div class="up_box">
                            <?php if($data['i_pics'][0]['pic'] == '' ): ?>没有图片
                                <?php else: ?>
                                <?php if(is_array($data["i_pics"])): $i = 0; $__LIST__ = $data["i_pics"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img value="<?php echo ($i-1); ?>" src="<?php echo ($vo["pic"]); ?>" alt="图片信息" width="150px" height="150px">
                                    <span value="<?php echo ($i-1); ?>"><?php echo ($vo["text"]); ?></span><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                        <!-- 图片上传 end -->

                    </td>
                </tr>
                <tr>
                    <td id="click1" style="cursor:pointer;color:darkred;">添加图片</td>
                    <td id="check1">
                        <!-- 图片上传 begin -->

                        <!-- 图片上传 end -->

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
            $(".up_box img").each(function(){
                $(this).click(function(){
                    var src = $(this).attr('src');
                    var num = $(this).attr('value');
                    var textnum =  $(this).next("span").attr('value');
                    var texttext = $(this).next("span").html();
                    $('<input type="hidden" name="photodel['+num+']" value="'+src+'" />').appendTo(".up_box");
                    $('<input type="hidden" name="textdel['+textnum+']" value="'+texttext+'" />').appendTo(".up_box");
                    $(this).next("span").remove();
                    $(this).remove();

                });
            });
            $("#click1").click(function(){
                $('<input type="file" class="form-control w400" name="photo[]" >').appendTo("#check1");
                $('<input type="text" class="form-control w800" name="phototext[]" placeholder="图片文字说明" >').appendTo("#check1");
            });

        </script>