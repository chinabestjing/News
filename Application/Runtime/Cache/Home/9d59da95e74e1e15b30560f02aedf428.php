<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<meta charset="utf-8">
		<title>法院监管</title>
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css">
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css">
		<!--<script src="https://hm.baidu.com/hm.js?25267f815d19ca3f16af3eea13a101b8"></script>-->
		<!--<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "https://hm.baidu.com/hm.js?25267f815d19ca3f16af3eea13a101b8";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>-->
	</head>

	<body class="login_bgbox">
		<div class="container_wrapper">
			<div class="login_wrap">
				<div class="login_title">
					法院委托监管平台
				</div>
				<div class="login_content">
					<div class="login_content--box">
						<form action="#" method="post" id="loginForm">
							<div class="login_input--title" style=" width: 50%; color: #E53935; font-size: 20px; text-align: center; padding: 60px 15px 12px 35px;">用户登录</div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<input id="tbUserName" type="text" name="user_name" style=" display: flex; padding: 10px 15px 12px 120px;"  placeholder="请输入手机号" class="login--user">
							<input id="tbPassWord" type="password" name="pass_word" style=" display: flex; padding: 10px 15px 12px 120px;" placeholder="请输入密码" class="login--pwd">
							<input id="open_key" type="hidden" name="openkey" value="">
							<!-- <input id="userid" type="hidden" name="userid" value /> -->
							<div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<a href="" id="btnLogin" class="login--subimt" onclick="document.getElementById('loginForm').submit();" style=" font-size: 20px; display: flex; width: 50%;background-color: #DC2625; color: white; padding: 10px 15px 12px 23%;">登&nbsp;&nbsp;录</a>
							</div>
							<div class="unlogin_tip"></div>
						</form>
					</div>
					<!-- <center>测试:zjgy/123456</center> -->
					<div class="loginpage-qrcode bg">
						<div class="loginpage-qrcode-wrap">
							<p style="text-align: center;margin-top: 50px;">扫一扫下载法院监管APP</p>
							<div class="loginpage-qrcode-ex bg"></div>
						</div>
					</div>
				</div>
				<style>
					.bg {
						background-position: center;
						background-repeat: no-repeat;
						background-size: cover;
					}
					
					.loginpage-qrcode {
						width: 50px;
						height: 50px;
						position: absolute;
						left: 10px;
						bottom: 29px;
						background-image: url("img/loginpage-qrcode.png");
					}
					
					.loginpage-qrcode:hover .loginpage-qrcode-wrap {
						display: block;
					}
					
					.loginpage-qrcode-wrap {
						background-color: white;
						height: 365px;
						width: 390px;
						display: none;
						position: absolute;
						bottom: 0;
						left: 0;
					}
					
					.loginpage-qrcode-ex {
						width: 200px;
						height: 200px;
						margin: 15px 15px 80px 95px;
						background-image: url("img/wechatcode.jpg");
					}
				</style>

			</div>
			<!-- container_wrapper/主体  onclick="document.getElementById('sform').submit();"-->
		</div>
		<script type="text/javascript" src="/Public/Home/js/jquery-2.1.4.min.js"></script>
		<script>
			/*function sub(){alert(22);submit();}*/
			$(function() {
				$(".login--subimt").click(function(e) {
					e.preventDefault();

					var nameStr = $(".login--user").val();
					var pwdStr = $(".login--pwd").val();

					if(nameStr == '') {
						$(".unlogin_tip").html("请输入用户名");
						return;
					}
					if(pwdStr == '' || pwdStr.length < 4 || pwdStr.length > 18) {
						$(".unlogin_tip").html("请输入长度为4-18位的密码");
						return;
					}

					$(".unlogin_tip").html("");

					// 表单请求写在下面

				});
			});
		</script>

		<script src="" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#bt22nLogin").click(function() {
					var uid = $("#tbUserName").val();
					var pwd = $("#tbPassWord").val();
					// var verify = $("#tbVerify").val();
					if(uid == "") {
						//layer.msg("请输入账户！", { icon: 5 });
						return false;
					}
					if(pwd == "") {
						//layer.msg("请输入密码！", { icon: 5 });
						return false;
					}
					// if (verify == "") {
					//layer.msg("请输入验证码！", { icon: 5 });
					//    return false;
					//}

					var wcfLeft = "http://wcf.laipaiya.com/php";
					var url = wcfLeft + "/CourtHandler.ashx?temp=" + (new Date()).getTime();
					url += "&func=JudgeLogin";
					url += "&UserName=" + uid + "&PassWord=" + pwd;
					$.ajax({
						type: "get",
						async: false,
						url: url,
						dataType: "jsonp",
						jsonp: "jsoncallback",
						jsonpCallback: "success_jsonpCallback",
						success: function(json) {
							var result = json.success;
							if(result == 0) {
								alert(json.error);
								// layer.msg(json.error, { icon: 5 });
								return false;
							} else if(result == 1) {
								$("#open_key").val(json.openkey);
								// $("#userid").val(json.id);
								$("#loginForm").submit();
								return true;
							}
						}

					});
					return false;
				});
			});
		</script>

	</body>

</html>