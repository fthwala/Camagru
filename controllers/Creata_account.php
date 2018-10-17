<?php

    session_start();
    class Creata_account extends Controller
    {
        public static function test()
        {
            if (isset($_POST['createaccount']))
            {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $recipient_email = $_POST['email'];
                $subject = "Account Verification";
                $cstrong = True;
                $cheks = 0;
                $notif = 1;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

                $verificationLink = "//127.0.0.1:8080/Camagru_mvc/login?email=$email&token=$token";
                $body = "";
                $body .= "Hi $user <br /><br />";
                $body .= "Welcome to Camagru <br />";
                $body .= "Simply click ";
                $body .= "<a href='http://127.0.0.1:8080/Camagru_mvc/confirm?email=$email&token=$token' target='_blank'>Verify</a><br />";
                $body .= "to verify your account.<br /><br />";
                $body .= "Kind Regards <br />";
                $body .= "Camagru";

                $email_sender = "admin@camagru.co.za";
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: Camagru <{$email_sender}> \n";

                if (!self::query('SELECT user FROM users WHERE user=:user', array(':user'=>$user)))
                {
                    if (strlen($user) >= 3 && strlen($user) <= 32)
                    {
    
                        if (preg_match('/[a-zA-Z0-9_]+/', $user))
                        {
                            if (ctype_lower($password) || ctype_upper($password) || ctype_digit($password)) 
                            {
                                echo "Password too weak, try mixing upper and lower case letters with numbers";
                                die();
                            }
                            if (strlen($password) >= 6 && strlen($password) <= 60)
                            {

                                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                                {

                                    if (!self::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
                                    {

                                        self::query('INSERT INTO users VALUES (\'\', :user, :password, :email, :cheks, :notif)', array(':user'=>$user, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':cheks'=>$cheks, ':notif'=>$notif));
                                        mail($recipient_email, $subject, $body, $headers);
                                        echo "Success!";
                                        header('Location: welcome');
                                    }
                                    else
                                    {
                                        echo 'Email in use!';
                                    }
                                }
                                else
                                {
                                    echo 'Invalid email!';
                                }
                            }
                            else
                            {
                                echo 'Invalid password!';
                            }
                        }
                        else
                        {
                            echo 'Invalid user';
                        }
                    }
                    else
                    {
                        echo 'Invalid user';
                    }
        
                }
                else
                {
                    echo 'User already exists!';
                }
            }
        }
    }
?>