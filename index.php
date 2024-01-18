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
<body id="index_body" class="container p-5">
    <div id="form_card" class="row justify-content-center align-items-center my-5">
        <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center my-5 p-3 w-25">
            <label for="name" class="form-label my-2">Choose a name: </label>
            <input type="text" name="name" id="name" class="form-control my-2" required />
    
            <button type="submit" class="btn btn-light my-2">Envoyer</button>
        </form>    
    </div>


    <section id="heroes_list" class="row justify-content-center gap-3">
    <?php foreach($heroesManager -> findAllAlive() as $hero){?>
    <div class="hero_card d-flex flex-column justify-content-center align-items-center">
        <img src="./img/sylvanas.png" alt="sylvanas">
        <h3><?= $hero->getName()?></h3>
        <p> HP: <?= $hero->getHealthPoint()?></p>
        <form action="./fight.php" method="post">
            <input type="hidden" name="heroID" value="<?= $hero->getId()?>">
            <button type="submit" class="btn btn-light">Choose</button>
        </form>
    </div>

    



    <?php } ?>
    </section>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>