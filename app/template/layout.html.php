<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>AppName</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="images/favicon.png">

		<?php /* 
		// Remove for now as there are no bower css files.
		<!-- build:css styles/vendor.css -->
		<!-- bower:css -->
		<!-- endbower -->
		<!-- endbuild -->
		*/ ?>

		<!-- build:css({.tmp,app}) styles/main.css -->
		<link rel="stylesheet" href="styles/main.css">
		<!-- endbuild -->
	</head>
	<body ng-app="appNameApp">
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<div ng-controller="MainCtrl">
			<!-- Header Bar -->
			<?php $view['slots']->output('header') ?>

			<!-- Content -->
			<div class="container">
				<?php $view['slots']->output('body') ?>
			</div>
		</div>

		<!--[if lt IE 9]>
		<script src="bower_components/es5-shim/es5-shim.js"></script>
		<script src="bower_components/json3/lib/json3.min.js"></script>
		<![endif]-->

		<!-- build:js(web) scripts/vendor.js -->
		<!-- bower:js -->
		<script src="bower_components/jquery/dist/jquery.js"></script>
		<script src="bower_components/angular/angular.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/affix.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/alert.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/button.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/carousel.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/collapse.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/dropdown.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/tab.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/transition.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/scrollspy.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/modal.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/tooltip.js"></script>
		<script src="bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/popover.js"></script>
		<script src="bower_components/angular-resource/angular-resource.js"></script>
		<script src="bower_components/angular-cookies/angular-cookies.js"></script>
		<script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
		<script src="bower_components/angular-route/angular-route.js"></script>
		<!-- endbower -->
		<!-- endbuild -->


		<!-- build:js({.tmp,web}) scripts/scripts.js -->
		<script src="scripts/app.js"></script>
		<script src="scripts/controllers/main.js"></script>
		<script src="scripts/controllers/content.js"></script>
		<!-- endbuild -->

		<?php /* @if DEBUG */ ?>
		<script src="http://localhost:35729/livereload.js"></script>
		<?php /* @endif */ ?>
	</body>
</html>
