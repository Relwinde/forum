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


function emailExits($mail){
    require 'connect.php';
    $stmt = $database->prepare("SELECT * FROM users WHERE userEmail = ?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    if($stmt->get_result()->num_rows>0){
        return true;
    }
    else{
        return false;
    }
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


function creatDev ($firstname, $lastname, $email, $pwde){
    require 'connect.php';
    $result;
    $role = "dev";
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


function modDev ($userID, $userFname, $userLname, $userPwd){
    require 'connect.php';
    $result;
    $stmt = $database->prepare("UPDATE users SET firstName=?, lastName=?, userPass=? WHERE userID =? ");
    $stmt->bind_param("ssss", $userFname, $userLname, $userPwd, $userID);
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
            $stmt->bind_result($_SESSION['userID'], $_SESSION['userFirstName'], $_SESSION['userLastName'], $_SESSION['userRole']);
            $stmt->fetch();
            $stmt->close();
            return $_SESSION['userRole'];
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}

function pwdChek ($userID, $passWd){
    require 'connect.php';
    $result = false;
    $userPass;
    $stmt = $database->prepare("SELECT userPass FROM users WHERE userID = ?");
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userPass);
    $stmt->fetch();
    if (password_verify( $passWd,$userPass)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function sendPost ($post, $userID){
        require 'connect.php';
        $date =date("Y/m/d/H:i:s");
        $stmt = $database->prepare("INSERT INTO post (userID, postContaint) VALUES (?, ?)");
        $stmt->bind_param("ss", $userID, $post);
        if($stmt->execute()){
            return true;
            $stmt->close();
        }
        else{
            return false;
            $stmt->close();
        }
    }











    function getUsersList (){
    require 'connect.php';
    $userID;
    $firstname;
    $lastName;
    $email;
    $stmt = $database->prepare("SELECT userID, firstName, lastName, userEmail FROM users WHERE userRole = ? ORDER BY firstName");
    $role = "dev";
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userID, $firstname, $lastName, $email);
    while ($stmt->fetch()){
        echo "
        <hr>
        <div class=element>

            <div class=main>
                <div class=name>
                    <h4><span>".$firstname."</span>".$lastName."</h4>
                </div>
                <div class=depart>
                    <h5>Dévellopeur</h5>
                </div>
                <div class=icon>
                    <img src=../images/list-icon.png alt=icone>
                </div>
            </div>
            <div class=option>
                <h4>".$email."</h4>
                <button class=delbut onclick=delUser(".$userID.")>
                    Supprimer</button>
            </div>
        </div>
        <hr class=bottomRow>
        ";
    }
} 


function delUser ($uSid){
    require 'connect.php';
    
    $stmt = $database->prepare("DELETE  FROM comment WHERE userID = ?");
    $stmt->bind_param("i", $uSid);
    $stmt->execute();
    $stmt->close();
    $stmt = $database->prepare("DELETE  FROM post WHERE userID = ?");
    $stmt->bind_param("i", $uSid);
    $stmt->execute();
    $stmt->close();
    $stmt = $database->prepare("DELETE  FROM users WHERE userID = ?");
    $stmt->bind_param("i", $uSid);
    $stmt->execute();
    $stmt->close();
} 


function postNumChek(){
    require 'connect.php';
    $stmt = $database->query("SELECT * FROM post");
    return $stmt->num_rows;
} 

function comNumChek(){
    require 'connect.php';
    $stmt = $database->query("SELECT * FROM comment");
    return $stmt->num_rows;
} 


function getPosts(){
    require 'connect.php';
    $userID;
    $postID;
    $postDate;
    $postContaint;
    $userFirstName;
    $userLastName;
    $stmt = $database->prepare("SELECT postID, userID, postContaint, postDate FROM post ORDER BY postID DESC");
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($postID,$userID, $postContaint, $postDate);
    while($stmt->fetch()){
        $comments = getComs($postID);
        $stmtTwo = $database->prepare("SELECT firstName, lastName FROM users WHERE userID=?");
        $stmtTwo->bind_param("i",$userID);
        $stmtTwo->execute();
        $stmtTwo->store_result();
        $stmtTwo->bind_result($userFirstName, $userLastName);
        $stmtTwo->fetch();
        echo ("
        <div class=postElement>
                    <h4><span>".$userFirstName."</span>".$userLastName."</h4>
                    <p class=post>".$postContaint."<br><span>".$postDate."</span></p>");
                    
        echo ("<div class=comment>".$comments."</div>");
        echo ("<input type=text class=com postID=".$postID." placeholder=Commenter>
                </div>
        ");
    }
    
    
 
} 


function sendCom ($userID, $postID, $comContaint){
        require 'connect.php';
        $stmt = $database->prepare("INSERT INTO comment (userID, postID, comContaint) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $userID, $postID,$comContaint);
        if($stmt->execute()){
            return true;
            $stmt->close();
        }
        else{
            return false;
            $stmt->close();
        }
    } 
    

    


 function getComs ($postId){
    require 'connect.php';
    $result ="";
    $comUserID;
    $comContaint;
    $comDate;
    $comUserFirstName;
    $comUserLastName;
    $stmt = $database->prepare("SELECT userID, comContaint, comDate FROM comment WHERE postID = ? ORDER BY comID ASC");
    $stmt->bind_param("s", $postId);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($comUserID, $comContaint, $comDate);
    while($stmt->fetch()){
        $stmtTwo = $database->prepare("SELECT firstName, lastName FROM users where userID = ?");
        $stmtTwo->bind_param("i", $comUserID);
        $stmtTwo->execute();
        $stmtTwo->store_result();
        $stmtTwo->bind_result($comUserFirstName, $comUserLastName);
        $stmtTwo->fetch();
        $result .= ("
        <element><span>".$comUserFirstName." ".$comUserLastName.":</span> ".$comContaint."<br><span class=dates>".$comDate."</span></element>");
    } 
    return $result;
} 


function deconUser (){
    session_unset();
    session_destroy();
    return true;
}


function getSearchPosts($searchValue){
    require 'connect.php';
    $userID;
    $postID;
    $postContaint;
    $userFirstName;
    $userLastName;
    $stmt = $database->prepare("SELECT postID, userID, postContaint FROM post ORDER BY postID DESC");
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($postID,$userID, $postContaint);
    while($stmt->fetch()){
        if(strpos($postContaint, $searchValue)!==false)
        {
        $comments = getComs($postID);
        $stmtTwo = $database->prepare("SELECT firstName, lastName FROM users WHERE userID=?");
        $stmtTwo->bind_param("i",$userID);
        $stmtTwo->execute();
        $stmtTwo->store_result();
        $stmtTwo->bind_result($userFirstName, $userLastName);
        $stmtTwo->fetch();
        echo ("
        <div class=postElement>
                    <h4><span>".$userFirstName."</span>".$userLastName."</h4>
                    <p class=post>".$postContaint."</p>");
                    
        echo ("<div class=comment>".$comments."</div>");
        echo ("<input type=text class=com postID=".$postID." placeholder=Commenter>
                </div>
        ");
    }
    }
    
    
 
} 