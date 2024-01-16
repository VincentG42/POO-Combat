<?php


class Hero{
    private string $name;

    private int $healthPoints;

    private PDO $db;

    public function __construct($name, $healthPoints=100){
        $this -> name = $name;
        $this -> healthPoints - $healthPoints;
        
    }

    public function hit(){

    }

    public function setName( string $name){
            $this->name = $name;
    }

    public function setHealthPoints(int $healthPoints){
         $this-> healthPoints = $healthPoints;
    }
    
    public function getName(){
        return $this->name;
    }

    public function getHealthPoints(){
        return $this-> healthPoints;
    }




}


?>