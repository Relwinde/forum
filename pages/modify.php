<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LacSoft Blog</title>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/regist.css" />
</head>

<body>
    <?php
    session_start();
          require '../process/functions.php';
          if (!isset($_SESSION['type'])){
               header("location: ../index.php");
          }
          
          
          
           if(isset($_POST['modify'])){
               
               if (!pwdChek($_SESSION['userID'], $_POST['actPwd'])){
                header("location: ./modify.php?error=1");
                exit();
               }
                if(pwdNotMatch($_POST['pswd'], $_POST['pswdrepeat'])){
                    header("location: ./modify.php?error=2");
                    exit();
                    }
               else{
                    $hpwd = password_hash($_POST['pswdrepeat'], PASSWORD_DEFAULT);
                    
                   if( modDev ($_SESSION['userID'], $_POST['fname'], $_POST['lname'], $hpwd))
                   {
                        deconUser();
                        header("location: ../index.php?infosmodified");
                   }
                   else {
                    header("location: ./modify.php?error=3");
                   }
               }
           }
          ?>


    <div id="regist" class="">
        <h3>Modifier les informations de votre compte</h3>
        <form method=" POST">
            <input type="text" required value=<?php echo $_SESSION['userFirstName'];?> name="fname" id="fname"
                placeholder="Nom" />
            <input type="text" required value=<?php echo $_SESSION['userLastName'];?> name="lname" id="lname"
                placeholder="Pénom(s)" />
            <input type="password" required name="actPwd" id="usrPwd" placeholder="Mot de passe actuel" />
            <input type="password" required name="pswd" id="usrPwd" placeholder="Nouveau mot de passe" />
            <input type="password" required name="pswdrepeat" id="usrPwd" placeholder="Nouveau mot de passe" />

            <button type="submit" name="modify" id="connect">
                Enregistrer
            </button>
        </form>
    </div>

    <script src="../boot/jquery-3.5.1.min.js"></script>
    <script src="../boot/bootstrap/js/bootstrap.js"></script>
    <script src="../scripts/regist.js"></script>
</body>

</html>