<?php
function adminExist (){
    require 'connect.php';
     $stmt = $database->query(("SELECT * FROM users WHERE userRole='admin'"));
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
    $role = "admin";
    $stmt = $database->prepare("INSERT INTO users (firstName, lastName, userEmail, userPass, userRole) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $pwde,$role);
    if ($stmt->execute()) {
        $result = true;
        $stmt->close();
    } else {
        $result = false;
    }
    return $result;
}

function connectUser ($mail, $passwd){
    require 'connect.php';
    $stmt = $database->prepare("SELECT * FROM users WHERE userEmail = ?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    if ($stmt->get_result()->num_rows>0)
    {
        $stmt = $database->prepare("SELECT userPass FROM users WHERE userEmail = ?");
        $stmt->bind_param("s",$mail);
        $stmt->execute();
        $stmt->store_result();
        $hashPwd;
        $stmt->bind_result($hashPwd);
        $stmt->fetch();
        $stmt->close();
        if(password_verify($passwd, $hashPwd)){
            session_start();
            $stmt = $database->prepare("SELECT userID, firstName, lastName, userRole  FROM users WHERE userEmail = ?");
            $stmt->bind_param("s",$mail);
            $stmt->execute();
            $stmt->store_result();
            $role;
            $stmt->bind_result($_SESSION['userID'], $_SESSION['userFirstName'], $_SESSION['userLastName'], $role);
            $stmt->fetch();
            $stmt->close();
            return $role;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
    
}