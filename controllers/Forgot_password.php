<?php
class Forgot_password extends Controller
{
    public static function forget()
    {
        if (isset($_POST['resetpassword']))
        {
            $cstrong = True;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

            $recipient_email = $_POST['email'];
            $subject = "Password Recovery";
            $body = "";
            $body .= "Hi Camagru user, <br /><br />";
            $body .= "We received a request to reset your password for your Camagru Account.<br />";
            $body .= "Simply click ";
            $body .= "<a href='http://127.0.0.1:8080/Camagru_mvc/password_recovery?email=$recipient_email' target='_blank'>Change Password</a>";
            $body .= " to set a new password. <br /><br />";
            $body .= "Kind regards,<br />";
            $body .= "Camargu";

            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "From: admin@camagru.com" . "\r\n" . "CC: admin@gmail.com";
    
            $email = $_POST['email'];
            $user_id = self::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
            self::query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
            mail($recipient_email, $subject, $body, $headers);
            echo 'Email sent!';
        }
    }
}

?>