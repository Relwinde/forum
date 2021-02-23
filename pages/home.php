<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['userID'])){
    header("location: ../index.php");
}
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../style/home.css" />
</head>

<body>
    <div class="main">
        <center>
            <nav>
                <div class="homeSearch">
                    <div class="home">
                        <button>
                            <?php if($_SESSION['userRole']=="admin"){
                                 echo ("<a href=./admin.php><img src=../images/home-icon.png /></a>");
                            } 
                            else{
                              echo ("<a href=><img src=../images/home-icon.png /></a>");
                            }
                                 ?>
                        </button>
                    </div>
                    <div class="search">
                        <input class="search" type="text" name="" id="search" />
                    </div>
                </div>
                <div class="usrBase">
                    <div class="usrInf">
                        <h3><strong><?php echo ($_SESSION['userFirstName'])?></strong><?php echo ($_SESSION['userLastName'])?>
                        </h3>
                        <p><?php if($_SESSION['userRole']=="admin"){
                                 echo ("Administrteur");
                            } 
                            else{
                              echo ("Développeur");
                            }
                         ?></p>
                    </div>
                    <div class="userPic">
                        <img src="../images/user-pic.png" alt="" />
                    </div>
                    <button id="signOut">Se déconnecter</button>
                </div>
            </nav>
        </center>
    </div>
    <center>
        <div class="sect">
            <form id="form" class="comInput">
                <div class="textIcon">
                    <textarea name="" id="text" cols="30" rows="4"></textarea>
                    <img src="../images/send-icon.png" alt="" id="send" />
                    <input type="File" id="postImg" accept=".jpg,.jpeg,.png">
                </div>
            </form>
            <div class="postDiv" id="postDiv">
            </div>
        </div>
    </center>

    <script src="../boot/jquery-3.5.1.min.js"></script>
    <script src="../boot/bootstrap/js/bootstrap.js"></script>
    <script src="../scripts/home.js"></script>
</body>

</html>