<?php
	if(!isset($_SESSION)){ session_start(); }
	$site = array(
		'url' => '',
		'name' => '',
		'title' => '',
		'desc' => '',
		'keywords' => '',
		'author' => '',
		'type' => '',
		'app_id' => '',
		'image' => '',
		'cache_version' => '?v='.date('His')
	);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<!-- <meta name="apple-mobile-web-app-capable" content="yes" /> -->
	<meta name="apple-mobile-web-app-title" content="<?php echo $site['name']; ?>"/>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1"/>
	<title><?php echo $site['title']; ?></title>
	<base href="<?php echo $site['url']; ?>"/>
	<meta name="description" content="<?php echo $site['desc']; ?>"/>
	<meta name="keywords" content="<?php echo $site['keywords']; ?>"/>
	<meta name="author" content="<?php echo $site['author']; ?>"/>
	<!-- meta for facebook -->
	<meta property="og:url" content=""/>
	<meta property="og:title" content="<?php echo $site['title']; ?>"/>
	<meta property="og:description"	content="<?php echo $site['desc']; ?>"/>
	<meta property="og:image"	content="<?php echo $site['image']; ?>"/>
	<meta property="article:publisher"	content=""/>
	<meta property="article:author"	content="<?php echo $site['author']; ?>"/>
	<meta property="og:site_name"	content="<?php echo $site['name']; ?>"/>
	<meta property="og:type"	content="<?php echo $site['type']; ?>"/>
	<meta property="fb:app_id" content="<?php echo $site['app_id']; ?>"/>
	<!-- meta for twitter -->
	<meta name="twitter:card"	content="summary_large_image"/>
	<meta name="twitter:site" content="<?php echo $site['name']; ?>"/>
	<meta name="twitter:creator"	content="<?php echo $site['author']; ?>"/>
	<meta name="twitter:title" content="<?php echo $site['title']; ?>"/>
	<meta name="twitter:description" content="<?php echo $site['desc']; ?>"/>
	<meta name="twitter:image" content="<?php echo $site['image']; ?>"/>
	<!-- style -->
	<link href="assets/css/main.css<?php echo $site['cache_version']; ?>" rel="stylesheet"/>
	<script src="assets/js/core/jquery.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="assets/js/core/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
	<div class="main">