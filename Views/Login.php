<!DOCTYPE html>
<html>
	
<head>
	<title> Login </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google Fonts Import -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

	<!-- Styling -->
	<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/loginstyle.css">

	<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/general.css">

</head>

	<body>
		<!-- The login form -->
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

		<div id="body">
			<h1 id="header">Login</h1>
			<form action="login" method="POST" style="border:1px solid #ccc">
			  <div >
			    <label id="text"><b>Username</b></label>
			    <input type="text" name="user" placeholder="User ..."><p />
			    <label id="text"><b>Password</b></label>
			    <input type="password" name="password" placeholder="Password ..."><p />

			    <div class="clearfix">
					<a href=""><button type="submit" class="signupbtn" name="login" value="Login">Login</button>
			    </div>
			    <p> <a href="forgot_password">Forgot password?</a></p>
			  </div>
			</form>
		</div> <!-- form-end -->

	</body>
</html>
