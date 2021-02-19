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
    echo postNumChek();
} 

if (isset($_POST['comNum'])){
    echo comNumChek();
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

if(isset($_POST['getSearch'])){
    getSearchPosts($_POST['getSearch']);
}