<?php
function adminExist (){
    require 'connect.php';
     $stmt = $database->query(("SELECT * FROM admins"));
     $result = $stmt->num_rows;
     if($result>0){
         header("location: ./signin.html");
         
     }
     else{
         header("location: ./pages/register.html");
         
     }
     
}