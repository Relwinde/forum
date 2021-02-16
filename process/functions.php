<?php
function adminExist (){
    require 'connect.php';
     $stmt = $database->query(("SELECT * FROM admins"));
     $result = $stmt->num_rows;
     if($result>0){
         return true;
     }
     
     else{ 
         return false;
     }
     
}

function pwdNotMatch($pwd, $pwdrpt)
{
    $result = false;
    if ($pwd !== $pwdrpt) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function creatAdmin ($firstname, $lastname, $email, $pwde){
    require 'connect.php';
    $result;
    $stmt = $database->prepare("INSERT INTO admins (fname, lname, email, userpass) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $pwde);
    if ($stmt->execute()) {
        $result = true;
        $stmt->close();
    } else {
        $result = false;
    }
    return $result;
}