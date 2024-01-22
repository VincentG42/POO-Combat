<?php
require_once('./config/db.php');
require_once('./config/autoload.php');


$heroesManager = new HeroesManager($db) ;
// var_dump($heroesManager);


$currentHero = $heroesManager->find(intval($_POST['heroID']));
// var_dump('hello');
// var_dump($currentHero);

$fightManager = new FightsManager;
$currentMonster = $fightManager -> createMonster ();
// var_dump($currentMonster);

$fightResults = $fightManager-> fight($currentHero, $currentMonster);

$heroesManager -> update($currentHero);




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
    <div class="row justify-content-around" class="fighters_img">
        <img  id="fighter_user" class="col-3" <?php if($currentHero->getClass()=== 1){
                        echo 'src="./img/arthas-lich-king.png" alt="Lich King"';
                    }else if($currentHero->getClass()=== 2){
                        echo ' src="./img/sylvanas.png" alt="sylvanas"';
                    }else if($currentHero->getClass()=== 3){
                        echo 'src="./img/illidan.png"';} ?> >

        <img  id="fighter_monster" class="col-3" <?php if($currentMonster->getClass()=== 1){
                        echo 'src="./img/eds_rogue.png" alt="Rogue BloodElf"';
                    }else if($currentMonster->getClass()=== 2){
                        echo ' src="./img/eds_sorcerer.png" alt="BloodElf Sorcerer"';
                    }elseif($currentMonster->getClass()=== 3){
                        echo 'src="./img/tauren.png" alt="Tauren"';} ?> >
        
    </div>
    <div class="mt-5 text-center w-50 row justify-content-center py-2" id="fight_sequence">
        <?php for ($i= 0; $i<count($fightResults); $i +=1){?>
                <p>
                    <?php if($i%2 == 0 && $fightResults[$i] <= 30) {echo "<span class='fw-bold'>".$currentMonster-> getName()."</span> hits <span class='fw-bold'>". ucfirst($currentHero -> getName()). "</span> for ".$fightResults[$i]." Hp";
                        } else if (($i%2 == 0 && $fightResults[$i]> 30)) {echo "<span class='fw-bold'>".$currentMonster-> getName()."</span> hits <span class='fw-bold'>".ucfirst($currentHero -> getName()). "</span> for <span class='crit'> ".$fightResults[$i]." (crit) </span> Hp";
                        } else if($i%2 != 0 && $fightResults[$i] <= 30) {echo "<span class='fw-bold'>".ucfirst($currentHero -> getName())."</span> hits <span class='fw-bold'>". $currentMonster -> getName(). " </span> for ".$fightResults[$i]. " HP";
                        } else {echo "<span class='fw-bold'>".ucfirst($currentHero -> getName())."</span> hits <span class='fw-bold'>". $currentMonster -> getName(). "</span> for <span class='crit'> ".$fightResults[$i]." (crit) </span> Hp";} 
                    ?>
                       
            </p>


        <?php } ?>    
                <p><?php if($currentHero-> getHealthPoint()<=0){ echo "<span class='fw-bold'>". ucfirst($currentHero -> getName())."</span> dies AH! AH! AH! AH! ";
                }else{ echo "<span class='fw-bold'>" .$currentMonster->getName()."</span> dies. Congrats!!!!";} ?></p>
    </div>
</section>

<div>
    <button class="btn btn-light"><a href="./index.php" class="link-underline link-underline-opcacity-0"> Home</a></button>
</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>