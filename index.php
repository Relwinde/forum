<?php
session_start();
$_SESSION['type'];
    require './process/functions.php';
    if(adminExist()){
        $_SESSION['type'] = "old";
        header("location: ./signin.html");
    }
    else{
        $_SESSION['type'] = "new";
         header("location: ./pages/register.php");
    }
    
   
         
         