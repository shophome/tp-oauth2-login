<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>授权登录测试</title>
</head>
<body>
	<script src="/git/tp-oauth2-login/test/tp-login-test/Public/assets/jquery/jquery.min.js"></script>
	<script src="/git/tp-oauth2-login/test/tp-login-test/Public/assets/jquery/jquery.cookie.js"></script>
	<script>
		// oauth服务器登录页面地址，不包含参数
		var serverLoginUrl = 'http://localhost/git/tp-oauth2-login/src/tp-oauth2-login/index.php/login';
		// 服务器完成操作后的回调地址
		var callbackUrl = 'http://localhost/git/tp-oauth2-login/test/tp-login-test/index.php/callback';
		var userInfo = $.cookie('user_info');
		console.log( userInfo);
		if(userInfo != '' && typeof userInfo != 'undefined'){
			var obj = eval( '(' + userInfo + ')');
			$('body').append('欢迎您，' + obj['user_account']);
			$('body').append('<a class="logout" href="javascript:;" style="padding: 0 10px;">登出</a>');
			$('a.logout').on('click',function(){
				// 这里取消cookie即可
				$.cookie('user_info','',{expires: 7,path: '/'});
				location.reload();
			});
		}else{
			
			$('body').append('<a href="'+ serverLoginUrl +'?client_id=demoapp&client_secret=demopass&redirect_uri='+ callbackUrl +'&response_type=code&state=STATE">点击这里开启蟋蚁博客登录</a>');
		}
		
	</script>
</body>
</html>