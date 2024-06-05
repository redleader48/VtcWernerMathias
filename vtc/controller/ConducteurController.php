<?php

require_once "./model/Conducteur.php";

class ConducteurController
{

    public function afficher()
    {

        $conducteur = new Conducteur();
        return $conducteur->read();
    }

    public function ajouter()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conducteur  = new Conducteur();
            $conducteur->setPrenom($_POST['prenom']);
            $conducteur->setNom($_POST['nom']);
            $conducteur->create($_POST);
        }

        require_once "./view/ajout_conducteur.html";
    }
}
