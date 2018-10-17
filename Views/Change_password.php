<?php
	$tokenIsValid = False;

	/* If user is not logged-in kick the intruder back to index */
	if (!isset($_SESSION['user']))
	{
		Index::CreateView('Index');
		die();
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
		<?php
	        /* Check for a loggen-in user */
	        if (isset($_SESSION['user']))
	        {
	            echo '<li><a href="workarea">Home</a></li>';
	            echo '<li><a href="logout">LogOut</a></li>';
	        }
	     ?>
		</ul>
	</div>

	<div id="body">
		<h1 id="header">Change your Password</h1>
		<form action=" <?php if (!$tokenIsValid)
								{ 
									echo 'change_password';
								} 
							 else 
							 	{ 
							 		echo 'change_password?token='.$token.'';
								}
						?>" method="post">

			<!-- script -->
			<label id="text"><b>Current Password</b></label>
	        <?php if (!$tokenIsValid) 
	        	{ 
	        	echo '<input type="password" name="oldpassword" value="" placeholder="Current Password ..."><p />'; 
	        	} 
	        ?>

	        <label id="text"><b>New Password</b></label>
	        <input type="password" name="newpassword" value="" placeholder="New Password ..."><p />
	        <label id="text"><b>Repeat Password</b></label>
	        <input type="password" name="newpasswordrepeat" value="" placeholder="Repeat Password ..."><p />
	        <div class="clearfix">
	        	<button type="submit" class="signupbtn" name="changepassword" value="Change Password">Change Password</button>
	    	</div>
		</form>
	</div>	

</body>
</html>