<?php
session_start();
class Logout extends Controller
{
    public static function out()
    {
        //$user = $_SESSION['user'];
        include('./config/loggin.php');
        if (!Loggin::isLoggedIn())
        {
                die("Not logged in.");
        }
        if (isset($_POST['confirm']))
        {
                if (isset($_POST['alldevices']))
                {
                        self::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
                }
                else
                {
                        if (isset($_COOKIE['SNID']))
                        {
                                self::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
                        }
                        setcookie('SNID', '1', time()-3600);
                        setcookie('SNID_', '1', time()-3600);
                }
                header('Location: finish');
                session_destroy();
        }
    }


    /* Some serious hard-codding going on here */
    /* Remove Email Preferance */
    public static function preferance_logout()
    {
        if (isset($_POST['confirm']))
        {
            if (!file_exists("./email/preferance"))
            {
                die();
            }
            else if (file_exists("./email/preferance"))
            {
                //unlink("./email/preferance");
                array_map('unlink', glob("./email/preferance"));
            }
        }
    }
}
?>
