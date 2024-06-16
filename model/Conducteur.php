<?php

require_once "iCRUD.php";
require_once "Connection.php";

class Conducteur extends Connection implements iCRUD{
    private $prenom;
    private $nom;

    public function getPrenom(){
        return $this->prenom;
    }
 
    public function getNom(){
        return $this->nom;
    }
    public function setPrenom($prenom){
        return $this->prenom =$prenom;
    }
 
    public function setNom($nom){
        return $this->nom = $nom;
    }

    public function create($donnees){
       $db = Connection::getConnect();

       $champs = "";
       $valeurs = "";

       foreach ($donnees as $indice => $valeur) {
        $champs .= ($champs ? "," : "").$indice;
        $valeurs .= ($valeurs ? "," : "")."'$valeur'";
       }

       $sql = $db->prepare("INSERT INTO conducteur ($champs)  VALUES ($valeurs)");
       if ($sql->execute()) {
        //REDIRECTION SUR LA MM PAGE
        header('Location:' .$_SERVER['PHP_SELF']);
       }
    }

    public function read($id = null){
        $db = Connection::getConnect();

        $sql = $db->prepare("SELECT * FROM conducteur");

        if ($sql->execute()) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


    public function update($id, $donnees){
        $db = Connection::getConnect();
        $set="";

        foreach ($donnees as $indice => $valeur){
        $set .=($set ? ", " : "") . "$indice = $valeur'";
        }

        $sql = sdb->prepare("UPDATE conducteur SET $set WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();

    }

    public function delete($id){
        $db = Connection::getConnect();
        $sql = $db->prepare("DELETE FROM conducteur WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();
    }
}


