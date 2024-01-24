<?php

class HeroesManager{

    private PDO $db;

    private array $allHeroesAlive = [];

    public function __construct( PDO $db)
    {
        $this->db = $db;
    }

// Modifier un héros.
    public function update( Hero $hero){
    //    var_dump($hero);
        $request = $this->db->prepare("UPDATE heroes SET health_point = :health_point WHERE id = :id");
        $request->execute(['id' => $hero-> getId(),
                            'health_point' => $hero-> getHealthPoint()
        ]);
    
    }


//Enregistrer un nouveau héros en base de données.

    public function add(Hero $hero){
        
        $hero-> setHealthPoint(100);
        
        $request = $this->db->prepare("INSERT INTO heroes (name, health_point, class) VALUES (:name, :health_point, :class)");
        $request->execute(['name' => $hero-> getname(),
                            'health_point' => $hero-> getHealthPoint(),
                            'class' => $hero ->getClass()
        ]);
        $id = $this->db->lastInsertId();
        $hero-> setID($id);
    }

// Sélectionner un héros.

    public function find($id){
        $request = $this->db ->prepare("SELECT * FROM heroes WHERE heroes.id= :id"); // si on utlise une variable il vaut mieux passer 
        $request->execute([                                                         //par un prepare/execute pour des quesiotns de securité
                    'id' => $id
                ]);
        $newHero = $request->fetch();
        // var_dump($newHero);
        $return_value = match ($newHero['class']){
            1 => new DeathKnight($newHero['name']),
            2 => new Archer($newHero['name']),
            3 => new Rogue($newHero['name']),
        };
        $hero = $return_value;
        $hero-> setHealthPoint($newHero['health_point']);
        $hero-> setId($newHero['id']);
        return $hero;

    }

// Récupérer une liste de plusieurs héros vivants.

    public function findAllAlive(){
        
        $request = $this->db->query('SELECT * FROM heroes WHERE health_point > 0 ');
        $allHeroesDb = $request->fetchAll();
        // var_dump($allHeroesDb);
        foreach ($allHeroesDb as $hero){
            $childClass = match ($hero['class']){
                1 => new DeathKnight($hero['name']),
                2 => new Archer($hero['name']),
                3 => new Rogue($hero['name']),
            };
            
            $newHero = $childClass;

            $newHero-> setHealthPoint($hero['health_point']);
            $newHero-> setId($hero['id']);
            $this->allHeroesAlive[] = $newHero;
        }

        return $this-> allHeroesAlive;

    }

}

?>