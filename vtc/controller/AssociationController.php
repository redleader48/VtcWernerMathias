<?php
require_once './model/Connection.php';

class AssociationController extends Connection
{

    public function setAssociation($idConducteur, $idVehicule)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("INSERT INTO association_vehicule_conducteur (id_conducteur, id_vehicule, date_association) VALUES (:idConducteur, :idVehicule, CURDATE())");
        $sql->bindParam(':idConducteur', $idConducteur);
        $sql->bindParam(':idVehicule', $idVehicule);
        return $sql->execute();
    }

    public function read()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("
        SELECT 
        avc.id AS association_id,
        c.prenom,
        c.nom,
        c.id AS conducteur_id,
        v.modele,
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
}
