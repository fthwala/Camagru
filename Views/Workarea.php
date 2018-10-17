<?php

	if (isset($_SESSION['user']))
	{
		/* Fixing the reloading problem */
		if (isset($_GET['action']))
		{
			Workarea::ImgDel('Workarea');
			//Workarea::CreateView('Workarea');
		}
		if (isset($_POST['savephoto']))
		{
			Workarea::saveImage('Workarea');
			Workarea::CreateView('Workarea');
		}

	    $user = $_SESSION['user'];
		$photos = self::query('SELECT image_id, image_path FROM images WHERE user=:user ORDER BY post_time DESC', array(':user' => $user));
	}
	else
	{	/* If user is not logged-in kick the intruder back to index */
		Index::CreateView('Index');
		die();
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Workarea </title>
		<!-- Styling -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- Google Fonts Import -->
	  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
	  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

	  	<!-- css style -->
		<!--<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/loginstyle.css">-->
		<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/general.css">
		<!--<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/index.css">-->

		<?php
			$filepath = ROOT_DIR . "/css/index.css";
			$type = pathinfo($filepath, PATHINFO_EXTENSION);
			$data = file_get_contents($filepath);
			$base64 = 'data:text/css;' . $type . ';base64,' . base64_encode($data);
			echo "<link "."href=$base64 rel='stylesheet'>";
		?>

		<?php
			$filepath6 = ROOT_DIR . "/css/loginstyle.css";
			$type6 = pathinfo($filepath6, PATHINFO_EXTENSION);
			$data6 = file_get_contents($filepath6);
			$base65 = 'data:text/css;' . $type6 . ';base64,' . base64_encode($data6);
			echo "<link "."href=$base65 rel='stylesheet'>";
		?>

		<?php /* linking Stickers */

			$filepath0 = ROOT_DIR . "/images/invisible.png";
			$type0 = pathinfo($filepath0, PATHINFO_EXTENSION);
			$data0 = file_get_contents($filepath0);
			$image0 = 'data:image/png;' . $type0 . ';base64,' . base64_encode($data0);

			$filepath1 = ROOT_DIR . "/images/Stickers/image1.png";
			$type1 = pathinfo($filepath1, PATHINFO_EXTENSION);
			$data1 = file_get_contents($filepath1);
			$image1 = 'data:image/png;' . $type1 . ';base64,' . base64_encode($data1);
			
			$filepath2 = ROOT_DIR . "/images/Stickers/image2.png";
			$type2 = pathinfo($filepath2, PATHINFO_EXTENSION);
			$data2 = file_get_contents($filepath2);
			$image2 = 'data:image/png;' . $type2 . ';base64,' . base64_encode($data2);

			$filepath3 = ROOT_DIR . "/images/Stickers/image3.png";
			$type3 = pathinfo($filepath3, PATHINFO_EXTENSION);
			$data3 = file_get_contents($filepath3);
			$image3 = 'data:image/png;' . $type3 . ';base64,' . base64_encode($data3);

			$filepath4 = ROOT_DIR . "/images/Stickers/image4.png";
			$type4 = pathinfo($filepath4, PATHINFO_EXTENSION);
			$data4 = file_get_contents($filepath4);
			$image4 = 'data:image/png;' . $type4 . ';base64,' . base64_encode($data4);

			$filepath5 = ROOT_DIR . "/images/Stickers/image5.png";
			$type5 = pathinfo($filepath5, PATHINFO_EXTENSION);
			$data5 = file_get_contents($filepath5);
			$image5 = 'data:image/png;' . $type5 . ';base64,' . base64_encode($data5);
			
		?>
		
	</head>

	<body>


		<!-- The entire grid -->
		<div class="grid-container">

		  <div class="header">
			<div>
				<!-- The nav-bar -->
				<ul class="nav_main">
					<li><a href="gallary">Gallery</a></li>
					<li><a href="user-profile">Profile</a></li>
					<li><a href="logout">LogOut</a></li>
				</ul>
			</div>
				
		  </div>

		  <div id="stickers">
		  	

			<ul  class="stickers">
				<li>
					<label>
					<!-- I need to send the URL to as $_POST to workarea.php, so that they can be recerved by layover as a post -->
			            <input  type="radio" name="radio" value="" method="post" action="workarea" />
			            <img  class="image-icons choiceImg" src=<?php echo $image1; ?> value="" onclick="check(this)">
			        </label>
				</li>
				<li>
			        <label>
			            <input name="radio" type="radio" value="" />
			            <img  class="image-icons choiceImg" src=<?php echo $image2; ?> onclick="check(this)">
			        </label>
				</li>
				<li>
					<label>
			            <input  name="radio" type="radio" value="" />
			            <img  class="image-icons choiceImg" src=<?php echo $image3; ?> onclick="check(this)">
			        </label>
				</li>
				<li>
					<label>
			            <input  name="radio" type="radio" value="" />
			            <img class="image-icons choiceImg" src=<?php echo $image4; ?> onclick="check(this)">
			        </label>
				</li>
				<li>
					<label>
			            <input  name="radio" type="radio" value="" />
			            <img  class="image-icons choiceImg" src=<?php echo $image5; ?> onclick="check(this)">
			        </label>
				</li>
				
			</ul>
		  </div>

		  <div class="main">

		  		<div id="logo_main"> 
					<!-- Logo image -->
					<img src="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/images/styling/logo.png" />
				</div>
		
				<div class='contaner' id='body_main'>

					<!-- Video with a sticker -->
					<div>
						<img id="superimg" src=<?php echo $image0; ?> width="40px" height="40px" />
						<video id="videoElement" width="100%" height=""></video>
					</div>

					<!-- Capture button -->
					<div class="clearfix">
						<button type="button" id="cbutton" class="signupbtn" disabled>Capture picture</button>
						<a href="upload"><button type="button" id="cbutton" class="registerbtn">Upload picture</button></a>
					</div>
					
					
					
					<!-- Something gets submitted here -->
					<form id="capture-form" method="post" action="workarea" >
        				<input type="hidden" id="picture" name="savephoto" value=""/>
    				</form>

    				<!-- Canvas for showing off the taken picture -->
					<div>
						<canvas id="canvas" width="500" height="375"></canvas>
					</div>
				</div>

		  </div>  

		  <div id="preview">

			  <h2>My Photos</h2>
				<div class="scroll">
					
				<?php 

					if (isset($_SESSION['user']))
					{
						echo $user."'s photos";

						$images = "";
						foreach($photos as $photo) {
						$images .= $photo['image_path'];
						$filepath = ROOT_DIR . "/".$images;
						$type = pathinfo($filepath, PATHINFO_EXTENSION);
						$data = file_get_contents($filepath);
						$base64 = 'data:file/image;' . $type . ';base64,' . base64_encode($data);
						//echo "<div class='contaner' id='body'>";
						//echo "<link " . "href=$base64 rel='stylesheet'>";
							
						//echo $filepath;
					
						$images = "";
						echo "<img src=$base64 height='375' width='100%' />"; ?>

						<button id="del" class="like_post" value="<?php echo $photo['image_id'];?>"  onclick="deletePhoto(this);">delete</button> <?php
					}
				 }
				 else
				 {
				 	echo "Not logged-in";
				 }

				?>

				</div>
		  </div>

		  <div class="footer">
		  	<p> Camagru &copy; kmodipa</p>
		  </div>

		</div>

		<!--<h1 style="text-align: center">My web cam</h1>-->
		<?php
			$filepath = ROOT_DIR . "/js/camera.js";
			$type = pathinfo($filepath, PATHINFO_EXTENSION);
			$data = file_get_contents($filepath);
			$base64 = 'data:text/javascript;' . $type . ';base64,' . base64_encode($data);
			 echo "<script type='text/javascript' src='$base64'></script>";
		?>

		<?php
			$filepath = ROOT_DIR . "/js/like.js";
			$type = pathinfo($filepath, PATHINFO_EXTENSION);
			$data = file_get_contents($filepath);
			$base64 = 'data:text/javascript;' . $type . ';base64,' . base64_encode($data);
			 echo "<script type='text/javascript' src='$base64'></script>";
		?>

	</body>
</html>