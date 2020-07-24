<?php 
require_once 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login | Doctor T </title>

	<!-- <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png"> -->
  	<link rel="shortcut icon" href="../images/doctor-logo.png">

  	<!-- Stylesheets -->
  	<link rel="stylesheet" href="assets/css/bootstrap.css?v4.0.2">
  	<link rel="stylesheet" href="assets/css/bootstrap-extend.css?v4.0.2">
  	<link rel="stylesheet" href="assets/css/site.css?v4.0.2">

  	<!-- Skin tools (demo site only) -->
  	<link rel="stylesheet" href="assets/css/skintools.min.css?v4.0.2">
  	<script src="../assets/js/Plugin/skintools.js?v4.0.2"></script>

  	<!-- Plugins -->
  	<link rel="stylesheet" href="vendor/animsition/animsition.min.css?v4.0.2">
  	<link rel="stylesheet" href="vendor/asscrollable/asScrollable.min.css?v4.0.2">
  	<link rel="stylesheet" href="vendor/switchery/switchery.min.css?v4.0.2">
  	<link rel="stylesheet" href="vendor/intro-js/introjs.min.css?v4.0.2">
  	<link rel="stylesheet" href="vendor/slidepanel/slidePanel.min.css?v4.0.2">
  	<link rel="stylesheet" href="vendor/flag-icon-css/flag-icon.min.css?v4.0.2">

  	<!-- Page -->
  	<link rel="stylesheet" href="assets/css/login.css?v4.0.2">

  	<!-- Fonts -->
  	<link rel="stylesheet" href="assets/fonts/web-icons/web-icons.css?v4.0.2">
  	<link rel="stylesheet" href="assets/fonts/brand-icons/brand-icons.css?v4.0.2">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
</head>

<body class="animsition page-login layout-full page-dark" style="animation-duration: 800ms; opacity: 1;">
	<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
		<div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
			<div class="brand">
				<img class="brand-img" src="../images/doctor-logo.png" alt="...">
				<h2 class="brand-text">Doctor T</h2>
			</div>

			<div class="text-center">
				<form method="post" action="">
					<div class="form-group">
						<label class="sr-only" for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label class="sr-only" for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<input type="hidden" id="is_login" name="is_login" value="1" />
					<button type="submit" class="btn btn-primary btn-block">Sign in</button>
				</form>
			</div>			

			<footer class="page-copyright page-copyright-inverse">
				<p>Website By Brick House Solutions Co., Ltd.</p>
				<p>© 2019. All RIGHT RESERVED.</p>
			</footer>
		</div>
	</div>
	<!-- End Page -->

	<!-- Core-->
	<script src="vendor/babel-external-helpers/babel-external-helpers.js?v4.0.2"></script>
	<script src="vendor/jquery/jquery.min.js?v4.0.2"></script>
	<script src="vendor/popper-js/umd/popper.min.js?v4.0.2"></script>
	<script src="vendor/bootstrap/bootstrap.min.js?v4.0.2"></script>
	<script src="vendor/animsition/animsition.min.js?v4.0.2"></script>
	<script src="vendor/mousewheel/jquery.mousewheel.js?v4.0.2"></script>
	<script src="vendor/asscrollbar/jquery-asScrollbar.min.js?v4.0.2"></script>
	<script src="vendor/asscrollable/jquery-asScrollable.min.js?v4.0.2"></script>
	<script src="vendor/ashoverscroll/jquery-asHoverScroll.min.js?v4.0.2"></script>

	<!-- Plugins -->
	<script src="vendor/switchery/switchery.min.js?v4.0.2"></script>
	<script src="vendor/intro-js/intro.min.js?v4.0.2"></script>
	<script src="vendor/screenfull/screenfull.js?v4.0.2"></script>
	<script src="vendor/slidepanel/jquery-slidePanel.min.js?v4.0.2"></script>

	<!-- Plugins For This Page -->
	<script src="vendor/jquery-placeholder/jquery.placeholder.js?v4.0.2"></script>

	<!-- Scripts -->
	<script src="assets/js/Component.js"></script>	
	<script src="assets/js/Plugin.js"></script>
	<script src="assets/js/Base.js"></script>
	<script src="assets/js/Config.js"></script>

	<script src="assets/js/Section/Menubar.js"></script>
	<script src="assets/js/Section/GridMenu.js"></script>
	<script src="assets/js/Section/Sidebar.js"></script>
	<script src="assets/js/Section/PageAside.js"></script>
	<script src="assets/js/Plugin/menu.js"></script>

	<!-- Config -->
	<script src="assets/js/config/colors.js?v4.0.2"></script>
	<script src="assets/js/config/tour.js?v4.0.2"></script>
	<script>
	Config.set('assets', '../assets');
	</script>

	<!-- Page -->
	<script src="assets/js/Site.js"></script>
	<script src="assets/js/Plugin/asscrollable.js"></script>
	<script src="assets/js/Plugin/slidepanel.js"></script>
	<script src="assets/js/Plugin/switchery.js"></script>
	<script src="assets/js/Plugin/matchheight.js"></script>
</body>
</html>
 