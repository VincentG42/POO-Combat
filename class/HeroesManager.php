<?php

require_once('./config/autoload.php');

class HeroesManager{

    private PDO $db;

    private array $allHeroesAlive = [];

    public function __construct( PDO $db)
    {
        $this->db = $db;
    }

// Modifier un héros.
    public function update( Hero $hero){
       var_dump($hero);
        $request = $this->db->prepare("UPDATE heroes SET health_point = :health_point WHERE id = :id");
        $request->execute(['id' => $hero-> getId(),
                            'health_point' => $hero-> getHealthPoint()
        ]);
    
    }


//Enregistrer un nouveau héros en base de données.

    public function add(Hero $hero){
        
        $hero-> setHealthPoint(100);
        
        $request = $this->db->prepare("INSERT INTO heroes (name, health_point) VALUES (:name, :health_point)");
        $request->execute(['name' => $hero-> getname(),
                            'health_point' => $hero-> getHealthPoint()
        ]);
        $id = $this->db->lastInsertId();
        $hero-> setID($id);

    }
// Sélectionner un héros.

    public function find($id){
        $request = $this->db->query("SELECT * FROM heroes WHERE heroes.id='$id' ");
        $newHero = $request->fetch();
        // var_dump($newHero);
        $hero = new Hero($newHero['name']);
        $hero-> setHealthPoint($newHero['health_point']);
        $hero-> setId($newHero['id']);
        return $hero;

    }
// Récupérer une liste de plusieurs héros vivants.
    public function findAllAlive(){
        
        $request = $this->db->query('SELECT * FROM heroes WHERE health_point>0 ');
        $allHeroesDb = $request->fetchAll();
        // var_dump($allHeroesDb);
        foreach ($allHeroesDb as $hero){
            $newHero = new Hero($hero['name']);
            $newHero-> setHealthPoint($hero['health_point']);
            $newHero-> setId($hero['id']);
            $this->allHeroesAlive[] = $newHero;
        }

        return $this-> allHeroesAlive;

    }
// Savoir si un héros existe.
}

?>