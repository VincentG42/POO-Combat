<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

$heroesManager =new HeroesManager($db) ;

if(isset($_POST['name']) && !empty($_POST['name'])
&& (isset($_POST['class']) && !empty($_POST['class']))){

$return_value = match ($_POST['class']){
    '1' => new DeathKnight($_POST['name']),
    '2' => new Archer($_POST['name']),
    '3' => new Rogue($_POST['name']),
};
    $heroesManager-> add($return_value);
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
<body id="index_body" class="container-md p-5">
    <div id="form_card" class="row justify-content-center align-items-center my-1">
        <h1 class="text-center">Warcraft Fights</h1>
        <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center m-2 p-1 col-lg-4">
            <label for="name" class="form-label my-1">Choose a name: </label>
            <input type="text" name="name" id="name" class="form-control my-1" required />
            
            <select name="class" id="" class="form-label">
                <option> -- Choose a class --</option>
                <option value="1"> DeathKnight </option>
                <option value="2"> Archer </option>
                <option value="3"> Rogue </option>

            </select>
    
            <button type="submit" class="btn btn-light my-1">Create Fighter</button>
        </form>    
    </div>


    <section id="heroes_list" class="row justify-content-center gap-3">
    <?php foreach($heroesManager -> findAllAlive() as $hero){?>
    <div class="hero_card d-flex flex-column justify-content-center align-items-center">

        <img <?php if($hero->getClass()=== 1){
                        echo 'src="./img/arthas-lich-king.png" alt="Lich King"';
                    }else if($hero->getClass()=== 2){
                        echo ' src="./img/sylvanas.png" alt="sylvanas"';
                    }else if($hero->getClass()=== 3){
                        echo 'src="./img/illidan.png"';} ?> >

        <h3><?= $hero->getName()?></h3>
        <h4><?php if($hero->getClass()=== 1){
                        echo "DeathKnight";
                    }else if($hero->getClass()=== 2){
                        echo "Archer";
                    }else if($hero->getClass()=== 3){
                        echo "Rogue";}?></h4>
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