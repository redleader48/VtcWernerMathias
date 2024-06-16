<?php
require_once "./controller/AssociationController.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $associationInstance = new AssociationController();
    $associationInstance->supprimer($id);
    header('Location: afficher_association.php');
}
?>