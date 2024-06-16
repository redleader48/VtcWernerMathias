<?php 
require_once "./model/Association.php";
require_once "./model/connection.php";
require_once "./model/Vehicule.php";
require_once "./model/Conducteur.php";
class AssociationController{
    private $association;

    public function __construct(){
        $this->association= new Association();
    }

    public function ajouter(){
        if($_SERVER["REQUEST_METHOD"] == "POSTE"){
            $association = new Association(); //création instance de l'objet Association
            $association-> setConducteurId($_POST['conducteur_id']);
            $association->setVehiculedId($_POST['vehicule_id']);
            $association->create($_POST);
        }

        //création instance objet conducteur
        $conducteur = new Conducteur();
        $conducteur = $conducteur->read();// récuperation tout les conducteur de la BD

        $vehicule = new Vehicule();
        $vehicule = $vehicule->read();

        require_once "./view/ajout_association.php";
}

// méthode d'affichage des associations qui existes déjà
public function afficher(){
//$association = new Association();
//récuperation des association avec jointure pour obtenir détails conduteur et vehicule
//$associations = $association->readJoin();
return $this->association->readJoin();

//require_once "./afficher_association.php";
}

public function modifier($id, $donnees) {
    $association = new Association();
    $association->update($id, $donnees);
}

public function supprimer($id) {
    $association = new Association();
    $association->delete($id);
}

public function getById($id) {
    $association = new Association();
    return $association->read();
}
}

?>