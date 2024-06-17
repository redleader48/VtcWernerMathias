<?php
require_once './model/Association.php';

class AssociationController
{
    private $association;

    public function __construct()
    {
        $this->association = new Association();
    }

    public function setAssociation($idConducteur, $idVehicule)
    {
        return $this->association->setAssociation($idConducteur, $idVehicule);
    }

    public function read()
    {
        return $this->association->read();
    }

    public function getAssociationById($id)
    {
        return $this->association->getAssociationById($id);
    }

    public function updateAssociation($id, $idConducteur, $idVehicule)
    {
        return $this->association->updateAssociation($id, $idConducteur, $idVehicule);
    }

    public function delete($id)
    {
        return $this->association->delete($id);
    }
}
