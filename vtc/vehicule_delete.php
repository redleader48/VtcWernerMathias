<?php
require_once "./controller/VehiculeController.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $vehiculeInstance = new VehiculeController();
    $vehiculeInstance->supprimer($id);
    header('Location: afficher_vehicule.php');
}
?>