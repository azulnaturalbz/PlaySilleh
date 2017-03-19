<?php
/**
 * Created by PhpStorm.
 * User: Cspider
 * Date: 15/03/2017
 * Time: 04:47 AM
 */
session_start();
    function message(){
        if(isset($_SESSION["message"])){
            $output = "<div class= \"bg-info\">";
            $output .= htmlentities($_SESSION["message"]);
            $output .= "</div>";

            $_SESSION["message"] = null;
            return $output;
        }
    }
    function errors(){
        if(isset($_SESSION["errors"])){

            $errors = $_SESSION["errors"];


            $_SESSION["errors"] = null;
            return $errors;
        }
    }
?>