<?php

class Monster{

    private string $name;
    private int $healthPoint;
    private int $class;



    public function __construct(){
          $this->class = rand(1,3) ;
          if ($this-> class ===1){
            $this-> name = "Rogue BloodElf";
          } else if($this-> class ===2){
            $this-> name = "BloodElf Sorcerer";
          } else if($this-> class === 3){
             $this -> name = " Tauren Drood";
          }
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

    public function setclass(int $class){
        $this-> class = $class;
    }

    public function getClass(): int {
        return $this->class;
    }

    public function hit(Hero $hero): int{

        if($this-> getclass() === 1 && $hero-> getclass() === 1){
            $damage = rand(10,30);
        }else if($this-> getclass() === 1 && $hero-> getclass() === 2){
            $damage = rand(15,40);
        }else if($this-> getclass() === 1 && $hero-> getclass() === 3){
            $damage = rand(5,20);
        }else if($this-> getclass() === 2 && $hero-> getclass() === 1){
            $damage = rand(15,40);
        }else if($this-> getclass() === 2 && $hero-> getclass() === 2){
            $damage = rand(10,30);
        }else if($this-> getclass() === 2 && $hero-> getclass() === 3){
            $damage = rand(5,20);
        }else if($this-> getclass() === 3 && $hero-> getclass() === 1){
            $damage = rand(5,20);
        }else if($this-> getclass() === 3 && $hero-> getclass() === 2){
            $damage = rand(15,40);
        }else if($this-> getclass() === 3 && $hero-> getclass() === 3){
            $damage = rand(10,30);
        
        }
        $hero -> setHealthPoint($hero -> getHealthPoint()- $damage);

        return $damage;
    
    }

}

?>