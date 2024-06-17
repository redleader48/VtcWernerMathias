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


    public function getById($id)
    {
        $conducteur = new Conducteur();
        return $conducteur->getById($id);
    }

    public function update($id, $donnees)
    {
        $conducteur = new Conducteur();
        return $conducteur->update($id, $donnees);
    }

    public function delete($id)
    {
        $conducteur = new Conducteur();
        return $conducteur->delete($id);
    }
}
