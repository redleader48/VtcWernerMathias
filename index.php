<?php

require_once "view/header.html";
require_once "controller/ConducteurController.php";



$conducteur = new ConducteurController();

$conducteur->afficher();
$conducteur->ajouter();
//$conduteur->edit();
//$conduteur->supprimer();







