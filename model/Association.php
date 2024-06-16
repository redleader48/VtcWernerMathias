<?php

require_once "Connection.php";
require_once "iCRUD.php";

class Association extends Connection implements iCRUD {
    private $conducteur_id;
    private $vehicule_id;

    public function getConducteurId(){
        return $this->conducteur_id;
}

public function setConducteurId($conducteur_id){
    $this->conducteur_id = $conducteur_id;
}

public function getVehiculeId(){
    return $this->vehicule_id;
}
public function setVehiculeId($vehicule_id){
    $this->vehicule_id = $vehicule_id;
}
//méthode pour creer une nouvelle association dans la BD 
public function create($donnees){
    //connexion à la BD
    $db = Connection::getConnect();
    $champs="";
    $valeurs="";

    foreach($donnees as $indice => $valeur){
        $champs .=($champs ? "," :"") . $indice;
      $valeurs .=($valeurs ? "," : "") . "'$valeur'";  
}

$sql = $db->prepare("INSERT INTO association ($champs) VALUES ($valeurs)");
if ($sql->execute()){
    header('Location:' . $_SERVER['PHP_SELF']);
}
}
public function read(){
    $db = Connection::getConnect();

    $sql = $db->prepare("SELECT * FROM association");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function readJoin(){
    $db = Connection::getConnect();
    $sql = $db->prepare("SELECT avc.id, c.prenom, c.nom, v.marque, v.model, v.couleur, v.immatriculation FROM association avc JOIN conducteur c ON avc.conducteur_id = c.id JOIN vehicule v ON avc.vehicule_id = v.id");
    $sql->execute();
    //retourne les résultats sous forme de tableau associatif
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function update($id, $donnees){
    $db = Connection::getConnect();
    $set = "";

    foreach ($donnees as $indice => $valeur){
        $set .=($set ? ", " : "") . "$indice = $valeur'";
    }
    $sql = sdb->prepare("UPDATE association SET $set WHERE id = :id");
    if ($sql->execute()){
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();

}
}
public function delete($id){
    $db = Connection::getConnect();
    $sql = $db->prepare("DELETE FROM association WHERE id = :id");
    if ($sql->execute()){
        header('Location:' . $_SERVER['PHP_SELF']);
        exit(); 
}
}
}

?>