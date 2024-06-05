<?php

require_once "./model/Vehicule.php";

class VehiculeController
{

    public function afficher()
    {

        $vehicule = new Vehicule();
        return $vehicule->read();
    }

    public function ajouter()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vehicule  = new Vehicule();
            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setCouleur($_POST['couleur']);
            $vehicule->setImmatriculation($_POST['immatriculation']);
            var_dump($vehicule);
            $vehicule->create($_POST);
        }

        require_once "./view/ajout_vehicule.html";
    }
}