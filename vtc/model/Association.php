<?php
//Werner
require_once 'Connection.php';

class Association extends Connection
{
    private $db;

    public function __construct()
    {
        $this->db = Connection::getConnect();
    }

    public function setAssociation($idConducteur, $idVehicule)
    {
        $sql = $this->db->prepare("INSERT INTO association_vehicule_conducteur (id_conducteur, id_vehicule, date_association) VALUES (:idConducteur, :idVehicule, CURDATE())");
        $sql->bindParam(':idConducteur', $idConducteur);
        $sql->bindParam(':idVehicule', $idVehicule);
        return $sql->execute();
    }

    public function read()
    {
        $sql = $this->db->prepare("
        SELECT 
        avc.id AS association_id,
        c.prenom,
        c.nom,
        c.id AS conducteur_id,
        v.model,
        v.marque,
        v.id AS vehicule_id
        FROM 
            association_vehicule_conducteur avc
        JOIN 
            conducteur c ON avc.id_conducteur = c.id
        JOIN 
            vehicule v ON avc.id_vehicule = v.id;
        ");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAssociationById($id)
    {
        $sql = $this->db->prepare("
            SELECT 
            avc.id AS association_id,
            c.id AS conducteur_id,
            v.id AS vehicule_id
            FROM 
                association_vehicule_conducteur avc
            JOIN 
                conducteur c ON avc.id_conducteur = c.id
            JOIN 
                vehicule v ON avc.id_vehicule = v.id
            WHERE avc.id = :id
        ");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAssociation($id, $idConducteur, $idVehicule)
    {
        $sql = $this->db->prepare("UPDATE association_vehicule_conducteur SET id_conducteur = :idConducteur, id_vehicule = :idVehicule WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':idConducteur', $idConducteur);
        $sql->bindParam(':idVehicule', $idVehicule);
        return $sql->execute();
    }

    public function delete($id)
    {
        $sql = $this->db->prepare("DELETE FROM association_vehicule_conducteur WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();
    }
}
