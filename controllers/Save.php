<?php
     session_start();
    class Save extends Controller
    {
        public static function do_save()
        {
            $user = $_SESSION['user'];
            $imageDir = "images/post/";
            $image = explode(",", $_POST['savephoto']);
            $image = base64_decode($image[1]);
            $image_name = "";
            $image_name .= uniqid();
            $image_name .= ".png";
            $image_path = $imageDir . $image_name;

            if (!file_exists($imageDir)) {
                mkdir($imageDir, 0755);
            }
            file_put_contents($image_path, $image);

            self::query('INSERT INTO images (user, image_name, image_path, post_time) VALUES (:user, :image_name, :image_path, NOW())', array(':user' => $user, ':image_name' => $image_name, ':image_path' => $image_path));
            header("Location: workarea");
        }
    }
?>