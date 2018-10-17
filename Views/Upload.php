<?php
	
	/* this is just pure hard coding */
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
			//Workarea::CreateView('Workarea');
		}

	    if (isset($_POST['submit'])) {
	        $target_dir = ROOT_DIR ."/images/uploads/";
	        if (!file_exists($target_dir)) {
	            mkdir($target_dir, 0755);
	        }
	        $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
	        if ($file_tmp)
	        {
	        	$uploadOk = 1;
		        $check = getimagesize($file_tmp);
		        if ($check !== false) {
		            $file_name = $_FILES["fileToUpload"]["name"];
		            //$GLOBALS['file_name'] = $file_name;
		            $target_file = $target_dir . $file_name;
		            //$GLOBALS['target_file'] = $target_file;
		            $uploadOk = 1;
		        } else {
		            $err_msg[] = "File is not an image.";
		            $uploadOk = 0;
		        }
		        if ($uploadOk == 1)
		        {
		        	if (!move_uploaded_file($file_tmp, $target_file)) {
		                $err_msg[] = "Sorry, there was an error uploading your file.";
		            }
		        }
		        /*if (file_exists($target_file)) {
		            $err_msg[] = "File already exists. ";
		            $uploadOk = 0;
		        }
		        if ($uploadOk == 0) {
		            $err_msg[] = "Sorry, your file was not uploaded.";
		        } else {
		            if (!move_uploaded_file($file_tmp, $target_file)) {
		                $err_msg[] = "Sorry, there was an error uploading your file.";
		            }
		        }*/

		        /* getting the actual file */
		        if ($check)
		        {
		        	$filepath6 = $target_file;
					$type6 = pathinfo($filepath6, PATHINFO_EXTENSION);
					$data6 = file_get_contents($filepath6);
					$image6 = 'data:image/png;' . $type6 . ';base64,' . base64_encode($data6);
		        }
				
	        }
	        
	    }
	}
	else
	{
		/* If user is not logged-in kick the intruder back to index */
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
		<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/loginstyle.css">
		<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/general.css">
		<!--<link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/index.css">-->

		<?php
			$filepath = ROOT_DIR . "/css/index.css";
			$type = pathinfo($filepath, PATHINFO_EXTENSION);
			$data = file_get_contents($filepath);
			$base64 = 'data:text/css;' . $type . ';base64,' . base64_encode($data);
			echo "<link "."href=$base64 rel='stylesheet'>";
		?>

		<?php /* linking the Stickers */

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
					<li><a href="workarea">Home</a></li>
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
			            <input  type="radio" name="radio" value="goku" method="post" action="workarea" />
			            <img  class="image-icons choiceImg" src=<?php echo $image1; ?> value="" onclick="checkPhoto(this)">
			        </label>
				</li>
				<li>
			        <label>
			            <input name="radio" type="radio" value="" />
			            <img  class="image-icons choiceImg" src=<?php echo $image2; ?> onclick="checkPhoto(this)">
			        </label>
				</li>
				<li>
					<label>
			            <input  name="radio" type="radio" value="" />
			            <img  class="image-icons choiceImg" src=<?php echo $image3; ?> onclick="checkPhoto(this)">
			        </label>
				</li>
				<li>
					<label>
			            <input  name="radio" type="radio" value="" />
			            <img class="image-icons choiceImg" src=<?php echo $image4; ?> onclick="checkPhoto(this)">
			        </label>
				</li>
				<li>
					<label>
			            <input  name="radio" type="radio" value="" />
			            <img  class="image-icons choiceImg" src=<?php echo $image5; ?> onclick="checkPhoto(this)">
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

					<!-- The canvas area -->
					<div class="canvas_preview">
			            <img id="superimg" src=<?php echo $image0; ?> />
			            <img id="img_upload" src="<?php if (isset($file_name)) {echo $image6;} else { echo $image0;}?>" width="100%" height="100%"/>
        			</div>

			        <form id="upload-form" action="upload" method="post" enctype="multipart/form-data">
			            <span4><b>Select image to upload:</b></span4>
			            <input type="file" name="fileToUpload" id="fileToUpload">
			            <input type="submit" id="upload_submit_btn" value="Upload Image" name="submit" >
			        </form>
        
        			<!-- Error message section -->
			        <?php if (isset($err_msg)) {foreach($err_msg as $msg) { echo "<p><span3>" .$msg. "</span3></p>";}}

			        	if (isset($file_name))
			        	{
			        		echo '<button type="button" id="capture2" class="signupbtn" >Save</button>';
			        	}
			        	else
			        	{
			        		echo '<button type="button" id="capture2" class="signupbtn" disabled>Save</button>';
			        	}
			        ?>
			        
			        <form id="capture-form" method="post" action="upload">
			            <input type="hidden" id="picture" name="savephoto" value=""/>
			        </form>
			        <div>
			            <a class="home_button" href="workarea"><button type="button" id="button" class="registerbtn">Capture picture</button></a>
			        </div>
			        <canvas id="canvas" width="640" height="480"></canvas>

				</div>

		  </div>  

		  <div id="preview">

			  <h2>My Photos</h2>
				<div class="scroll">
					
				<?php 

					if (isset($_SESSION['user']))
					{
					    $user = $_SESSION['user'];
						$photos = self::query('SELECT image_id, image_path FROM images WHERE user=:user ORDER BY post_time DESC', array(':user' => $user));
						echo $user."'s photos";

						$images = "";
						foreach($photos as $photo) {
						$images .= $photo['image_path'];
						$filepath = ROOT_DIR . "/".$images;
						$type = pathinfo($filepath, PATHINFO_EXTENSION);
						$data = file_get_contents($filepath);
						$base64 = 'data:file/image;' . $type . ';base64,' . base64_encode($data);
					
						$images = "";  /* Reset */
						echo "<img src=$base64 height='375' width='100%' />"; ?>

						<button id="del" class="like_post" value="<?php echo $photo['image_id'];?>"  onclick="deletePhotoPreview(this);">delete</button> <?php
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

		<!-- Linking the scripts -->

		<?php
			$filepath = ROOT_DIR . "/js/like.js";
			$type = pathinfo($filepath, PATHINFO_EXTENSION);
			$data = file_get_contents($filepath);
			$base64 = 'data:text/javascript;' . $type . ';base64,' . base64_encode($data);
			 echo "<script type='text/javascript' src='$base64'></script>";
		?>
		<?php
			$filepath = ROOT_DIR . "/js/upload.js";
			$type = pathinfo($filepath, PATHINFO_EXTENSION);
			$data = file_get_contents($filepath);
			$base64 = 'data:text/javascript;' . $type . ';base64,' . base64_encode($data);
			 echo "<script type='text/javascript' src='$base64'></script>";
		?>

	</body>
</html>