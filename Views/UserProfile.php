<?php
	
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
	<title> Gallery </title>
	<!-- Styling -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Google Fonts Import -->
  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

  	<!-- css style -->
  	<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/general.css">

</head>

<!-- It's a body thing -->
<body>
	
	<!-- The login form -->
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
		<h1 id="header">User-Profile</h1>
		<?php
			/* getting the logged in user */
			if (isset($_SESSION['user']))
			{
			    $user = $_SESSION['user'];
				$photos = self::query('SELECT image_id, image_path FROM images WHERE user=:user ORDER BY post_time DESC', array(':user' => $user));
				echo "Hello ".$user." welcome to your profile."."<br>";
				echo "Here you can change your user-details.";
			}
		?>
		
		<p> <a href="change_particulars">Change User details?</a></p>
	</div> <!-- form-end -->

</body>
</html>