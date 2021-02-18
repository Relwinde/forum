<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/form.css">
    <title>Document</title>
</head>
<?php
    require '../process/functions.php';
    if(isset($_POST['add'])){
        if(pwdNotMatch($_POST['pwd'], $_POST['pwdRpt'])){
            header("location: ./admin.php?error=passwordmissmatch");
            exit();
        }
        if(emailExits($_POST['mail'])){
            header("location: ./admin.php?error=emailexists");
            exit();
        }
        $hash = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        if(creatDev($_POST['fname'],$_POST['lname'],$_POST['mail'],$hash)){
            header("location: ./admin.php?error=devcreated");
        }
    }
?>

<body>
    <div id="regist" class="">
        <form method="POST">
            <input type="text" name="fname" id="fname" placeholder="Nom">
            <input type="text" name="lname" id="lname" placeholder="Pénom(s)">
            <input type="email" name="mail" id="mail" placeholder="E-mail">
            <input type="password" name="pwd" id="usrPwd" placeholder="Mot de passe">
            <input type="password" name="pwdRpt" id="usrPwd" placeholder="Mot de passe">
            <button type="submit" name="add" id="connect">Ajouter</button>
        </form>
    </div>

    <script src="../boot/jquery-3.5.1.min.js"></script>
    <script src="../boot/bootstrap/js/bootstrap.js"></script>
</body>

</html>