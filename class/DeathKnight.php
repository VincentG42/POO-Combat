<?php


class DeathKnight extends Hero{

    private int $class =1;

    public function __construct($name, $class =1)
    {
        parent::__construct($name,);
        $this ->class = $class;
    }

    public function setClass($class) : void {
        $this->class= $class;
        
    }

    public function getClass() : int {
        return $this-> class;
    }



    public function hit(Monster $monster): int{

        if($monster-> getclass() === 1){
            $damage = rand(10,30);
        }else if($monster-> getclass() === 2){
            $damage = rand(15,40);
        }else{
            $damage = rand(5,20);
        }
        
        
        $monster -> setHealthPoint($monster -> getHealthPoint()- $damage);

        return $damage;
        }
}



?>