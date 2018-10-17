<?php
session_start();
    class Workarea extends Controller
    {
        public static function saveImage()
        {   
             if (isset($_POST['savephoto'])) 
             {
                $user = $_SESSION['user'];
                $imageDir = "images/post/";
                $img = explode(",", $_POST['savephoto']);
                $img = base64_decode($img[1]);
                $name = "";
                $name .= uniqid();
                $name .= ".jpeg";
                $file = $imageDir . $name;

               file_put_contents($file, $img);
                self::query('INSERT INTO images VALUES (\'\', :image_name, :image_path, :user, 0, NOW())', array(':image_name'=>$name, ':image_path'=>$file, ':user'=>$user));
            }
        }
        
        public static function ImgDel()
        {
            //session_start();
            if (isset($_GET['action']))
            {
                if ($_GET['action'] == "del") 
                {
                    $image_id = $_GET['id'];
                    $query = self::query("SELECT * FROM images WHERE image_id=:image_id", array(':image_id' => $image_id));
                    //$path = $image['image_path'];
        
                    $query = self::query("DELETE FROM images WHERE image_id=:image_id", array(':image_id' => $image_id));
        
                    $query = self::query("DELETE FROM post_likes WHERE image_id=:image_id", array(':image_id' => $image_id));
        
                    $query = self::query("DELETE FROM comments WHERE image_id=:image_id", array(':image_id' => $image_id));
        
                    //unlink($path);
                    //header("Location: workarea");
                   
                
                }
            }
        }

        public static function Upload()
        {
            if (isset($_SESSION['user']))
            {
                $user = $_SESSION['user'];

                if (isset($_POST['submit'])) {
                    $target_dir = ROOT_DIR ."/images/uploads/";
                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0755);
                    }
                    $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
                    $uploadOk = 1;
                    $check = getimagesize($file_tmp);
                    if ($check !== false) {
                        $file_name = $_FILES["fileToUpload"]["name"];
                        $GLOBALS['file_name'] = $file_name;
                        $target_file = $target_dir . $file_name;
                        $GLOBALS['target_file'] = $target_file;
                        $uploadOk = 1;
                    } else {
                        $err_msg[] = "File is not an image.";
                        $uploadOk = 0;
                    }
                    if (file_exists($target_file)) {
                        $err_msg[] = "File already exists. ";
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 0) {
                        $err_msg[] = "Sorry, your file was not uploaded.";
                    } else {
                        if (!move_uploaded_file($file_tmp, $target_file)) {
                            $err_msg[] = "Sorry, there was an error uploading your file.";
                        }
                    }
                }

            }
            /*else {
                header("Location: log_out.php");
            }*/
        }
        
    }
?>
