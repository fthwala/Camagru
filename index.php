<?php
define('ROOT_DIR', dirname(__FILE__));

    require_once('Routes.php');
    include ("config/Setup.php");
    //include('./classes/Loggin.php');
    function __autoload($class_name)
    {
        if (file_exists(ROOT_DIR.'/config/'.$class_name.'.php'))
            require_once ROOT_DIR.'/config/'.$class_name.'.php';
        else if (file_exists(ROOT_DIR.'/Controllers/'.$class_name.'.php'))
            require_once ROOT_DIR.'/Controllers/'.$class_name.'.php';
    }

?>

