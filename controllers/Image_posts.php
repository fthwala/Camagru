<?php
session_start();
    class Image_posts extends Controller
    {
        public static function ImgPost()
        {
            if (isset($_GET['action']))
            {
                if ($_GET['action'] == "like")
                {
                    if(isset($_SESSION['user']))
                    {
                        $image_id = $_GET['id'];
                        $user = $_SESSION['user'];
                        //$user_u = self::query('SELECT user FROM users WHERE user=:user', array(':user'=>$user))[0]['user'];
                        //$user_id = self::query('SELECT id FROM users WHERE user=:user', array(':user'=>$user))[0]['id'];
                        //$user = $_SESSION['user'];
                        $like = 1;
                    
                        /* Avoiding more than 1 like from the same user on one image */
                        if (!(self::query("SELECT id FROM post_likes WHERE user=:user AND image_id=:image_id", array(':user' => $user, ':image_id' => $image_id))))
                        {
                            self::query("INSERT INTO post_likes (user, no_likes, image_id) VALUES (:user, :no_likes, :image_id)", array( ':user' => $user,':no_likes' => $like, ':image_id' => $image_id));
                        }                         
                    }   
                }   

                else if ($_GET['action'] == "comment")
                {
                    $image_id = $_GET['id'];
                    if (isset($_SESSION['user']))
                    {
                        $user = $_SESSION['user'];

                        $user_posted = self::query("SELECT user FROM images WHERE image_id=:image_id", array('image_id'=>$image_id))[0]['user'];
                        $recipient = self::query("SELECT email FROM users WHERE user=:user", array(':user'=>$user_posted))[0]['email'];
                        /*echo $user;
                        echo $recipient;*/
                        $message = htmlspecialchars($_GET['message']);

                        $savior = self::query("SELECT comment FROM comments WHERE user=:user AND image_id=:image_id", array(':user' => $user, ':image_id' => $image_id));

                        /* Fixing the multiple comment problem */
                        $index = 0;
                        foreach ($savior as $value) {
                            //echo "<br />".$savior[$index]['comment']."<br />";
                            if (strcmp($savior[$index]['comment'], $message) == 0)
                            {
                                die();
                            }
                            $index++;
                        }

                        //echo $user_posted;
                        if (strlen($message) > 0)
                        {
                          self::query("INSERT INTO comments (user, comment, image_id, posted_at) VALUES (:user, :comment, :image_id, NOW())", array(':user' => $user, ':comment' => $message, ':image_id' => $image_id));
                        }
  
                        /* According to email notif prefs */
                        $notif_db = self::query('SELECT notif FROM users WHERE user=:user', array(':user'=>$user))[0]['notif'];
                        if ($notif_db > 0) 
                        {
                            $htmlStr = "";
                            $htmlStr .= "Hi " . $user_posted . "<br /><br />";
                            $htmlStr .= "$user commented on your photo.<br /><br />";
                            $htmlStr .= "Kind regards,<br />";
                            $htmlStr .= "Camargu";
                            $name = "Camagru";
                            $email_sender = "no-reply@camagru.co.za";
                            $subject = "Camagru Notification";
                            $headers  = "MIME-Version: 1.0\r\n";
                            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                            $headers .= "From: {$name} <{$email_sender}> \n";
                            $body = $htmlStr;
                            mail($recipient, $subject, $body, $headers);
                        }
                    }
                }     
            }
        }
    }    
?>
