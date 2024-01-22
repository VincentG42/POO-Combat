<?php


class Rogue extends Hero{

    private int $class =3;

    public function __construct($name, $class=3)
    {
        parent::__construct($name);
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
            $damage = rand(5,20);
        }else if($monster-> getclass() === 2){
            $damage = rand(10,30);
        }else{
            $damage = rand(15,40);
        }
        
        
        $monster -> setHealthPoint($monster -> getHealthPoint()- $damage);

        return $damage;
        }
}





?>