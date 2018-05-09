<?php

	session_start();
	
	if(empty($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
	
	if(empty($_SESSION['total'])){
		$_SESSION['total'] = 0;
	}
	
	$server = "localhost";
	$username = "rmaceachern";
	$password = "689201";
	$db = "rmaceachern_mmda225_final";

	$connection = mysqli_connect($server, $username, $password, $db);

	if(!$connection) {
		die("Connecton failed: " . mysqli_connect_error());
}
?>
<!doctype html>
<html>
<head>
<link rel="icon" href="images/lkglogo.png" type="image/x-icon"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles.css">
<title><?php echo $title; ?></title>
</head>
<body>
<header>
	<img id="background" src="images/header/header_background.jpg" alt="Header Background">
	<img id="sun" src="images/header/header_lkdsun.svg" alt="Sun">
	<img id="foreground" src="images/header/header_city.svg" alt="Header Foreground">
	<div class="mynav">
		<a href="index.php">Home</a>
		<a href="about.php">About</a>
		<a href="products.php">Merch</a>
		<a href="cart.php">My Cart</a>
	</div>
	</header>