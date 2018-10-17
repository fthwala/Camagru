<!-- <h1>Goodbuy</h1> <br />
<h4>You can still login if you like to</h4>
<form action="login" method="post">
<input type="text" name="user" value="" placeholder="Username ..."><p />
<input type="password" name="password" value="" placeholder="Password ..."><p />
<input type="submit" name="login" value="Login">
</form> -->

<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<!-- Styling -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

	<!-- Styling -->
	<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/loginstyle.css">

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
				<li><a href="logout">LogOut</a></li>
			</ul>
		</div>

		<!-- The login form -->
		<div id="body">
		<h1 id="header">Good-bye</h1>
		<p id="header">You can still login if you like to</p>
		<h1 id="header">Login</h1>
		<form action="login" method="POST" style="border:1px solid #ccc">
			<div >
				<label id="text"><b>Username</b></label>
				<input type="text" name="user" placeholder="User ..."><p />
				<label id="text"><b>Password</b></label>
				<input type="password" name="password" placeholder="Password ..."><p />

				<div class="clearfix">
					<a href=""><button type="submit" class="signupbtn" name="login" value="Login">Login</button></a>
				</div>
			</div>
			<p> <a href="forgot_password">Forgot password?</a></p>
		</form>
	</div> <!-- form-end -->

	</body>
</html>