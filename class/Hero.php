<?php


class Hero{

    private int $id;

    private string $name;

    private int $healthPoint;

    private int $class;





    public function __construct(string $name){
        $this -> name = $name; 

         
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
        return $this-> class;
    }


    
    public function hit(Monster $monster): int{

      $damage = rand(10,30) ;       
        
        $monster -> setHealthPoint($monster -> getHealthPoint()- $damage);

        return $damage;
        }

    
}

?>