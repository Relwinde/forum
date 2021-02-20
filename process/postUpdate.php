<?php 
session_start();
include './functions.php';

if (isset($_POST['postNum'])){
    echo postNumChek();
} 