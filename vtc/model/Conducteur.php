<?php

require_once "iCRUD.php";
require_once "Connection.php";

class Conducteur extends Connection implements iCRUD
{
    private $prenom;
    private $nom;

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setPrenom($prenom)
    {
        return $this->prenom = $prenom;
    }

    public function setNom($nom)
    {
        return $this->nom = $nom;
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

        $sql = $db->prepare("INSERT INTO conducteur ($champs)  VALUES ($valeurs)");
        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }

    public function read()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM conducteur ORDER BY id");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM conducteur WHERE id = :id");
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

        $sql = $db->prepare("UPDATE conducteur SET $setClause WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();
    }

    public function delete($id)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("DELETE FROM conducteur WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();
    }
    public function getConducteursSansVehicule()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("
            SELECT * FROM conducteur c
            WHERE NOT EXISTS (
                SELECT 1 FROM association_vehicule_conducteur avc
                WHERE avc.id_conducteur = c.id
            )
        ");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
