<?php
session_start();
class Change_password extends Controller
{
    public static function change()
    {
        include('./config/loggin.php');
        $tokenIsValid = False;
        if (Loggin::isLoggedIn()) /* Check if user is logged-in */
        {
            if (isset($_POST['changepassword']))
            {

                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                $newpasswordrepeat = $_POST['newpasswordrepeat'];
                $userid = Loggin::isLoggedIn();

                if (password_verify($oldpassword, self::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password']))
                {
                    if ($newpassword == $newpasswordrepeat)
                    {
                        if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60)
                        {
                            /* Check for mixed chars and digits */
                            if (ctype_lower($newpassword) || ctype_upper($newpassword) || ctype_digit($newpassword)) 
                            {
                                echo "Password too weak, try mixing upper and lower case letters with numbers";
                                die();
                            }
                            self::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                            echo 'Password changed successfully!';
                        }
                    }
                    else
                    {
                        echo 'Passwords don\'t match!';
                    }
                }
                else
                {
                    echo 'Incorrect old password!';
                }
            }

        }
        else
        {
            if (isset($_GET['token']))
            {
                $token = $_GET['token'];
                if (self::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token))))
                    {
                        $userid = self::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
                        $tokenIsValid = True;
                        if (isset($_POST['changepassword']))
                        {
                            $newpassword = $_POST['newpassword'];
                            $newpasswordrepeat = $_POST['newpasswordrepeat'];

                            if ($newpassword == $newpasswordrepeat)
                            {
                                if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60)
                                {
                                    self::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                    echo 'Password changed successfully!';
                                    self::query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
                                }
                            }
                            else
                            {
                                echo 'Passwords don\'t match!';
                            }
                        }
                    }
                    else
                    {
                        die('Token invalid');
                    }
            }
            else
            {
                die('Not logged in');
            }
        }
    }
}

?>
