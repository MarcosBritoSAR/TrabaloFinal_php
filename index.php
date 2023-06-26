<?php 

    session_start();

    if(isset($_SESSION["login"])){
        if($_SESSION["login"] == true){
            include "template_home.php";
        }else{
            include "template_login.php";
        }
    }else{
        $_SESSION["login"] = false;
    }








?>