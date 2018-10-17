<?php
class Password_recovery extends Controller
{
    public static function change()
    {
        include('./config/loggin.php');
        $tokenIsValid = False;

        if (isset($_POST['changepassword']))
        {
            /* email is inside $_POST['changepassword'] */
            if (isset($_POST['changepassword']))
            {
                $email = $_POST['changepassword'];
                $newpassword = $_POST['newpassword'];
                $newpasswordrepeat = $_POST['newpasswordrepeat'];
                //$userid = Loggin::isLoggedIn();

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

                        self::query('UPDATE users SET password=:newpassword WHERE email=:email', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':email'=>$email));
                            echo 'Password changed successfully! <br />';
                            echo "You can proceed to login.";
                    }
                    else
                    {
                        echo "Password too short!";
                    }
                }
                else
                {
                    echo 'Passwords don\'t match!';
                }
            }
            else
            {
                echo "NO email found <br />";
            }
        }
    }

    /* Send the user a password */
    public static function forget()
    {
        if (isset($_POST['resetpassword']))
        {
            $cstrong = True;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

            $recipient_email = $_POST['email'];
            $subject = "Click the link to change your password";
            $body = "<a href='http://127.0.0.1:8080/Camagru_mvc/password_recovery?token=$token'>Change PassWord</a>";
            $headers = "From: passwords@camagru.com" . "\r\n" . "CC: thwalafn@gmail.com";
    
            $email = $_POST['email'];
            $user_id = self::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
            self::query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
            mail($recipient_email, $subject, $body, $headers);
            echo 'Email sent!';
        }
    }
}

?>
