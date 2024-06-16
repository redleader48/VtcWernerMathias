<?php

require_once "./model/Vehicule.php";


class VehiculeController {

    public function ajouter(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vehicule = new Vehicule();

            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setCouleur($_POST['couleur']);
            $vehicule->setImmatriculation($_POST['immatriculation']);

            var_dump($vehicule->create($_POST));
            die;
        }

        require_once "./view/ajout_vehicule.html";
    }

    public function afficher() {
        $vehicule = new Vehicule();
        $vehicules = $vehicule->read();
        return $vehicules;
    }

    public function getById($id) {
        $vehicule = new Vehicule();
        return $vehicule->read($id);
    }

    public function modifier($id){
        $vehicule = new Vehicule();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $donnees = [
                'marque' => $_POST['marque'],
                'model' => $_POST['model'],
                'couleur' => $_POST['couleur'],
                'immatriculation' => $_POST ['immatriculation']
            ];
            $vehicule->update($id, $donnees);
            header('Location: afficher_vehicule.php');
        }else{
            $vehicule = $vehicule->read($id);

            require_once "./view/modifier_vehicule.php";
        }
        }
        public function supprimer($id){
            $vehicule = new Vehicule();
            $vehicule->delete($id);
            header('Location: afficher_vehicule.php');
        }
    }


        

