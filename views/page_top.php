<?php
require_once(dirname(__FILE__).'/../defines.php');// Inclusion des defines
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title><?= SITE_NAME ?></title>
    <link rel="stylesheet" href="style/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="owl-carousel/owl.theme.css">


</head>
<body>
<div id="wrapper">
	<header>
        <div id="logo">
			<a href="<?= HOME_PAGE ?>"><img src="<?= IMG_PATH . PHOTO2 ?>" alt="<?= ALT ?>"/></a>
		</div><!--
		--><div id="menu">
        <?php require('menu.php'); ?>
		</div><!--
<!--		--><div id="send">
<!--			<a href="--><?//= SOUM ?><!--"><img src="--><?//= IMG_PATH . PHOTO8 ?><!--" alt="--><?//= ALT ?><!--"/></a>-->
<!--		</div>-->

	</header>
</div>
