<?php

class Monster{

    private string $name;
    private int $healthPoint;


    public function __construct($name){
          $this->name = $name ;
    }

    public function setName( string $name){
        $this->name = $name;
}

public function setHealthPoint(int $healthPoint){
     $this-> healthPoint = $healthPoint;
}

public function getName(): string {
    return $this->name;
}

public function getHealthPoint() : int {
    return $this-> healthPoint;
}

public function hit(Hero $hero): int{
    $damage = rand(0,50);
    
    $hero -> setHealthPoint($hero -> getHealthPoint()- $damage);

    return $damage;
}
  
}



?>