<?php
	/* Confirmation check */
	if (isset($_GET['token']))
	{
		$checks = 1;
		$email = $_GET['email'];
		self::query('UPDATE users SET checks=:checks WHERE email=:email', array(':checks'=>$checks, ':email'=>$email));
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<title> Confirmed </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Google Fonts Import -->
  		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
  		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

  		<!-- css style -->
		 <link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/general.css">

	</head>
	<body>
		<div id="logo"> 
			<!-- Logo image -->
			<img src="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/images/styling/logo.png" height='6%' width='66%'>
		</div>

		<div>
			<!-- The nav-bar -->
			<ul class="nav">
				<li><a href="gallary">Gallery</a></li>
			</ul>
		</div>

		<div class="contaner " id="body">
			
			<h1 id = "header">Welcome</h1>
			
			<h3>Congradulations your account has been confirmed</h3>
			<h3>You can continue to the <a href="login">login</a> page</h3>
		</div>
	</body>
</html>