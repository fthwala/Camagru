<?php
session_start();
class Change_particulars extends Controller
{
    public static function change_email()
    {
        if(isset($_POST['Change_Em']))
        {
            $newemail = $_POST['newemail'];
            $newUserName = $_POST['newUserName'];
            $user = $_SESSION['user'];
            //$userid = Login::isLoggedIn();
            if (filter_var($newemail, FILTER_VALIDATE_EMAIL))
            {
                if(self::query('UPDATE users SET email=:newemail WHERE user=:user', array(':newemail'=>$newemail, ':user'=>$user)));
                echo "Email changed successfully!";
            }
            else
            {
                echo "Invalid Email! <br />";
            }

        }
    }

    public static function change_user_name()
    {
        if(isset($_POST['Change_Un']))
        {
            $newUserName = $_POST['newUserName'];
            if (strlen($newUserName) > 3)
            {
                $user = $_SESSION['user'];
                if (strlen($user) >= 3 && strlen($user) <= 32)
                {
                    $old_user = self::query("SELECT user FROM images WHERE user=:user", array(':user' => $user));
                    self::query('UPDATE users SET user=:newUserName WHERE user=:user', array(':newUserName'=>$newUserName, ':user'=>$user));

                    /* Fixing the multiple comment problem */
                    $index = 0;
                    //print_r($old_user);
                    foreach ($old_user as $value) {
                        //echo $old_user[$index]['user'];
                        if (strcmp($old_user[$index]['user'], $user) == 0)
                        {
                            //echo "0000000";
                            self::query('UPDATE images SET user=:newUserName WHERE user=:user', array(':newUserName'=>$newUserName, ':user'=>$user));
                            self::query('UPDATE comments SET user=:newUserName WHERE user=:user', array(':newUserName'=>$newUserName, ':user'=>$user));
                            self::query('UPDATE post_likes SET user=:newUserName WHERE user=:user', array(':newUserName'=>$newUserName, ':user'=>$user));
                            //session_destroy();
                            $_SESSION['user'] = $_POST['newUserName'];

                        }
                        $index++;
                    }
                    echo 'User Name changed successfully!';
                }
                else
                {
                    echo "Invalid User Name! <br />";
                }
            }
            else
            {
                echo "User Name Too Short!";
            }
        }
    }

    public static function preferance_update()
    {
        /* Remove Email Preferance */
        $user = $_SESSION['user'];

        if(isset($_POST['preferance']) && strcmp($_POST['preferance'], "remove") == 0 ) 
        {
            $notif_db = self::query('SELECT notif FROM users WHERE user=:user', array(':user'=>$user))[0]['notif'];
            $notif = 0;
            if ($notif_db > 0)
            {
                self::query('UPDATE users SET notif=:notif WHERE user=:user', array(':notif'=>$notif, ':user'=>$user));
                echo "Email Preferance Updated";
            }
            else
            {
                echo "Your email notification is already disabled";
            }
        }

        /* Add Email Preferance */
        if(isset($_POST['preferance']) && strcmp($_POST['preferance'], "add") == 0 ) 
        {
            $notif_db = self::query('SELECT notif FROM users WHERE user=:user', array(':user'=>$user))[0]['notif'];
            $notif = 1;
            if ($notif_db > 0)
            {
                echo "You can already recieve notification emails";
            }
            else if ($notif_db < 1)
            {
                self::query('UPDATE users SET notif=:notif WHERE user=:user', array(':notif'=>$notif, ':user'=>$user));
                echo "Email Preferance Updated";
            }
        } 
    }
}

?>