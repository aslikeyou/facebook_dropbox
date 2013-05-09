<?php
	require './init.php';

	$app = Core::app();
	$fbConfig = $app->getConfig('fb');
	$appId = $fbConfig['appId'];
	$secret = $fbConfig['secret'];
	$accessToken = $app->getDb()->query("SELECT value FROM app_data WHERE field = 'access_token'")->fetchColumn();
	print_r($accessToken);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootstrap, from Twitter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
	<style>
		body {
			padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		}
	</style>
	<link href="./bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="./bootstrap/js/html5shiv.js"></script>
	<![endif]-->

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="./bootstrap/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="./bootstrap/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="./bootstrap/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="./bootstrap/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="./bootstrap/ico/favicon.png">
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="#">Facebook sync with Dropbox</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="/getAccessToken.php">Get Access Token</a></li>
					<li><a href="/subscribeForUpdates.php">Subscribe for updates</a></li>
					<li><a href="/enquireSubscription.php">Enquiring the Current Subscription</a></li>
					<li><a href="/deleteSubscription.php">Deleting the Current Subscription</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>

<div class="container">

	<h1>Facebook sync with Dropbox</h1>
	<p>На этой странице будет отображаться дополнительная информации по приложению.</p>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./bootstrap/js/jquery.js"></script>
<script src="./bootstrap/js/bootstrap-transition.js"></script>
<script src="./bootstrap/js/bootstrap-alert.js"></script>
<script src="./bootstrap/js/bootstrap-modal.js"></script>
<script src="./bootstrap/js/bootstrap-dropdown.js"></script>
<script src="./bootstrap/js/bootstrap-scrollspy.js"></script>
<script src="./bootstrap/js/bootstrap-tab.js"></script>
<script src="./bootstrap/js/bootstrap-tooltip.js"></script>
<script src="./bootstrap/js/bootstrap-popover.js"></script>
<script src="./bootstrap/js/bootstrap-button.js"></script>
<script src="./bootstrap/js/bootstrap-collapse.js"></script>
<script src="./bootstrap/js/bootstrap-carousel.js"></script>
<script src="./bootstrap/js/bootstrap-typeahead.js"></script>

</body>
</html>
