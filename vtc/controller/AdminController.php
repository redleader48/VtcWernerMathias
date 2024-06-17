<?php

require_once "./model/Conducteur.php";
require_once "./model/Vehicule.php";
require_once "./model/Association.php";

class AdminController
{
    public function getStatistics()
    {
        $conducteur = new Conducteur();
        $vehicule = new Vehicule();
        $association = new Association();

        $num_conducteurs = count($conducteur->read());
        $num_vehicules = count($vehicule->read());
        $num_associations = count($association->read());

        $vehicules_sans_conducteur = $vehicule->getVehiculesSansConducteur();
        $conducteurs_sans_vehicule = $conducteur->getConducteursSansVehicule();

        return [
            'num_conducteurs' => $num_conducteurs,
            'num_vehicules' => $num_vehicules,
            'num_associations' => $num_associations,
            'vehicules_sans_conducteur' => $vehicules_sans_conducteur,
            'conducteurs_sans_vehicule' => $conducteurs_sans_vehicule
        ];
    }
}
