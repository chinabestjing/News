/* 
* [后台JS效果]
* @Author: Careless
* @Date:   2015-11-16 16:58:25
* @Email:  965994533@qq.com
* @Copyright:
*/
$(function(){
	// 左侧菜单点击效果
    $('#left-menu h2').click(function(){
		$(this).next('p').slideToggle().siblings('p').slideUp();
		$(this).toggleClass('this').siblings().removeClass('this');			  
	});
	// 左侧菜单链接点击样式
	$('#left-menu p a').click(function(){
		$(this).addClass('this').siblings('a').removeClass('this').parents('p').siblings('p').find('a').removeClass('this');
	})

	// 表单提交时 显示加载状态
	$('form').submit(function(){
		loding_show();
	})

	$('#goods_add').submit(function() {
		// 验证商品标题
		var title = $('input[name=title]').val();
		if (title == '') {
			show_msg('请填写标题', 0);
			loding_hide();
			return false;
		}

		// 验证门店价格
		var store_price = $('input[name=store_price]').val();
		if (!store_price.match(/^\d{1,5}\.?\d{0,2}$/)) {
			show_msg('请填写正确的门店价', 0);
			loding_hide();
			return false;
		}

		// 验证网购价
		var price = $('input[name=price]').val();
		if (!price.match(/^\d{1,5}\.?\d{0,2}$/)) {
			show_msg('请填写正确的网购价', 0);
			loding_hide();
			return false;
		}

		// 获取商品类型
		var goods_type = $('input[name=goods_type]:checked').val();

		// 判断是否需要验证活动价
		if (goods_type == 3 || goods_type == 4) {
			// 验证活动价
			var activity_price = $('input[name=activity_price]').val();
			if (!activity_price.match(/^\d{1,5}\.?\d{0,2}$/) || activity_price == 0) {
				if (goods_type == 3) {
					show_msg('团购商品请填写正确的活动价', 0);
				}
				if (goods_type == 4) {
					show_msg('优惠活动商品请填写正确的活动价', 0);
				}
				loding_hide();
				return false;
			}
		}

		// 判断是否需要积分
		if (goods_type == 2) {
			// 验证积分
			var integral = $('input[name=integral]').val();
			if (!integral.match(/^\d{1,5}$/) || integral == 0) {
				show_msg('请填写正确的积分', 0);
				loding_hide();
				return false;
			}
		}

		// 验证邮费
		var postage = $('input[name=postage]').val();
		if (!postage.match(/^\d{1,5}\.?\d{0,2}$/)) {
			show_msg('请填写正确的邮费', 0);
			loding_hide();
			return false;
		}

		// 验证满N元包邮
		var m_postage = $('input[name=m_postage]').val();
		if (!m_postage.match(/^\d{1,5}\.?\d{0,2}$/)) {
			show_msg('请填写正确的满N元包邮', 0);
			loding_hide();
			return false;
		}

		// 验证库存
		var stock = $('input[name=stock]').val();
		if (!stock.match(/^\d{1,5}$/)) {
			show_msg('请填写正确的库存', 0);
			loding_hide();
			return false;
		}

		if (goods_type == 3) {
			if (!stock.match(/^\d{1,5}$/) || stock == 0) {
				show_msg('团购商品必须设置库存', 0);
				loding_hide();
				return false;
			}
		}

		// 验证图片
		var _img = $('input[name=img]').val();
		if (_img == '') {
			show_msg('请上传图片', 0);
			loding_hide();
			return false;
		}
	});
})

/**
 * [loding_show 显示加载状态]
 * @Author            彭彪
 * @DateTime          2015-12-02T14:00:21+0800
 */
function loding_show(){
	$('#loding-bg').fadeTo(500,0.5);
	$('#loding-info').fadeTo(500,0.9);
}


function loding_hide(){
	$('#loding-bg').hide();
	$('#loding-info').hide();
}

/**
 * [message 消息提示]
 * @Author            彭彪
 * @DateTime          2015-12-04T13:52:01+0800
 * @param    {[type]} content    [内容]
 * @param    {[type]} state      [状态（1:成功 | 0:失败）]
 */
function show_msg(content, state){
	$(function(){
		if (state == 1) {
			$('#myModal #myModalLabel').html('<b style="color: green;"><i class="glyphicon glyphicon-ok"></i>操作成功</b>');
		} else if (state == 0) {
			$('#myModal #myModalLabel').html('<b style="color: red;"><i class="glyphicon glyphicon-remove"></i>操作失败</b>');
		}
		$('#myModal .modal-body').text(content);
		$('#showmsg').click();
	})
	
}
