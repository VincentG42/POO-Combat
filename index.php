<?php
require_once('./config/db.php');
require_once('./classes/Hero.php');
require_once('./classes/HeroesManager.php');

if(isset($_POST['name']) && !empty($_POST['name'])){

    $heroesManager =new HeroesManager($database) ;
    $heroesManager-> add($hero = new Hero($_POST['name']));

    



}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Choose a name: </label>
        <input type="text" name="name" id="name" required />

        <button type="submit">Envoyer</button>

    </form>    









</body>
</html>