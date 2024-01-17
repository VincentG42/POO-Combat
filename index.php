<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

$heroesManager =new HeroesManager($db) ;

if(isset($_POST['name']) && !empty($_POST['name'])){

    $heroesManager-> add(new Hero($_POST['name']));
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO Combat-Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="index_body">
    <form action="" method="post">
        <label for="name">Choose a name: </label>
        <input type="text" name="name" id="name" required />

        <button type="submit">Envoyer</button>
    </form>    


    <section id="heroes_list" class="row justify-content-around">
    <?php foreach($heroesManager -> findAllAlive() as $hero){?>
    <div class="hero_card w-25">
        <img src="./img/sylvanas.png" alt="sylvanas">
        <h3><?= $hero->getName()?></h3>
        <p> PV: <?= $hero->getHealthPoint()?></p>
        <form action="./fight.php" method="post">
            <input type="hidden" name="heroID" value="<?= $hero->getId()?>">
            <button type="submit">Choose</button>
        </form>
    </div>




    <?php } ?>
    </section>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>