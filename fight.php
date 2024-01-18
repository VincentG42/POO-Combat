<?php
require_once('./config/db.php');
require_once('./config/autoload.php');


$heroesManager = new HeroesManager($db) ;
// var_dump($heroesManager);


$currentHero = $heroesManager->find(intval($_POST['heroID']));
// var_dump('hello');

$fightManager = new FightsManager;
$currentMonster = $fightManager -> createMonster ('Lich King');

$fightResults = $fightManager-> fight($currentHero, $currentMonster);

$heroesManager -> update($currentHero);



// var_dump($currentHero);
// var_dump($currentMonster);


// var_dump($fightResults)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO Combat- Fight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="fight_body" class="p-5 d-flex flex-column align-items-center justify-content-center">
   

<section class="container my-5 d-flex flex-column align-items-center justify-content-center">
    <div class="row justify-content-around">
        <img src="./img/sylvanas.png" alt=" sylvanas" class="col-2" id="sylvanas_fight">
        <img src="./img/arthas-lich-king.png" alt="lich king" class="col-5">
    </div>
    <div class="mt-5 text-center w-50 row justify-content-center py-2" id="fight_sequence">
        <?php for ($i= 0; $i<count($fightResults); $i +=1){?>
                <p><?php if($i%2 == 0) {echo "<span class='fw-bold'>".$currentMonster-> getName()."</span> hits <span class='fw-bold'>". $currentHero -> getName(). "</span> for ".$fightResults[$i]." Hp";
                }else{echo "<span class='fw-bold'>".$currentHero-> getName()."</span> hits <span class='fw-bold'>". $currentMonster -> getName(). " </span> for ".$fightResults[$i]. " HP";} ?></p>


        <?php } ?>    
                <p><?php if($currentHero-> getHealthPoint()<=0){ echo $currentHero->getName()." dies AH AH AH AH ";
                }else{ echo $currentMonster->getName()." dies. Congrats!!!!";} ?></p>
    </div>
</section>

<div>
    <button class="btn btn-light"><a href="./index.php" class="link-underline link-underline-opcacity-0"> Home</a></button>
</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>