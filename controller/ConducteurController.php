<?php

require_once "./model/Conducteur.php";

class ConducteurController{

    public function ajouter(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conducteur  = new Conducteur();
            $conducteur->setPrenom($_POST['prenom']);
            $conducteur->setNom($_POST['nom']);

            var_dump($conducteur->create($_POST));
            die;
        }
        
        require_once "./view/ajout_conducteur.html";
    }

    public function afficher(){
        $conducteur = new Conducteur();
        $conducteurs = $conducteur->read();

        require_once "./afficher_conducteur.php";
    }

    public function modifier($id){
        $conducteur = new Conducteur();

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $donnees = [
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
            ];
            $conducteur->update($id, $donnees);
            header('Location: afficher_conducteur.php');
        }else{
            $conducteurD = $conducteur->read($id);
            //require_once "./view/modifier_conducteur.php";
        }
    }

    public function supprimer($id) {
        $conducteur = new Conducteur();
        $conducteur->delete($id);
        header('Location:afficher_conducteur.php');
        exit();
    }
}
