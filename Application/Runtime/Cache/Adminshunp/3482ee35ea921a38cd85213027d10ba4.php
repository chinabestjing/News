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
	<!-- 顶部 -->
	<div id="top" class="clearfix2">
		<p class="fl">顺拍后台管理中心</p>
		<span class="fr">
			Active User : <?php echo ($_SESSION['adminUser']['username']); ?> | 
			<a href="<?php echo U('Login/login_out');?>">[退出登录]</a>
		</span>
	</div>
	<div class="clearfix2">
		<!-- 左侧导航 -->
		<div id="left-menu" class="fl">
            <h2><i class="glyphicon glyphicon-cog"></i>网站设置</h2>
            <p>
                <a href="<?php echo U('Carousel/index');?>" target="iframe">站点设置</a>
                <a href="<?php echo U('Carousel/index');?>" target="iframe">轮播图管理</a>
                <a href="<?php echo U('Carousel/index');?>" target="iframe">友情链接列表</a>
                <a href="<?php echo U('Carousel/index');?>" target="iframe">添加友情链接</a>
            </p>

            <h2><i class="glyphicon glyphicon-user"></i>用户管理</h2>
            <p>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">后台管理员</a>

                <a href="<?php echo U('AdminUser/yuyue');?>" target="iframe">预约看样列表</a>
                <a href="<?php echo U('AdminUser/yuyueAdd');?>" target="iframe">预约后台录入</a>
            </p>

            <h2><i class="glyphicon glyphicon-cog"></i>分类系统管理</h2>
            <p>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">地点分类列表</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">地点分类添加</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">法院列表</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">法院添加</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">价格列表</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">价格新增设置</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">标的物状态列表</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">标的物状态设置</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">拍卖时间段列表</a>
                <a href="<?php echo U('AdminUser/index');?>" target="iframe">拍卖时间段设置</a>
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>信息发布系统</h2>
            <p>
                <a href="<?php echo U('News/ours_news');?>" target="iframe">标的物列表</a>
                <a href="<?php echo U('News/ours_news');?>" target="iframe">标的物录入</a>
            </p>

            <h2><i class="glyphicon glyphicon-cog"></i>系统设置</h2>
            <p>
                <a href="<?php echo U('Carousel/index');?>" target="iframe">轮播图管理</a>
            </p>

            <h2><i class="glyphicon glyphicon-user"></i>用户管理</h2>
            <p>

                <a href="<?php echo U('AdminUser/index');?>" target="iframe">后台管理员</a>
               <!-- <a href="<?php echo U('School/index');?>" target="iframe">学校列表</a>
                <a href="<?php echo U('User/index');?>" target="iframe">用户</a>
                <a href="<?php echo U('User/shops');?>" target="iframe">学校商城列表</a>-->
                <!--<a href="<?php echo U('User/job');?>" target="iframe">学生兼职</a>-->
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>集团介绍模块设置</h2>
            <p>
               <?php if(is_array($contentArr)): $i = 0; $__LIST__ = $contentArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><a href="<?php echo ($content["url"]); ?>" target="iframe"><?php echo ($content["content"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>新闻发布</h2>
            <p>
                <a href="<?php echo U('News/ours_news');?>" target="iframe">集团新闻</a>
                <a href="<?php echo U('News/business_news');?>" target="iframe">行业新闻</a>
                <a href="<?php echo U('News/others_news');?>" target="iframe">媒体关注</a>
            </p>
            <h2>
                <i class="glyphicon glyphicon-cog"></i>艺术教育设置</h2>
            <p>
                <a href="<?php echo U('School/index');?>" target="iframe">首页设置</a>
                <a href="<?php echo U('School/art');?>" target="iframe">巴蜀画派艺术学校</a>
                <a href="<?php echo U('School/profession');?>" target="iframe">巴蜀画派专修学院</a>
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>艺术交易设置</h2>
            <p>
                <a href="<?php echo U('Trade/auction');?>" target="iframe">宝墩拍卖</a>
                <a href="<?php echo U('Trade/artwork');?>" target="iframe">宝墩艺术品</a>
                <a href="<?php echo U('Trade/artlink');?>" target="iframe">艺链国际</a>
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>艺术传媒设置</h2>
            <p>
                <a href="<?php echo U('Media/beauty');?>" target="iframe">中华美网</a>
                <a href="<?php echo U('Media/paint');?>" target="iframe">中华美术杂志</a>
                <a href="<?php echo U('Media/magazine');?>" target="iframe">巴蜀画派杂志</a>
                <a href="<?php echo U('Media/tencent');?>" target="iframe">微信微博</a>
                <a href="<?php echo U('Media/media');?>" target="iframe">巴蜀画派传媒公司</a>
                <a href="<?php echo U('Media/work');?>" target="iframe">杂志列表</a>
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>文化活动设置</h2>
            <p>
                <a href="<?php echo U('Culture/art');?>" target="iframe">巴蜀国际艺博会</a>
                <a href="<?php echo U('Culture/young');?>" target="iframe">巴蜀青少年艺博</a>
                <a href="<?php echo U('Culture/create');?>" target="iframe">宝墩国际创博会</a>
                <a href="<?php echo U('Culture/famous');?>" target="iframe">巴蜀画派名家进校园</a>
                <a href="<?php echo U('Culture/match');?>" target="iframe">艺奥国际青少年书画大赛</a>
                <a href="<?php echo U('Culture/tongxingyao');?>" target="iframe">童星耀巴蜀才艺年会</a>
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>联系我们设置</h2>
            <p>
                <a href="<?php echo U('Contact/index');?>" target="iframe">联系方式</a>
                <a href="<?php echo U('Contact/nextTel');?>" target="iframe">下属公司</a>
               <!-- <a href="<?php echo U('Contact/saleNet');?>" target="iframe">销售网点</a>-->
                <a href="<?php echo U('Contact/teachNet');?>" target="iframe">教学网点</a>
            </p>
            <h2><i class="glyphicon glyphicon-cog"></i>人力资源设置</h2>
            <p>
                <a href="<?php echo U('Resource/method');?>" target="iframe">人才理念</a>
                <a href="<?php echo U('Resource/world');?>" target="iframe">社会招聘</a>
                <a href="<?php echo U('Resource/school');?>" target="iframe">校园招聘</a>
            </p>

            <!--下面的参考-->
		</div>

		<div id="content" class="fr">
			<iframe src="<?php echo U('Index/welcome');?>" scrolling="auto" frameborder="0" name="iframe"></iframe>
		</div>
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