<?php
if (isset($_POST['signin']))
{
  header('Location: login');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Register </title>

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

		<!-- The login form -->
		<div id="body">
			<h1 id="header">Register</h2>
			<form action="deshbord" method="POST" style="border:1px solid #ccc">
			  <div >
			    <label id="text"><b>Username</b></label>
			    <input type="text" name="user" placeholder="User Name"><p />
                <label id="text"><b>Email</b></label>
			    <input type="text" name="email" placeholder="someone@camagru.com"><p />
			    <label id="text"><b>Password</b></label>
			    <input type="password" name="password" placeholder="Password"><p />

			    <div class="clearfix">

					<a href=""><button type="submit" class="signupbtn" name = "signin" value="OK">Sign In</button></a>
					<button type="submit" class="registerbtn" name="createaccount" value="Create Account">Register</button>

			    </div>
			  </div>
				</form>
		</div> <!-- form-end -->
</div>



	</body>
</html>



