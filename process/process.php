<?php 
session_start();
include './functions.php';
if(isset($_POST['postContaint'])){   
   if (sendPost($_POST['postContaint'], $_SESSION['userID'])){
       echo true;
   }  
}

if(isset($_POST['getList'])){
    getUsersList();
} 

if (isset($_POST['delete'])){
    $id = (int)$_POST['usrID'];
    delUser($id);
} 

if (isset($_POST['postNum'])){
    echo (int)postNumChek();
} 

if(isset($_POST['getPosts'])){
    getPosts();
} 


if(isset($_POST['postID'])){
    sendCom ($_SESSION['userID'], $_POST['postID'], $_POST['comContaint']);
}  
if(isset($_POST['deconnect'])){
    return deconUser();
}