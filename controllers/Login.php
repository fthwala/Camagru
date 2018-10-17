<?php
session_start();
    class Login extends Controller
    {
	public static function log()
	{
	    if (isset($_POST['login'])) 
	    {
		    $user = $_POST['user'];
			$password = $_POST['password'];
			if (self::query('SELECT user FROM users WHERE user=:user', array(':user'=>$user)))
			{
				$checks_db = self::query('SELECT checks FROM users WHERE user=:user', array(':user'=>$user))[0]['checks'];
				if ($checks_db > 0)
				{
					if (self::query('SELECT user FROM users WHERE user=:user', array(':user'=>$user)))
					{
						$id = self::query('SELECT id FROM users WHERE user=:user', array(':user'=>$user))[0]['id'];
						if (self::query('SELECT user_id FROM login_tokens WHERE user_id=:user_id', array(':user_id'=>$id)))
						{
							echo "User already logged in! <br>";
							echo self::query('SELECT id FROM users WHERE user=:user', array(':user'=>$user))[0]['id'];
						}
						else
						{
							if (password_verify($password, self::query('SELECT password FROM users WHERE user=:user', array(':user'=>$user))[0]['password'])) 
							{
								$_SESSION['user'] = $_POST['user'];
								header('Location: workarea');
								$cstrong = True;
								$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
								$user_id = self::query('SELECT id FROM users WHERE user=:user', array(':user'=>$user))[0]['id'];
								self::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
								//self::query('INSERT INTO post_likes VALUES (\'\', :user, \'\', \'\')', array(':user'=>$user));
								
								echo "Im here";
								setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
								setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
							} 
							else 
							{
								echo 'Incorrect Password!';
							}
						}
					} 
					else 
					{
						echo 'User not registered!';
					}
				}
				else
				{
					echo "Your Account is not confirmed.<br /> Please check your emails for a confirmation link.";
				}
			}
			else
			{
				echo "User not registered!";
			}
		}      
	}

	/* Some serious hard-codding going on here */
	/* Add Email Preferance */
	public static function preferance_login()
	{
		if (isset($_POST['login']))
		{
			if (!file_exists("./email/preferance"))
			{
				if (!file_exists("./email/"))
					mkdir("./email");
				file_put_contents("./email/preferance", "1");
			}
			else if (file_exists("./email/preferance"))
			{
				$sent = 1;
				die();
			}
		}
	}
}
?>