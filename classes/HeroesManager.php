<?php

class HeroesManager{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
//Enregistrer un nouveau héros en base de données.

    public function add( Hero $hero){
        $hero =new Hero;
        $request = $this->database->prepare("INSERT INTO heroes (name, health_point) VALUES (:name, :health_point)");
        $resultat = $request->execute(['name' => $this->getname(),
                                        'health_point' => $this-> getHealthPoints()
        ]);

    }

// Modifier un héros.
// Sélectionner un héros.
// Récupérer une liste de plusieurs héros vivants.
// Savoir si un héros existe.
}

?>