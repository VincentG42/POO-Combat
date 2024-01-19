<?php


class FightsManager{
//     Créer automatiquement un monstre.


    public function createMonster(){
        $monster= new Monster();
        $monster -> setHealthPoint(100);

        return $monster;
    } 


// Déclencher un combat et obtenir les résultats du combat.


    public function fight(Hero $hero, Monster $monster){
            $fightSequence =[];  
            $i=0;
            while (true){
                
                if ($i%2 == 0){
                     $fightSequence[$i] =  $monster ->hit($hero);
                     
                    } else{
                        $fightSequence[$i] =  $hero ->hit($monster);
                    }
                    $i += 1;
                    
                    
                    if($monster -> getHealthPoint() <= 0 || $hero -> getHealthPoint() <= 0 ){
                        break;
                    }
        }
        return $fightSequence;
        
    }
    }
    ?>

