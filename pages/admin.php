<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta
               name="viewport"
               content="width=device-width, initial-scale=1.0"
          />
          <title>Admin Dashbord</title>
          <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.css" />
          <link rel="stylesheet" href="../style/admin.css" />
     </head>
     <body>
          <nav>
               <div class="left">
                    <button id="signUp">Deconnexion</button>
                    <h3><span>Admin</span>Name</h3>
               </div>
               <div class="right">
                    <ul>
                         <li><a href="">Membres</a></li>
                         <li><a href="">Discussions</a></li>
                    </ul>
               </div>
          </nav>
          <center>
               <section>
                    <div class="leftSect">
                         <h3>Ajouter un participant</h3>
                         <hr />
                          <div>
                               <?php
                              require './form.php';
                               ?>
                          </div>
                    </div>
                    <div class="rightSect">
                         <h3>Participants au forum</h3>
                         <hr />
                         <div>
                         <?php
                         require './list.php';
                         ?>
                         </div>
                    </div>
               </section>
          </center>
          <script src="../boot/jquery-3.5.1.min.js"></script>
          <script src="../boot/bootstrap/js/bootstrap.js"></script>
          <script src="../scripts/admin.js"></script>
     </body>
</html>
