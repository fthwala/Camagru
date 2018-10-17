<?php
	$tokenIsValid = False;
	if (isset($_GET['email']))
	{
		$email = $_GET['email'];
	}
	else
	{
		/* If user did not receive an email kick the intruder back to index */
		$email = "";

	}
	
?>


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
		<h1 id="header">Change your Password</h1>
		<form action="password_recovery" method="post">

			<!-- script -->

	        <label id="text"><b>New Password</b></label>
	        <input type="password" name="newpassword" value="" placeholder="Enter New Password" ><p />
	        <label id="text"><b>Repeat Password</b></label>
	        <input type="password" name="newpasswordrepeat" value="" placeholder="Repeat Password ..."><p />
	        <div class="clearfix">
	        	<button type="submit" class="signupbtn" name="changepassword" value=<?php echo $email; ?> >Change Password</button>
	    	</div>
		</form>
	</div>	

</body>
</html>