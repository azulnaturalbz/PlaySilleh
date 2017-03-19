<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 18/03/2017
 * Time: 23:50 PM
 */
    //simple logout
    $_SESSION["admin_id"] = null;
    $_SESSION["username"] =null;
        redirect_to("login.php");

    //complex logout
    /*session_start();
        $_SESSION = array();
            if(isset($_COOKIE[session_name()]){
                setcookie(session_name(),'',time()-42000,'/');

            }
    session_destroy();
         redirect_to("login.php");*/
