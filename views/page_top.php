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
	<script src="script/main.js"></script>

</head>
<body>
<!--<div id="wrapper">-->
	<header>
<!--        <div id="logo"><img src="images/sky.jpg" alt="toto"/div>-->

		<h1><?= SITE_NAME ?> </h1>

        <?php require('menu.php'); ?></header>

