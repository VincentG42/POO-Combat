<?php


class Hero{

    private int $id;

    private string $name;

    private int $healthPoint;

    private int $class;



    public function __construct(string $name, int $class){
        $this -> name = $name;        
        $this-> class = $class;  
    }   
    
    public function setId( int $id){
         $this->id =$id;
    }

    public function setName( string $name){
            $this->name = $name;
    }

    public function setHealthPoint(int $healthPoint){
         $this-> healthPoint = $healthPoint;
    }

    public function setClass( string $classe){
        $this->class = $classe;
}
    
    public function getId() : int{
        return $this-> id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getHealthPoint() : int {
        return $this-> healthPoint;
    }

    public function getClass() : int {
        return $this->  class;
    }

    public function hit(Monster $monster): int{
        if($this-> getclass() === 1 && $monster-> getclass() === 1){
            $damage = rand(10,30);
        }else if($this-> getclass() === 1 && $monster-> getclass() === 2){
            $damage = rand(15,40);
        }else if($this-> getclass() === 1 && $monster-> getclass() === 3){
            $damage = rand(5,20);
        }else if($this-> getclass() === 2 && $monster-> getclass() === 1){
            $damage = rand(15,40);
        }else if($this-> getclass() === 2 && $monster-> getclass() === 2){
            $damage = rand(10,30);
        }else if($this-> getclass() === 2 && $monster-> getclass() === 3){
            $damage = rand(5,20);
        }else if($this-> getclass() === 3 && $monster-> getclass() === 1){
            $damage = rand(5,20);
        }else if($this-> getclass() === 3 && $monster-> getclass() === 2){
            $damage = rand(15,40);
        }else if($this-> getclass() === 3 && $monster-> getclass() === 3){
            $damage = rand(10,30);
        
        $monster -> setHealthPoint($monster -> getHealthPoint()- $damage);

        }
        return $damage;
    }
}

?>