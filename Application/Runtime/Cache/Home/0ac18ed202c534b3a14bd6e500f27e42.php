<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--loading css-->
<link href="/test/Public/vendor/loading/loading.css" rel="stylesheet" />
<link href="/test/Public/css/font-awesome.min.css" rel="stylesheet">
<link href="/test/Public/css/animate.css" rel="stylesheet">
<link href="/test/Public/css/style.css" rel="stylesheet">
<!--ydui-->
<link href="/test/Public/css/ydui.css" rel="stylesheet">
		<title>登录</title>
		<style>
			body{
				background: url("/test/Public/img/home/register.png");
				background-size: 100% 100%;
			}
			
			.container {
				padding: 9.6rem 0.48rem 0 0.48rem;
			}
			
			.enter>input{
				height: 1.62rem;
				width: 100%;
				border:0;
				margin-bottom: 0.68rem;
				background: url("/test/Public/img/home/phone.png") no-repeat;
				background-size: 6%;
				background-position: 0.46rem;
				background-color: #FCFCFC;
				padding-left: 1.72rem;
				font-size: 0.5rem;
			}
			
			.enter2>input{
				height: 1.62rem;
				width: 100%;
				border:0;
				margin-bottom: 0.68rem;
				background: url("/test/Public/img/home/lock.png") no-repeat;
				background-size: 6%;
				background-position: 0.46rem;
				background-color: #FCFCFC;
				padding-left: 1.72rem;
				font-size: 0.5rem;
			}
			
			input::-webkit-input-placeholder {
				color: #bfbfbf;
			}
			
			.btn1{
				height:1.62rem;
				width:100%;
				font-size: 0.56rem;
				background-color: #679Eff;
				text-align: center;
				line-height: 1.6rem;
				color: #FFFFFF;
				border-radius: 0.1rem;
				margin-bottom: 0.68rem;
			}
			
			.btn2{
				display: flex;
				justify-content: space-between;
			}
			
			.sub-btn2{
				height:1.62rem;
				width: 5.46rem;
				font-size: 0.56rem;
				background-color: #FFFFFF;
				text-align: center;
				line-height: 1.6rem;
				border-radius: 0.1rem;
				color: #333333;
			}
			
			a{
				display: block;
				height: 100%;
				width: 100%;
			}
			
		</style>
	</head>
	<body>
		<!-- <div style="font-size: 1rem;">我是会随分辨率变化的字体</div> -->
		<div class='container'>
			<form id='login'>
				<div class='enter'>
					<input class='acc' placeholder="请输入手机号"></input>
				</div>
				<div class='enter2'>
					<input class='pwd' placeholder="请输入密码" type="password"></input>
				</div>
				<div class='btn1'>
					<a onclick="checkLogin()">登录</a>
				</div>
				<div class='btn2'>
					<div class='sub-btn2'>
						<a>忘记密码</a>
					</div>
					<div class='sub-btn2'>
						<a>注册</a>
					</div>
				</div>
			</form>
		</div>
	</body>

	<script src="/test/Public/js/jquery.min.js?v=2.1.4"></script>
<script>
	var resizeWaiter = undefined;
	$(document).ready(function() {
		setRootFontSize();
	})
	$(window).on('resize', function() {
		if(!resizeWaiter) {
			resizeWaiter = true;
			//优化，限制图表resize的频率
			setTimeout(function() {
				/*---------在以下写要执行的代码-------*/
				setRootFontSize();
				/*---------在以上写要执行的代码-------*/
				resizeWaiter = false;
			}, 100);
		}
	})

	function setRootFontSize() {
		//rem布局设置宽高比
		//没有得到信息，目前按照宽1920时100像素等比缩放
		var html = document.getElementsByTagName('html')[0];
		var needWidth = 0;
		if(window.innerWidth)
			needWidth = window.innerWidth;
		else if((document.body) && (document.body.clientWidth))
			needWidth = document.body.clientWidth;
		else if(document.documentElement && document.documentElement.clientHeight && document.documentElement.clientWidth)
			needWidth = document.documentElement.clientWidth;
		html.style.fontSize = 100 / 1242 * needWidth + 'px';
	}
</script>


<script src="/test/Public/vendor/loading/loading.js"></script>

	<script type="text/javascript" src="/test/Public/js/ydui.js"></script>
	<script>
		function checkLogin() {
			var account = $('.acc').val();
			var pwd = $('.pwd').val();
			if (account == '' || account == null) {
				YDUI.dialog.toast('请输入手机号', 'none', 1000);
				return;
			}
			if (pwd == '' || pwd == null) {
				YDUI.dialog.toast('请输入密码', 'none', 1000);
				return;
			}
			$.ajax({
				data: {
					account: account,
					pwd: pwd
				},
				type: "POST",
				dataType: "JSON",
				url: '/test/index.php/Home/Lesson2/loginCheck',
				success: function(result) {
					if (result.state == true) {
						window.location.href = "/test/index.php/Home/HomePage/index";
					} else {
						YDUI.dialog.toast(result.info, 'error', 1000);
					}
				}
			}); // end ajax
		}
	</script>

</html>