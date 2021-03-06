<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/text.css">
		<meta charset="utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>招聘英才</title>
		<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
		<script src="https://hm.baidu.com/hm.js?25267f815d19ca3f16af3eea13a101b8"></script>
		<script async="" charset="utf-8" src="js/udeskApi.js"></script>
		<script src="/Public/Home/js/redirect.js"></script>
		<script src="/Public/Home/js/polyfill.min.js"></script>
		<script src="/Public/Home/js/jquery-2.1.4.min.js"></script>
		<script src="/Public/Home/js/common.js"></script>
		<style type="text/css">
			.alert-wrap {
				height: 662px
			}
		</style>
		<link href="/Public/Home/css/one.css" rel="stylesheet">
		<script src="http://laipaiya.udesk.cn/spa1/im_web_plugins/35953/out_config?company_code=1ia1f2dg&amp;language=&amp;session_key=&amp;callback=udesk_jsonp0"></script>
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
		<!--<script type="text/javascript" async="" defer="" src="https://webapi.amap.com/maps?key=6443f56a57a90c9887f779e12145327a&amp;v=1.3&amp;plugin=AMap.Autocomplete,AMap.PlaceSearch,AMap.Scale,AMap.OverView,AMap.ToolBar,AMap.MapType,AMap.PolyEditor,AMap.CircleEditor,AMap.Autocomplete,AMap.PlaceSearch,AMap.PolyEditor,AMap.CircleEditor&amp;callback=amapInitComponent"></script>-->
		<!--<script src="js/two.js"></script>-->
		<style type="text/css">
			.amap-container {
				cursor: url(https://webapi.amap.com/theme/v1.3/openhand.cur), default;
			}
			
			.amap-drag {
				cursor: url(https://webapi.amap.com/theme/v1.3/closedhand.cur), default;
			}
		</style>
		<meta name="keywords" content="司法拍卖辅助平台" data-vue-meta="true">
		<meta name="description" content="司法拍卖辅助平台" data-vue-meta="true">
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
						<div class="login-wrap">
							<div class="login-window i-tab">
								<div class="common-tab">
									<div class="common-tab-btn sign-login-btn login-sign-active">用户登录</div>
									<div class="common-tab-btn sign-login-btn">用户注册</div>
								</div>
								<div class="common-tab-item" style="display: block;"><input type="text" placeholder="请输入手机号码" class="input-border m-t-60"> <input type="text" placeholder="请输入登录密码" class="input-border m-t-20">
									<div class="btn btn-red m-t-20 cursor-pointer">登录</div>
								</div>
								<div class="common-tab-item"><input type="text" placeholder="请输入手机号码" class="input-border m-t-20 sign-phonenum">
									<div class="position-relative"><input type="text" class="input-border m-t-20"> <span class="color-white bg-red get-phone-code-btn">获取验证码</span></div> <input type="text" placeholder="请输入登录密码" class="input-border m-t-20"> <input type="text" placeholder="请重新输入密码" class="input-border m-t-20">
									<div class="btn btn-red m-t-20 cursor-pointer">注册</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="aboutus-tab">
					
					<a class="aboutus-tab-item">
						<p class="color-red">招聘英才</p>
						<p class="color-red">SOCIAL RECRUITMENT</p>
					</a>
					
				</div>
				<div class="min-height">
					<!--<div style="display: none;">
						<div class="connect-image"></div>
						<div class="corporation">
							<div class="container clear-both">
								<div class="connect-block">
									<div class="connect-block-title">
										法院入驻
									</div>
									<div class="connect-block-txt">
										网络平台可为法院构建起包含驻点、勘验、看样及数据处理等全方位的司法网拍辅助模式，若贵法院有司法网拍线下服务需求，请点击下方的入驻申请按钮，填写基本资料，平台将立即与您取得联系安排上门演示汇报。
									</div>
									<div class="btn btn-red connect-ruzhu-application-btn">入驻申请</div>
								</div>
								<div class="connect-block">
									<div class="connect-block-title">
										合作加盟
									</div>
									<div class="connect-block-txt">
										如果贵公司希望与我们进行优势互补，建立商务合作关系，请点击下方按钮，填写贵公司的基本信息，我们将尽快与您联系。
									</div>
									<div class="btn btn-red connect-jiameng-application-btn">加盟申请</div>
								</div>
								<div class="connect-block">
									<div class="connect-block-title">
										投资机会
									</div>
									<div class="connect-block-txt">
										对特殊资产有投资意向的客户，请留下您的联系方式，我们将安排专人与您联系，为您提供量身定制的特殊资产投资机会
									</div>
									<div class="btn btn-red connect-jiameng-application-btn">投资机会</div>
								</div>
								<div class="connect-block">
									<div class="connect-block-title">
										咨询客服
									</div>
									<div class="connect-block-txt">
										如果您对参拍流程、意向标的物有任何疑问，或者需要了解我们的法拍服务内容，非常欢迎您直接与我们联络，我们将竭诚为您解答。
									</div>
									<div class="connect-block-txt">
										联系电话：400-157-1060
									</div>
								</div>
							</div>
						</div>
					</div>-->
					<div style="">
						<div class="bg" style="width: 100%; height: 300px; z-index: 6; background-image: url(__Public__/Home/img/financebanner.jpg);"></div>
						<div class="container" style="background-color: white; z-index: 10; margin-bottom: 100px;">
							<table class="joblist" style="margin-top: -100px; background-color: white;">
								<tr>
									<th>职位名称</th>
									<th>岗位类型</th>
									<th>应聘部门</th>
									<th>工作地点</th>
									<th>发布时间</th>
									<th>申请职位</th>
								</tr>
								<tr>
									<td>法院服务督导</td>
									<td>全职</td>
									<td>运营服务部</td>
									<td>杭州市</td>
									<td>2017-11-10 11:26:24</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
								<tr>
									<td>呼叫中心客服（仅呼入）</td>
									<td>全职</td>
									<td>运营服务部</td>
									<td>杭州市</td>
									<td>2017-11-10 11:25:08</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
								<tr>
									<td>客服顾问（高薪急聘）</td>
									<td>全职</td>
									<td>运营服务部</td>
									<td>杭州市</td>
									<td>2017-11-10 11:23:52</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
								<tr>
									<td>法院拓展主任</td>
									<td>全职</td>
									<td>市场拓展部</td>
									<td>杭州市</td>
									<td>2017-11-10 11:22:31</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
								<tr>
									<td>金融事业部总经理</td>
									<td>全职</td>
									<td>金融服务部</td>
									<td>杭州市</td>
									<td>2017-11-10 11:19:06</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
								<tr>
									<td>数据挖掘工程师</td>
									<td>全职</td>
									<td>数据技术部</td>
									<td>杭州市</td>
									<td>2017-11-10 11:17:32</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
								<tr>
									<td>司法网拍专员（新沂市）</td>
									<td>全职</td>
									<td>运营服务部</td>
									<td>徐州市</td>
									<td>2017-11-10 11:15:56</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
								<tr>
									<td>PHP工程师</td>
									<td>全职</td>
									<td>数据技术部</td>
									<td>杭州市</td>
									<td>2017-11-10 11:15:36</td>
									<td>
										<a class="color-red cursor-pointer" href="ZHAOP.html" target="_blank">申请职位</a>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="container position-relative" style="display: none;">
						<p class="jobdetail-title"></p>
						<p class="jobp">岗位类型：</p>
						<p class="jobp">工作部门：</p>
						<p class="jobp">招聘人数：</p>
						<p class="jobp">发布时间：</p>
						<p class="jobp">经验要求：</p>
						<p class="jobp">工作地点：</p>
						<p class="jobdetail-text" style="margin-top: 30px;"></p>
						<div class="jobback">返回列表</div>
					</div>
				</div>
				<div style="display: none;">
					<div class="alert-wrap">
						<div class="center-panel corporation-panel">
							<p class="size1_3em m-b-15 text-center m-t-5">法院入驻申请</p> <input type="text" placeholder="请输入法院名称" class="input-style">
							<div class="m-t-15 clear-both">
								<div class="corporationProvince">
									<div class="select-style"><span class="select-placeholder">法院所在省</span> <i class="material-icons select-arrow-icon">arrow_drop_down</i>
										<div class="select-dropdown-container">
											<ul class="select-dropdown">
												<li class="">北京</li>
												<li class="">天津</li>
												<li class="">河北</li>
												<li class="">山西</li>
												<li class="">内蒙古</li>
												<li class="">辽宁</li>
												<li class="">吉林</li>
												<li class="">黑龙江</li>
												<li class="">上海</li>
												<li class="">江苏</li>
												<li class="">浙江</li>
												<li class="">安徽</li>
												<li class="">福建</li>
												<li class="">江西</li>
												<li class="">山东</li>
												<li class="">河南</li>
												<li class="">湖北</li>
												<li class="">湖南</li>
												<li class="">广东</li>
												<li class="">广西</li>
												<li class="">海南</li>
												<li class="">重庆</li>
												<li class="">四川</li>
												<li class="">贵州</li>
												<li class="">云南</li>
												<li class="">西藏</li>
												<li class="">陕西</li>
												<li class="">甘肃</li>
												<li class="">青海</li>
												<li class="">宁夏</li>
												<li class="">新疆</li>
												<li class="">台湾</li>
												<li class="">澳门</li>
												<li class="">香港</li>
												<li class="">钓鱼岛</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="corporationCity">
									<div class="select-style"><span class="select-placeholder">法院所在市</span> <i class="material-icons select-arrow-icon">arrow_drop_down</i>
										<div class="select-dropdown-container">
											<ul class="select-dropdown"></ul>
										</div>
									</div>
								</div>
							</div> <input type="text" placeholder="联系人姓名" class="input-style m-t-15"> <input type="text" placeholder="联系人电话号码" class="input-style m-t-15">
							<div class="position-relative m-t-15"><input type="text" placeholder="请输入验证码" class="input-style">
								<div class="get-phone-code-btn">点击获取验证码</div>
							</div>
							<div class=" btn  link-disabled m-t-15">请将资料填写完整</div>
						</div>
					</div>
				</div>
				<div style="display: none;">
					<div class="alert-wrap">
						<div class="center-panel corporation-panel business-panel">
							<p class="size1_3em m-b-15 text-center m-t-5">合作加盟</p>
							<div class="m-t-15 clear-both">
								<div class="corporationProvince">
									<div class="select-style"><span class="select-placeholder">法院所在省</span> <i class="material-icons select-arrow-icon">arrow_drop_down</i>
										<div class="select-dropdown-container">
											<ul class="select-dropdown">
												<li class="">北京</li>
												<li class="">天津</li>
												<li class="">河北</li>
												<li class="">山西</li>
												<li class="">内蒙古</li>
												<li class="">辽宁</li>
												<li class="">吉林</li>
												<li class="">黑龙江</li>
												<li class="">上海</li>
												<li class="">江苏</li>
												<li class="">浙江</li>
												<li class="">安徽</li>
												<li class="">福建</li>
												<li class="">江西</li>
												<li class="">山东</li>
												<li class="">河南</li>
												<li class="">湖北</li>
												<li class="">湖南</li>
												<li class="">广东</li>
												<li class="">广西</li>
												<li class="">海南</li>
												<li class="">重庆</li>
												<li class="">四川</li>
												<li class="">贵州</li>
												<li class="">云南</li>
												<li class="">西藏</li>
												<li class="">陕西</li>
												<li class="">甘肃</li>
												<li class="">青海</li>
												<li class="">宁夏</li>
												<li class="">新疆</li>
												<li class="">台湾</li>
												<li class="">澳门</li>
												<li class="">香港</li>
												<li class="">钓鱼岛</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="corporationCity">
									<div class="select-style"><span class="select-placeholder">法院所在市</span> <i class="material-icons select-arrow-icon">arrow_drop_down</i>
										<div class="select-dropdown-container">
											<ul class="select-dropdown"></ul>
										</div>
									</div>
								</div>
							</div> <input type="text" placeholder="您的公司名称或主体类型" class="input-style m-t-15"> <input type="text" placeholder="您的公司的统一社会信用代码或营业执照代码（选填）" class="input-style m-t-15"> <input type="text" placeholder="联系人姓名" class="input-style m-t-15"> <input type="text" placeholder="联系人电话号码" class="input-style m-t-15">
							<div class="position-relative m-t-15"><input type="text" placeholder="请输入验证码" class="input-style">
								<div class="get-phone-code-btn">点击获取验证码</div>
							</div>
							<div class=" btn  link-disabled m-t-15">请将资料填写完整</div>
						</div>
					</div>
				</div>
				<div addressjson="[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object]" style="display: none;">
					<div class="alert-wrap">
						<div class="center-panel corporation-panel invest-panel">
							<p class="size1_3em text-center ">投资机会</p> <input type="text" placeholder="投资主体（您的公司名称或主体类型）" class="input-style m-t-15"> <input type="text" placeholder="联系人姓名" class="input-style m-t-15"> <input type="text" placeholder="联系人电话号码" class="input-style m-t-15"> <input type="text" placeholder="关注地区" class="input-style m-t-15">
							<p class="corporation-checkbox-title m-t-10 m-b-5">意向标的物类型（可多选）</p>
							<div class="corporation-invest-checkbox">
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">房产</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">机动车</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">土地</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">船舶</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">资产</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">无形资产</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">债权</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">股权</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">林权</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
								<div class="checkbox-multiply-item">
									<p class="checkbox-multiply-title">矿权</p>
									<p class="checkbox-multiply-description"></p> <i class="material-icons checkbox-multiply-icon">check</i></div>
							</div> <input type="text" placeholder="计划投资总额度" class="input-style m-t-5"> <input type="text" placeholder="单笔投资额度" class="input-style m-t-15"> <input type="text" placeholder="特殊需求说明" class="input-style m-t-15">
							<div class="position-relative m-t-15"><input type="text" placeholder="请输入验证码" class="input-style">
								<div class="get-phone-code-btn">点击获取验证码</div>
							</div>
							<div class=" btn  link-disabled m-t-15">请将资料填写完整</div>
						</div>
					</div>
				</div>
				<footer>
					<div class="container position-relative">
						<div class="footer-widge">
							<a class="back-top-btn" style="display: none;"><i class="material-icons">keyboard_arrow_up</i></a>
						</div>
						<div class="footer-head">
							<a href="http://admin.laipaiya.com" target="_blank">后台入口</a>
							<a href="">关于我们</a>
							<a href="corporation" class="router-link-active" target="_blank">联系我们</a>
							<a href="">招聘专区</a>
							<a href="">网站地图</a>
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
		<!--<script>
			(function(a, h, c, b, f, g) { a["UdeskApiObject"] = f;
				a[f] = a[f] || function() {
					(a[f].d = a[f].d || []).push(arguments) };
				g = h.createElement(c);
				g.async = 1;
				g.charset = "utf-8";
				g.src = b;
				c = h.getElementsByTagName(c)[0];
				c.parentNode.insertBefore(g, c) })(window, document, "script", "js/udeskApi.js", "ud");
			ud({
				"code": "1ia1f2dg",
				"link": "//laipaiya.udesk.cn/im_client?web_plugin_id=35953"
			});
		</script>
		<script type="text/javascript" src="js/manifest.js"></script>
		<script type="text/javascript" src="js/vendor.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "https://hm.baidu.com/hm.js?25267f815d19ca3f16af3eea13a101b8";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>-->
		<!--<div id="udesk_container">
			<div id="udesk_btn">
				<a style="display: block; position: fixed; box-sizing: border-box; font-size: 13px; color: rgb(255, 255, 255); text-align: center; cursor: pointer; text-decoration: none; z-index: 1000000000; right: 0px; top: 160.758px; margin-right: 5px; width: 70px;"></a>
			</div>
			<div id="udesk_panel" style="position:fixed;bottom:0;right:60px;z-index:-1;width:320px;height:480px;overflow:hidden;display:none;background-color:transparent;box-shadow:0 0 20px 0 rgba(0, 0, 0, .15);border:1px solid #ddd\9;"><iframe id="udesk_iframe" frameborder="0" scrolling="no" allowtransparency="true" style="width:100%;height:100%;border:none;padding:0;margin:0;float:none;background:none;" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="http://laipaiya.udesk.cn/im_client/?web_plugin_id=35953&amp;cur_title=%E6%9D%A5%E6%8B%8D%E5%91%80%20-%20%E5%8F%B8%E6%B3%95%E6%8B%8D%E5%8D%96%E6%9C%8D%E5%8A%A1%E4%B8%93%E5%AE%B6&amp;src_url=&amp;cur_url=http%253A%252F%252Fwww.laipaiya.com%252F%2523%252F&amp;pre_url=http%3A%2F%2Fwww.laipaiya.com%2F%23%2F&amp;currentMode=inner&amp;free=noAgent"></iframe></div>
		</div>-->
	</body>

</html>