<?php

  if (isset($_GET['action']))
  {
    Image_posts::ImgPost('Image_posts');
    Image_posts::CreateView('Image_posts');
  }
  $selfimages = self::query('SELECT * FROM images ORDER BY post_time DESC');
  $photos = self::query("SELECT * FROM post_likes");
  $comments = self::query("SELECT * FROM comments ORDER BY posted_at DESC");
?>

<html>
  <head>
    <title>Camagru</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Google Fonts Import -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

		<!-- css style -->
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/general.css">
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/css/index.css">

  </head>
<body>

  <div id="logo"> 
		<!-- Logo image -->
		<img src="https://rawgit.com/fthwala/camagru/master/Camagru_mvc/images/styling/logo.png" height='6%' width='66%'>
	</div>

  <div>
    <!-- The nav-bar -->
    <ul class="nav">
      <?php
        /* Check for a loggen-in user */
        if (isset($_SESSION['user']))
          {
            echo '<li><a href="workarea">Home</a></li>';
            echo '<li><a href="logout">LogOut</a></li>';
            echo '<li><a href="user-profile">Profile</a></li>';
          }
          else
          {
            echo '<li><a href="deshbord">Register</a></li>';
            echo '<li><a href="login">Login</a></li>';
           }
      ?>
    </ul>
  </div>

  <div class='contaner' id='body'>
    <h1 id = "header">Gallery</h1>
    <?php

      //echo $selfimages[0][2]."<br />"; /* $selfimages[row][image_path] */
      $total = sizeof($selfimages);
      $imgs = $selfimages;
      if ($total > 1)
      {
        echo $total." images<br /><br />";
      }
      else
      {
        echo $total." image<br />";
      }
      if (!isset($_GET['page']))
      {
        $count = 0;
        $limit = 5;
        $page = 0;
      }
      else
      {
        $count = 0;
        $limit = $_GET['limit'] + 5;
        $page = $_GET['page'] + 1;
      }

      /*while ($count < $limit && $count < $total)
      {
        echo $imgs[$count][2]."<br />";
        $count++;
      }*/

      //if ()
      //echo "<a href='http://127.0.0.1:8080/camagru_vog/gallary?page=$page&limit=$limit'><h1 id = 'header'>Next</h1></a> <br />";


    /* Retrieving the images from the images table */
    $images = "";
    //print_r($selfimages);
    while ($count < $limit && $count < $total) {
        $images .= $imgs[$count][2];
        //echo $imgs[$count][2]; 
        $filepath = ROOT_DIR . "/".$images;
        $type = pathinfo($filepath, PATHINFO_EXTENSION); /* get file type */
        $data = file_get_contents($filepath); /* get actual file */
        $base64 = 'data:file/image;' . $type . ';base64,' . base64_encode($data);
    
        $images = ""; /* Always reset for a new image */
        echo "<img src=$base64 height='40%' width='100%' />";

      /* Retreive the number of likes */
     $total_post_likes = 0;
     foreach($photos as $like) {
         if ($imgs[$count][0] == $like['image_id']) {
             $total_post_likes += $like['no_likes']; /* Accumulate likes */
         }
     }
         echo "post_likes";
         echo ": ";
         echo "<b>".$total_post_likes."</b>";
         //echo "</div>";
         $total_post_likes = 0;
    ?>

    <hr>
    <div style="">
      <button class="signupbtn" style="width: 20%; padding-top: 2%" value="<?php echo $imgs[$count][0];?>" onclick="likePhoto(this);">Like</button>
      <textarea placeholder="Enter a comment" style="padding-top: 2%;" name="<?php echo $imgs[$count][0];?>" id="commentbox"></textarea>
      <button class="like_post" style="width: 20%; padding-top: 2%; " value="<?php echo $imgs[$count][0];?>"  onclick="commentPhoto(this);">Comment</button>
    </div>
  
    <!-- Comments sectionn -->

    <?php

    foreach($comments as $comment)
    {
        if ($imgs[$count][0] == $comment['image_id']){ ?>
            <?php echo  "<span><br />".$comment['user']."<b></span>"." <b />:<b /> "."<span2>". $comment['comment']."<b /></span2>"; ?>
            <?php
        }
    }
    $count++;
    
    ?>
    <!-- </div> -->
    <hr style="border: 1px solid white; margin-top: 20px;">

    <?php }
    if ($total > 5)
    {
      echo "<a href='http://127.0.0.1:8080/Camagru_mvc/gallary?page=$page&limit=$limit&count=$count'><h1 id = 'header'>Next</h1></a> <br />";
    }
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




