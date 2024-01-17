<?php


class FightsManager{
//     Créer automatiquement un monstre.


public function createMonster($name){
    $monster= new Monster($name);
    $monster -> setHealthPoint(100);

    return $monster;
} 
// Déclencher un combat et obtenir les résultats du combat.


public function fight(Hero $hero, Monster $monster){
         $fightSequence =[];

    if ($hero -> getHealthPoint() > 0){
        $fightSequence[] =  $monster ->hit($hero);
        
    if ($monster -> getHealthPoint() > 0){
        $fightsequence[] = $hero -> hit($monster);

    }
       

    }


}


}

?>