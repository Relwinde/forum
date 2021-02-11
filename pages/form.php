<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/form.css">
    <title>Document</title>
</head>
<body>
<div id="regist" class="">
        <form >
            <input type="text" name="fname" id="fname" placeholder="Nom">
            <input type="text" name="lname" id="lname" placeholder="Pénom(s)">
            <input type="email" name="mail" id="mail" placeholder="E-mail">
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
            <input type="password" name="pwd" id="usrPwd" placeholder="Mot de passe">
            <input type="password" name="pwd" id="usrPwd" placeholder="Mot de passe">
            <div>
            <div class="radioBut">
            <input type="radio" class="inline" name="dev" value="front">
            <label for="front" class="inline">Dev Front End</label>
            </div>
            <div class="radioBut">
            <input type="radio" class="inline" name="dev" value="back">
            <label for="back" class="inline">Dev Back End</label>
            </div>
        </div>
            <button type="submit" name="connect" id="connect">Ajouter</button>
           
    
        </form>
    </div>
    
    <script src="../boot/jquery-3.5.1.min.js"></script>
    <script src="../boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>