<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/text.css">
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>货品·预约</title>
		<link rel="shortcut icon" href="img/logo.ico" type="img/x-icon">
		<!--<script src="https://hm.baidu.com/hm.js?25267f815d19ca3f16af3eea13a101b8"></script>-->
		<script async="" charset="utf-8" src="js/udeskApi.js"></script>
		<script src="/Public/Home/js/redirect.js"></script>
		<script src="/Public/Home/js/polyfill.min.js"></script>
		<script src="/Public/Home/js/jquery-2.1.4.min.js"></script>
		<script src="/Public/Home/js/common.js"></script>
		<style type="/Public/Home/text/css">
			.alert-wrap {
				height: 662px
			}
		</style>
		<link href="/Public/Home/css/one.css" rel="stylesheet">
		<!--<script src="http://laipaiya.udesk.cn/spa1/im_web_plugins/35953/out_config?company_code=1ia1f2dg&amp;language=&amp;session_key=&amp;callback=udesk_jsonp0"></script>-->
		<style type="text/css">
			.el-vue-amap-container,
			.el-vue-amap-container .el-vue-amap {
				height: 100%
			}
		</style>
		<style type="text/css">
			.el-vue-search-box-container {
				position: relative;
				width: 360px;
				height: 45px;
				background: #fff;
				box-shadow: 0 2px 2px rgba(0, 0, 0, .15);
				border-radius: 2px 3px 3px 2px;
				z-index: 10
			}
			
			.el-vue-search-box-container .search-box-wrapper {
				position: absolute;
				display: flex;
				align-items: center;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				box-sizing: border-box
			}
			
			.el-vue-search-box-container .search-box-wrapper input {
				flex: 1;
				height: 20px;
				line-height: 20px;
				letter-spacing: .5px;
				font-size: 14px;
				text-indent: 10px;
				box-sizing: border-box;
				border: none;
				outline: none
			}
			
			.el-vue-search-box-container .search-box-wrapper .search-btn {
				width: 45px;
				height: 100%;
				display: flex;
				align-items: center;
				justify-content: center;
				background: transparent;
				cursor: pointer
			}
			
			.el-vue-search-box-container .search-tips {
				position: absolute;
				top: 100%;
				border: 1px solid #dbdbdb;
				background: #fff;
				overflow: auto
			}
			
			.el-vue-search-box-container .search-tips ul {
				padding: 0;
				margin: 0
			}
			
			.el-vue-search-box-container .search-tips ul li {
				height: 40px;
				line-height: 40px;
				box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
				padding: 0 10px;
				cursor: pointer
			}
			
			.el-vue-search-box-container .search-tips ul li.autocomplete-selected {
				background: #eee
			}
		</style>

		<meta name="keywords" content="司法拍卖辅助平台" data-vue-meta="true">
		<meta name="description" content="司法拍卖辅助平台。" data-vue-meta="true">
	</head>

	<body>
		<div id="app">
			<div >
				<div>
					<div class="nav index-nav">
						<div class="container clear-both">
							<div class="nav-left">
								<a href="#" class="logo-main inline-block m-r-10 router-link-exact-active router-link-active">
									<img src="/Public/Home/img/logo-main.png">
								</a>
								<div class="nav-list inline-block">
									<a href="<?php echo U('Index/index');?>" class="nav-list-item router-link-exact-active router-link-active">首页</a>
									<a href="<?php echo U('court/index');?>" class="nav-list-item">法院</a>
									<a href="<?php echo U('list/index');?>" class="nav-list-item">货品·预约</a>
									<a href="<?php echo U('Sign/index');?>" tag="a" target="_blank" class="nav-list-item">法院监管</a>
									<a href="<?php echo U('Job/index');?>" class="nav-list-item">招聘英才</a>
									<a href="<?php echo U('Contact/index');?>" class="nav-list-item">联系我们</a>
								</div>
							</div>
							<div class="nav-right  clear-both">

								<div class="nav-search"><input type="text" placeholder="搜索标的物"> <i class="material-icons nav-search-icon cursor-pointer">O</i></div>
							</div>
						</div>
					<!--	<div class="login-wrap">
							<div class="login-window i-tab">
								<div class="common-tab">
									<div class="common-tab-btn sign-login-btn login-sign-active">用户登录</div>
									<div class="common-tab-btn sign-login-btn">用户注册</div>
								</div>
								<div class="common-tab-item" style="display: block;"><input type="text" placeholder="请输入手机号码" class="input-border m-t-60"> <input type="text" placeholder="请输入登录密码" class="input-border m-t-20">
									<div class="btn btn-red m-t-20 cursor-pointer">登录</div>
								</div>
								<div class="common-tab-item"><input type="text" placeholder="请输入手机号码" class="input-border m-t-20 sign-phonenum">
									<div class="position-relative">
										<input type="text" class="input-border m-t-20"> 
											<span class="color-white bg-red get-phone-code-btn">获取验证码</span>
									</div> 
									<input type="text" placeholder="请输入登录密码" class="input-border m-t-20"> <input type="text" placeholder="请重新输入密码" class="input-border m-t-20">
									<div class="btn btn-red m-t-20 cursor-pointer">注册</div>
								</div>
							</div>
						</div>-->
					</div>
				</div>
				<div class="center-search">
					<div class="center-search-body shadow"><input type="text" name="keywords" placeholder="请输入搜索关键词 或 房源编号" class="center-search-input"> <i class="material-icons color-red center-search-btn size2em">O</i></div>
				</div>
				<div class="grey-container container-padding">
					<div class="multipe-selection container shadow ">
						<div class="multipe-selection-line clear-both"><span class="multipe-selection-title color-black">区　　域 ：</span>
							<div class="list-clear-btn multipe-selection-active">不限</div>
							<div class="multipe-selection-item position-relative">
								<a class="multipe-selection-item-area ">浙江省</a>
								<a class="multipe-selection-item-area">四川省</a>
								<a class="multipe-selection-item-area">重庆市</a>
								<a class="multipe-selection-item-area">江苏省</a>
								<a class="multipe-selection-item-area">辽宁省</a>
								<a class="multipe-selection-item-area">湖南省</a>
								<a class="multipe-selection-item-area">云南省</a>
								<a class="multipe-selection-item-area">天津市</a>
								<a class="multipe-selection-item-area">广西壮族自治区</a>
								<a class="multipe-selection-item-area">吉林省</a>
								<a class="multipe-selection-item-area">上海市</a>
								<a class="multipe-selection-item-area">广东省</a>
								<a class="multipe-selection-item-area">北京市</a>
								<a class="multipe-selection-item-area">湖北省</a>
								<a class="multipe-selection-item-area">海南省</a>
								<a class="multipe-selection-item-area">内蒙古自治区</a>
								<a class="multipe-selection-item-area">山东省</a>
								<a class="multipe-selection-item-area">江西省</a>
								<a class="multipe-selection-item-area">安徽省</a>
								<a class="multipe-selection-item-area">陕西省</a>
								<a class="multipe-selection-item-area">贵州省</a>
								<a class="multipe-selection-item-area">福建省</a>
								<a class="multipe-selection-item-area">山西省</a>
								<a class="multipe-selection-item-area">河北省</a>
								<div class="multipe-selection-item-area-city"></div>
							</div>
						</div>
						<div class="multipe-selection-line clear-both"><span class="multipe-selection-title color-black">类　　型 ：</span>
							<div class="list-clear-btn multipe-selection-active">不限</div>
							<div class="multipe-selection-item">
								<a class="">房产</a>
								<a class="">机动车</a>
								<a class="">土地</a>

								<a class="">资产</a>

								<a class="">股权</a>

							</div>
						</div>
						<div class="multipe-selection-line clear-both"><span class="multipe-selection-title color-black">价　　格 ：</span>
							<div class="list-clear-btn multipe-selection-active">不限</div>
							<div class="multipe-selection-item">
								<a class="">10万以下</a>
								<a class="">10-50万</a>
								<a class="">50-100万</a>
								<a class="">100-200万</a>
								<a class="">200-400万</a>
								<a class="">400-600万</a>
								<a class="">600-800万</a>
								<a class="">800-1000万</a>
								<a class="">1000万以上</a>
							</div>
						</div>
						<div class="multipe-selection-line clear-both"><span class="multipe-selection-title color-black">拍卖时间 ：</span>
							<div class="list-clear-btn multipe-selection-active">不限</div>
							<div class="multipe-selection-item">
								<a class="">今天</a>
								<a class="">3天内</a>
								<a class="">7天内</a>
							</div>
						</div>
						<div class="multipe-selection-line clear-both"><span class="multipe-selection-title color-black">拍卖状态 ：</span>
							<div class="list-clear-btn">不限</div>
							<div class="multipe-selection-item">
								<a class="multipe-selection-active">即将开始</a>
								<a class="">已结束</a>
								<a class="">流拍</a>
								<a class="">中止</a>
								<a class="">撤回</a>
							</div>
						</div>
						
						
					</div>
					<div class="container listpage-list-left clear-both">
						<div class="left-list">
							<div class="list-sort shadow"><span>
						找到 <span class="listpage-searchrs-text color-red">1210</span> 套符合要求的标的物
								</span>
								<div class="sort-item-container">
									<div class="click-btn color-red">默认
									</div>
									<div class="click-btn">人气
										<div class="sort-triangle">
											<div class="sort-triangle-up"></div>
											<div class="sort-triangle-down"></div>
										</div>
									</div>
									<div class="click-btn">折扣
										<div class="sort-triangle">
											<div class="sort-triangle-up"></div>
											<div class="sort-triangle-down"></div>
										</div>
									</div>
									<div class="click-btn">价格
										<div class="sort-triangle">
											<div class="sort-triangle-up"></div>
											<div class="sort-triangle-down"></div>
										</div>
									</div>
								</div>
							</div>
							<ul class="production-list">
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank">
												<img src="x-oss-process=img/resize,h_300,w_600" lazy="loaded">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-success">可预约</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">重庆市九龙坡区黄桷坪铁路一村28号3幢17-4号房屋</a>
											<p class="production-list-parameter"><span>141.6 m²</span> <span><a>3 室</a> <a>2 厅</a> <a>2卫</a></span> <span>2005 年</span></p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey">重庆市</span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-25 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">72.16万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="http://laipai-img.oss-cn-hangzhou.aliyuncs.com/upload/1513673781_311_bak.jpg?x-oss-process=img/resize,h_300,w_600" lazy="loaded">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-danger">预约已结束</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">8.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">位于浙江省开化县华埠镇工业功能区黄金路北路6号的工业用地、地上建筑物及其附属物</a>
											<!---->
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">8543.28万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="http://laipai-img.oss-cn-hangzhou.aliyuncs.com/upload/1513671085_449_bak.jpg_960x960.jpg?x-oss-process=img/resize,h_300,w_600" lazy="loaded">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-warming">看样排期中</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">位于川姜镇南通家纺城家纺大酒店幢401室不动产及附属设施（按现状拍卖交接）</a>
											<p class="production-list-parameter"><span>51.43 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">37.80万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="http://laipai-img.oss-cn-hangzhou.aliyuncs.com/upload/1513671740_657_bak.jpg_960x960.jpg?x-oss-process=img/resize,h_300,w_600" lazy="loaded">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-warming">看样排期中</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">位于川姜镇南通家纺城家纺大酒店幢402室不动产及附属设施（按现状拍卖交接）</a>
											<p class="production-list-parameter"><span>46.25 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">34万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-warming">看样排期中</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">位于川姜镇南通家纺城家纺大酒店幢403室不动产及附属设施（按现状拍卖交接）</a>
											<p class="production-list-parameter"><span>46.46 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">34.15万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-warming">看样排期中</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">位于川姜镇南通家纺城家纺大酒店幢404室不动产及附属设施（按现状拍卖交接）</a>
											<p class="production-list-parameter"><span>46.46 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">34.15万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-warming">看样排期中</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">位于川姜镇南通家纺城家纺大酒店幢405室不动产及附属设施（按现状拍卖交接）</a>
											<p class="production-list-parameter"><span>46.46 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">34.15万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-warming">看样排期中</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">位于川姜镇南通家纺城家纺大酒店幢406室不动产及附属设施（按现状拍卖交接）</a>
											<p class="production-list-parameter"><span>46.46 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">34.15万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-success">可预约</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">南通市崇川区益兴名流府1幢106室、车库34室</a>
											<p class="production-list-parameter"><span>178.6 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">254.70万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-disabled">不安排看样</div>
											</a>
										</div>
										<div class="production-list-body">
											<!---->
											<a href="details.html" class="production-list-name" target="_blank">成都市武侯区一环路西一段11号5栋5单元1楼2号</a>
											<p class="production-list-parameter"><span>38.61 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-22 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">38.38万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-success">可预约</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">如皋市如城街道红星二组36号的不动产</a>
											<p class="production-list-parameter"><span>344 m²</span> <span><a>7 室</a> <a>2 厅</a> <a>4卫</a></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-21 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">285.60万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-success">可预约</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.9折</span>
											<a href="details.html" class="production-list-name" target="_blank">重庆市永川区文昌路898号30幢3单元4-2号</a>
											<p class="production-list-parameter"><span> m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey">重庆市</span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-20 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">46万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-success">可预约</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">重庆市南岸区亚太路9号附80号</a>
											<p class="production-list-parameter"><span>485.8 m²</span> <span><!----> <!----> <!----></span> <span>2014 年</span></p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey">重庆市</span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-20 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">638.29万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-success">可预约</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">苏州工业园区金鸡湖路馨都广场4幢401室房地产</a>
											<p class="production-list-parameter"><span>125.1 m²</span> <span><a>2 室</a> <a>1 厅</a> <a>2卫</a></span> <span>1999 年</span></p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-20 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">246万元</span></p>
											</div>
										</div>
									</div>
								</li>
								<li class="shadow">
									<div class="producyion-list-item">
										<div class="production-list-img">
											<a href="details.html" class="" target="_blank"><img src="img/lazyload.png" lazy="loading">
												<div class="production-state-wrap" style="display: none;"></div>
												<div class="production-state-mark" style="display: none;">
													<!---->
												</div>
												<div class="corporeList-state corporeList-state-success">可预约</div>
											</a>
										</div>
										<div class="production-list-body"><span class="production-list-discount ">7.0折</span>
											<a href="details.html" class="production-list-name" target="_blank">如皋市如城街道海阳路308号地下室</a>
											<p class="production-list-parameter"><span>1942.44 m²</span> <span><!----> <!----> <!----></span>
												<!---->
											</p>
											<div class="production-list-footer">
												<div class="production-list-footer-left"><i class="material-icons size1_5em color-grey">※</i> <span class="color-grey"></span></div>
												<div class="production-list-footer-right">拍卖时间：2018-01-20 10:00</div>
											</div>
											<div class="production-list-price">
												<p>起拍价 <span class="color-red size2em m-l-5">679.85万元</span></p>
											</div>
										</div>
									</div>
								</li>
							</ul>
							<div class="pagination clear-both"><span class="pagination-pre"><i class="material-icons"></i>上一页</span>
								<ul class="pagination-ul">
									<li class="pagination-active">1</li>
									<li class="">2</li>
									<li class="">3</li>
									<li class="">4</li>
									<li class="">5</li>
									<li class="">6</li>
									<li class="">7</li>
								</ul> <span class="pagination-next">下一页<i class="material-icons"></i></span></div>
						</div>
						<div class="right-list">
							<div class="recommend-container">
								<p class="recommend-title">标的物推荐</p>
								<ul class="recommend-ul">
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											
											<div class="recommend-item-title">重庆市万州区沙龙路三段1699号903室房屋</div>
											<div class="recommend-item-price">起拍价：29.02万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loaded" ></div>
											<div class="recommend-item-title">成都市龙泉驿区大面街道驿都西路3777号中铁逸都13栋2单元12楼3号住房</div>
											<div class="recommend-item-price">起拍价：56.13万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loaded" ></div>
											<div class="recommend-item-title">川M55538奥迪牌FV小型轿车</div>
											<div class="recommend-item-price">起拍价：10.67万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loading" ></div>
											<div class="recommend-item-title">成都市青羊区通惠门路3号2栋1单元24层2403号</div>
											<div class="recommend-item-price">起拍价：108.20万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loading" ></div>
											<div class="recommend-item-title">沈阳市浑南新区彩霞街1-8号1-19B-4室</div>
											<div class="recommend-item-price">起拍价：46.27万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loading" ></div>
											<div class="recommend-item-title">成都市青羊区民生里46号1栋2单元3层301号、307号</div>
											<div class="recommend-item-price">起拍价：237.76万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loading" ></div>
											<div class="recommend-item-title">成都市青羊区民生里46号1栋2单元2层201、207号</div>
											<div class="recommend-item-price">起拍价：254.85万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loading" ></div>
											<div class="recommend-item-title">大连市大连经济技术开发区鹏程家园45栋-1-2-4号房屋</div>
											<div class="recommend-item-price">起拍价：57万元</div>
										</a>
									</li>
									<li class="recommend-item">
										<a href="details.html" class="" target="_blank">
											<div class="recommend-item-img bg" lazy="loading" ></div>
											<div class="recommend-item-title">重庆市九龙坡区谢家湾正街55号21幢1-23-6号房屋</div>
											<div class="recommend-item-price">起拍价：100万元</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<footer>
					<div class="container position-relative">
						<div class="footer-widge">
							<a class="back-top-btn" style="display: none;"><i class="material-icons"></i></a>
						</div>
						<div class="footer-head">
							<a href="#" target="_blank">后台入口</a>
							<a href="#">关于我们</a>
							<a href="cooperation.html" class="" target="_blank">联系我们</a>
							<a href="#">招聘专区</a>
							<a href="#">网站地图</a>
							<span class="float-right"><i class="material-icons color-white" style="margin-right: 15px;">T</i> <span class="vertical-middle" style="font-size: 1.3em;">400 - 157 - 1060</span></span>
						</div>
						<div class="footer-body i-tab">
							<div class="footer-tab common-tab">
								<a class="footer-tab-btn common-tab-btn footer-tab-btn-active">热门城市</a>
								<a class="footer-tab-btn common-tab-btn">热门搜索</a>
							</div>
							<div class="footer-tab-item common-tab-item">
								<a href=" " title="北京" target="_self">北京</a>
								<a href=" " title="上海" target="_self">上海</a>
								<a href=" " title="广州" target="_self">广州</a>
								<a href=" " title="杭州" target="_self">杭州</a>
								<a href=" " title="宁波" target="_self">宁波</a>
								<a href=" " title="天津" target="_self">天津</a>
								<a href=" " title="南京" target="_self">南京</a>
								<a href=" " title="合肥" target="_self">合肥</a>
								<a href=" " title="苏州" target="_self">苏州</a>
								<a href=" " title="无锡" target="_self">无锡</a>
								<a href=" " title="福州" target="_self">福州</a>
								<a href=" " title="重庆" target="_self">重庆</a>
								<a href=" " title="长沙" target="_self">长沙</a>
								<a href=" " title="长春" target="_self">长春</a>
								<a href=" " title="成都" target="_self">成都</a>
								<a href=" " title="常州" target="_self">常州</a>
								<a href=" " title="大连" target="_self">大连</a>
								<a href=" " title="海口" target="_self">海口</a>
								<a href=" " title="贵阳" target="_self">贵阳</a>
								<a href=" " title="济南" target="_self">济南</a>
								<a href=" " title="兰州" target="_self">兰州</a>
								<a href=" " title="哈尔滨" target="_self">哈尔滨</a>
								<a href=" " title="呼和浩特" target="_self">呼和浩特</a>
								<a href=" " title="昆明" target="_self">昆明</a>
								<a href=" " title="拉萨" target="_self">拉萨</a>
								<a href=" " title="嘉兴" target="_self">嘉兴</a>
								<a href=" " title="南昌" target="_self">南昌</a>
								<a href=" " title="南宁" target="_self">南宁</a>
								<a href=" " title="石家庄" target="_self">石家庄</a>
								<a href=" " title="沈阳" target="_self">沈阳</a>
								<a href=" " title="太原" target="_self">太原</a>
								<a href=" " title="绍兴" target="_self">绍兴</a>
								<a href=" " title="武汉" target="_self">武汉</a>
								<a href=" " title="西安" target="_self">西安</a>
								<a href=" " title="西宁" target="_self">西宁</a>
								<a href=" " title="乌鲁木齐" target="_self">乌鲁木齐</a>
								<a href=" " title="郑州" target="_self">郑州</a>
							</div>
							<!---->
						</div>
						<div class="footer-footer">
							<a href="http://www.chinacourt.org/index.shtml" target="_blank" rel="nofollow">中国法院网</a>
							<a href="http://www.zjcourt.cn/" target="_blank" rel="nofollow">浙江法院新闻网</a>
							<a href="http://shfy.chinacourt.org/index.shtml" target="_blank" rel="nofollow">上海法院网</a>
							<a href="http://www.jsfy.gov.cn/" target="_blank" rel="nofollow">江苏法院网</a>
							<a href="http://bjgy.chinacourt.org/index.shtml" target="_blank" rel="nofollow">北京法院网</a>
							<a href="http://www.gdcourts.gov.cn/gdgy/s" target="_blank" rel="nofollow">广东法院网</a>
							<a href="http://www.tmsf.com/" target="_blank" rel="nofollow">透明售房网</a>
							<a href="http://www.zjpse.com/" target="_blank" rel="nofollow">浙江产权交易所</a>
							<a href="http://www.cbex.com.cn/" target="_blank" rel="nofollow">北京产权交易所</a>
						</div>
						<div class="copyright">
							<p>© Copyright 2016  laipaiya.com 版权所有 杭州网络科技有限公司 | 浙ICP备15004499号-1 |
								<a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33010602002655">浙公网安备 33010602002655号</a>
							</p>
						</div>
					</div>
				</footer>
			</div>
			<!---->
			<!---->
			<!---->
		</div>
	</body>

</html>