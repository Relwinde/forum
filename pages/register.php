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
          require '../process/functions.php';
           if(isset($_POST['connect'])){
                if(pwdNotMatch($_POST['pswd'], $_POST['pswdrepeat'])){
                     header("location: ./register.php?error=1");
                    }
               else{
                    $hpwd = password_hash($_POST['pswdrepeat'], PASSWORD_DEFAULT);
                    var_dump($hpwd);
                    
                   if(creatAdmin($_POST['fname'], $_POST['lname'], $_POST['mail'], $hpwd))
                   {
                        header("location: ../signin.html?error=0");                  
                   }
                   else {
                    header("location: ./register.php?error=2");
                   }
               }
           }
          ?>
    <div id="regist" class="">
        <h4>INSCRIVEZ VOUS EN TANT QUE ADMINISTRATEUR</h4>
        <form method="POST">
            <input type="text" required name="fname" id="fname" placeholder="Nom" />
            <input type="text" required name="lname" id="lname" placeholder="Pénom(s)" />
            <input type="email" required name="mail" id="mail" placeholder="E-mail" />
            <input type="password" required name="pswd" id="usrPwd" placeholder="Mot de passe" />
            <input type="password" required name="pswdrepeat" id="usrPwd" placeholder="Mot de passe" />
            <div>
                <div class="radioBut">
                    <input type="radio" class="inline" name="dev" value="front" />
                    <label for="front" class="inline">Dev Front End</label>
                </div>
                <div class="radioBut">
                    <input type="radio" class="inline" name="dev" value="back" />
                    <label for="back" class="inline">Dev Back End</label>
                </div>
            </div>
            <button type="submit" name="connect" id="connect">
                S'inscrire
            </button>
        </form>
    </div>

    <script src="../boot/jquery-3.5.1.min.js"></script>
    <script src="../boot/bootstrap/js/bootstrap.js"></script>
    <script src="../scripts/regist.js"></script>
</body>

</html>