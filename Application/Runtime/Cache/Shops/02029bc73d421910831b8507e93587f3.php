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
        <h2>地址管理 <small>店铺设置</small></h2>
    </div>
    <form action="<?php echo U('Shops/setShops');?>" method="post" >
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>设置项</th>
                    <th>设置值</th>
                </tr>
                </thead>
                <tr>
                    <td width="150">店铺名称</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="shop_name" class="form-control w400" placeholder="" value="<?php echo ($oldData['shop_name']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">联系电话</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="telephone" class="form-control w400" placeholder="" value="<?php echo ($oldData['telephone']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">联系人</td>
                    <td>
                        <div class="radio">
                            <input type="text"  name="real_name" class="form-control w400" placeholder="" value="<?php echo ($oldData['real_name']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">营业时间</td>
                    <td>
                        <div class="radio">
                            <input type="text" name="shop_hours" class="form-control w400" placeholder="" value="<?php echo ($oldData['shop_hours']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="150">详情地址</td>
                    <td>
                        <div class="radio">
                            <input type="text" name="detail" class="form-control w400" placeholder="" value="<?php echo ($oldData['detail']); ?>" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>店铺缩略图</td>
                    <td>
                        <p style="color: red; font-weight: bold;">建议尺寸：300x200</p>
                        <!-- 图片上传 begin -->
                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                        <div class="up_box">
                            <input type="hidden" name="img" value="<?php echo ($oldData['img']); ?>" />
                            <img src="<?php echo ($oldData['img']); ?>_300x200.jpg" alt="店铺缩略图" style="max-width: 150px;">
                        </div>
                        <!-- 载入上传文件 -->
<script src="/Public/Common/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" href="/Public/Common/uploadify/uploadify.css">

<!-- 上传配置 -->
<script>
'<?php $timestamp = time();?>';
$(function(){
	$('#file_upload').uploadify({
		'formData'     : {
			'timestamp'	: '<?php echo $timestamp?>',
			'token'     : '<?php echo md5(C("UP_KEY") . $timestamp);?>',
		},
		'swf'      		: '/Public/Common/uploadify/uploadify.swf',
		'uploader' 		: '<?php echo U("Upload/up");?>',
		"buttonText" 	: "上传图片",
		"fileObjName"     : "up",
		"width"           : 120,
		'fileTypeExts'    : '*.jpg; *.png; *.gif; *.jpeg;',
		"onUploadSuccess" : upcallback,
		'onFallback' : function() {
            alert('未检测到兼容版本的Flash.');
        }
	});
})
</script>

                        <!-- 图片上传 end -->
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td>
                        <!-- <input type="hidden" name="_province">
                        <input type="hidden" name="_city">
                        <input type="hidden" name="_county"> -->
                        <button type="submit" class="btn btn-primary w100">保存</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
<link rel="stylesheet" type="text/css" href="/Public/Common/laytime/jquery.datetimepicker.css"/>
<script type="text/javascript" src="/Public/Common/laytime/jquery.datetimepicker.js"></script>
<script>
    $(function(){
        var _val = $('#province').find("option:selected").val();
        var _cityid = "<?php echo ($oldData['city_id']); ?>";
        var _county_id = "<?php echo ($oldData['county_id']); ?>";
        if (_val) {
            $.ajax({
                url: '<?php echo U("Shops/city");?>',
                type: 'GET',
                dataType: 'json',
                data: {'id': _val, 'type' : 'city'},
                success:function(json){
                    var _html = '';
                    $.each(json.data, function(index, val) {
                         _html += '<option value="'+this.city_id+'"';
                         if (_cityid == this.city_id) {
                            _html += 'selected="selected">';
                         } else {
                            _html += '>';
                         }
                         _html += this.name + '</option>';
                    });
                    $('#city option').remove();
                    $('#city').append(_html);


                    $.ajax({
                        url: '<?php echo U("Shops/city");?>',
                        type: 'GET',
                        dataType: 'json',
                        data: {'id': _cityid, 'type' : 'county'},
                        success:function(json){
                            var _html = '';
                            $.each(json.data, function(index, val) {
                                 _html += '<option value="'+this.county_id+'"';
                                 if (_county_id == this.county_id) {
                                    _html += 'selected="selected">';
                                 } else {
                                    _html += '>';
                                 }
                                 _html += this.name + '</option>';
                            });
                            $('#county option').remove();
                            $('#county').append(_html);
                        }
                    }) 
                }

                
            }) 
        }
        



        $('#province').change(function() {
            var _val = $(this).find("option:selected").val();
            var _text = $(this).find("option:selected").text();
            $('input[name=_province]').val(_text);

            $.ajax({
                url: '<?php echo U("Shops/city");?>',
                type: 'GET',
                dataType: 'json',
                data: {'id': _val, 'type' : 'city'},
                success:function(json){
                    var _html = '<option value="">请选择</option>';
                    $.each(json.data, function(index, val) {
                         _html += '<option value="'+this.city_id+'">' + this.name + '</option>';
                    });
                    $('#city option').remove();
                    $('#city').append(_html);
                }
            })            
        });

        $('#city').change(function() {
            var _val = $(this).find("option:selected").val();
            var _text = $(this).find("option:selected").text();
            $('input[name=_city]').val(_text);

            $.ajax({
                url: '<?php echo U("Shops/city");?>',
                type: 'GET',
                dataType: 'json',
                data: {'id': _val, 'type' : 'county'},
                success:function(json){
                    var _html = '<option value="">请选择</option>';
                    $.each(json.data, function(index, val) {
                         _html += '<option value="'+this.county_id+'">' + this.name + '</option>';
                    });
                    $('#county option').remove();
                    $('#county').append(_html);
                }
            })            
        });

        $('#county').change(function() {
            var _val = $(this).find("option:selected").val();
            var _text = $(this).find("option:selected").text();
            $('input[name=_county]').val(_text);
           
        });
    })

    // 图片上传回调方法
    function upcallback(file, data){
        // json字符串转为对象
        var _data = eval('('+data+')');
        console.log(_data.state);
        // 失败提示
        if (_data.status == 0) {
            show_msg(_data.msg, 0);
            return;
        }
        // 成功提示
        if (_data.status == 1) {
            show_msg(_data.msg, 1);
            $('input[name=img]').val(_data.data.path);
            $('.up_box img').attr({'src':''+_data.data.path+'_300x200.jpg'});
        }
    }
    //时间选择插件
    $('#J-xl').datetimepicker();
    $('#J-xl').datetimepicker({step:10});
    $('#J-x2').datetimepicker();
    $('#J-x2').datetimepicker({step:10});
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