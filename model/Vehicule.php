<?php

require_once "iCRUD.php";
require_once "Connection.php";

class Vehicule extends Connection implements iCRUD {
    private $marque;
    private $model;
    private $couleur;
    private $immatriculation;

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->model;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setModele($model) {
        $this->model = $model;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }

    public function setImmatriculation($immatriculation) {
        $this->immatriculation = $immatriculation;
    }

    public function create($donnees) {
        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";
        }

        $sql = $db->prepare("INSERT INTO vehicule ($champs) VALUES ($valeurs)");
       
        if ($sql->execute()) {
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }

    public function read($id = null) {
        $db = Connection::getConnect();
        if($id){
        $sql = $db->prepare("SELECT * FROM vehicule WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = $db->prepare("SELECT * FROM vehicule");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);  
        }
    }
        public function update($id, $donnees){
            $db= Connection::getConnect();
            $set = "";

            foreach ($donnees as $indice => $valeur) {
                $set .= ($set ? ", "  : "") . "$indice = '$valeur'";
            }
            $sql =$db->prepare("UPDATE vehicule SET $set WHERE id = :id");
            $sql->bindParam(':id',$id);
            return $sql->execute();

            }

            public function delete($id){
                $db = Connection::getConnect();
                $sql = $db->prepare("DELETE FROM vehicule WHERE id = :id");
                $sql->bindParam(':id', $id);
                return $sql->execute();
            }
        }
            