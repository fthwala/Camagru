<!DOCTYPE html>
<html>

	<head>
		<title> Logout </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Google Fonts Import -->
  		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
  		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

  		<!-- css style -->
		 <link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/general.css">
		   		<!-- css style -->
		 <link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/loginstyle.css">

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
				<?php
			        /* Check for a loggen-in user */
			        if (isset($_SESSION['user']))
			        {
			            echo '<li><a href="workarea">Home</a></li>';
			            echo '<li><a href="user-profile">Profile</a></li>';
			        }
			     ?>
			</ul>
		</div>

		<div class="contaner " id="body">
			
			<h1 id = "header">Logout of your Account?</h1>
			

			<form action="logout" method="post">
				<p>Are you sure you'd like to logout?</p>
				<div class="clearfix">
					<button class="signupbtn" type="submit" name="confirm" value="Confirm">Confirm</button>
				</div>
			</form>
		</div>
	</body>
</html>

