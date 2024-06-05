<?php

require_once "iCRUD.php";
require_once "Connection.php";

class Vehicule extends Connection implements iCRUD
{

    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;

    public function getMarque()
    {
        return $this->marque;
    }
    public function getModele()
    {
        return $this->modele;
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
    public function setModele($modele)
    {
        return $this->modele = $modele;
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
}
