<?php
	
	/* If user is not logged-in kicke the intruder back to index */
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
			<?php
			$filepath = ROOT_DIR . "/css/general.css";
			$type = pathinfo($filepath, PATHINFO_EXTENSION);
			$data = file_get_contents($filepath);
			$base64 = 'data:text/css;' . $type . ';base64,' . base64_encode($data);
			echo "<link "."href=$base64 rel='stylesheet'>";
		?>
	
</head>
<body>

	<div id="logo"> 
		<!-- Logo image -->
		<img src="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/images/styling/logo.png" height='6%' width='66%'>
	</div>

	<!-- The nav-bar -->
	<ul class="nav">
		<li><a href="workarea">Home</a></li>
		<li><a href="gallary">Gallery</a></li>
		<li><a href="logout">LogOut</a></li>
	</ul>

	<div id="body">
		<h1 id="header">Change User Details</h1>
			<!-- script -->
            <form action="change_particulars" method="POST" style="border:1px solid #ccc;">
				<label id="text"><b>Enter New Email</b></label>
		        <input type="text" name="newemail" placeholder="Enter New Email">
	            <div class="clearfix">
					<a href=""><button type="submit" class="signupbtn" name = "Change_Em" value="Change_Em">Change Email</button></a>
				</div>
        	</from>

            <form action="change_particulars" method="POST" style="border:1px solid #ccc">
		        <label id="text"><b>Enter New User Name</b></label>
	            <input type="text" name="newUserName" placeholder="Enter New User">
	            <div class="clearfix">
					<button type="submit" class="signupbtn" name="Change_Un" value="Change_Un">Change User Name</button>
				</div>
			</form>

			<!-- Email Preferance Radio Box -->
			<form action="change_particulars" method="POST">
				<label> Email Notification Preferance </label><br />
			  	<input type="radio" name="preferance" value="remove"> Disable<br>
			  	<input type="radio" name="preferance" value="add"> Enable<br>
			  	<input type="submit" value="Update" class="signupbtn"><br /><br />
			</form>

			<p> <a href="change_password">Change password?</a></p>
	</div>	

</body>
</html>