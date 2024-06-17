<?php

require_once "iCRUD.php";
require_once "Connection.php";

class Vehicule extends Connection implements iCRUD
{

    private $marque;
    private $model;
    private $couleur;
    private $immatriculation;

    public function getMarque()
    {
        return $this->marque;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    public function setMarque($marque)
    {
        return $this->marque = $marque;
    }
    public function setModel($model)
    {
        return $this->model = $model;
    }
    public function setCouleur($couleur)
    {
        return $this->couleur = $couleur;
    }
    public function setImmatriculation($immatriculation)
    {
        return $this->immatriculation = $immatriculation;
    }

    public function create($donnees)
    {
        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";
        }

        $sql = $db->prepare("INSERT INTO vehicule ($champs)  VALUES ($valeurs)");
        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }

    public function read()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM vehicule ORDER BY id");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM vehicule WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $donnees)
    {
        $db = Connection::getConnect();
        $setClause = "";
        foreach ($donnees as $key => $value) {
            $setClause .= "$key = '$value', ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = $db->prepare("UPDATE vehicule SET $setClause WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();
    }

    public function delete($id)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("DELETE FROM vehicule WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();
    }
    public function getVehiculesSansConducteur()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("
            SELECT * FROM vehicule v
            WHERE NOT EXISTS (
                SELECT 1 FROM association_vehicule_conducteur avc
                WHERE avc.id_vehicule = v.id
            )
        ");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
