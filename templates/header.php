<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<title>Guestbook</title>
</head>
<body>
	<div id="wrapper">
		<header class="container">
			<div class="navbar">
			  <div class="navbar-inner">
			    <ul class="nav">
			      <li><a href="index.php">Home</a></li>
			      <li class="divider-vertical"></li>
			      <li><a href="guestbook.php">Guestbook</a></li>
			      <li class="divider-vertical"></li>
			      <li><a href="login.php">Login</a></li>
			      <li class="divider-vertical"></li>
			    </ul>
			  </div>
			</div>
			<div class="span">
				<?php isset($_SESSION) ? "" : session_start(); ?>
				<?= (isset($_SESSION['username']) ? "<span>You are logged in as: ".$_SESSION['name']." ".'<a href="logout.php">logout</a><span>' : "") ?>
			</div>
		</header>
		<div id="content">
			<div class="container">