<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './process/functions.php';
 if (!isset($_SESSION['type'])){
    header("location: ./index.php");
}
if($_SESSION['type']=="new"){
    header("location: ./index.php");
}

if(isset($_POST['connect'])){
    if(!(connectUser($_POST['usrId'], $_POST['usrPwd']))){
        header("location: ./signin.php?error=connectionerror");
    }
    
    else{
        if ((connectUser($_POST['usrId'], $_POST['usrPwd']))=="admin"){
            header("location: ./pages/admin.php?connection:ok");
        }
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LacSoft Blog</title>
    <link rel="stylesheet" href="./boot/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div id="main" class="">
        <form method="POST">
            <div class="form-top">
                <input type="text" name="usrId" id="usrId" placeholder="E-mail">
                <input type="password" name="usrPwd" id="usrPwd" placeholder="Mot de passe">
                <button type="submit" name="connect" id="connect">Connexion</button>
            </div>
            <div class="form-bott">
            </div>
        </form>
    </div>

    <script src="boot/jquery-3.5.1.min.js"></script>
    <script src="boot/bootstrap/js/bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>