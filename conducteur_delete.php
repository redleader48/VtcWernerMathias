<?php

require_once "./model/Conducteur.php";

if (isset($_GET['id'])) {
    $conducteur = new Conducteur();
    $conducteur->delete($_GET['id']);
    header('Location: afficher_conducteur.php');
    exit();
} else {
    echo "ID conducteur non spécifié.";
}

?>