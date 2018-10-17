


<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<!-- Google Fonts Import -->
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
		</ul>
	</div>

	<div id="body">
		<h1 id="header">Forgot Password</h1>
			<form action="forgot_password" method="post">
			        <input type="text" name="email" placeholder="Enter Valid Email"><p />

			    <div class="clearfix">
	        		<button type="submit" class="signupbtn" name="resetpassword" value="Reset Password">Reset Password</button>
	    		</div>
			</form>

	</div>	

</body>
</html>