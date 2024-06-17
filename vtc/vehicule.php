<?php

require_once "view/header.html";
require_once "controller/VehiculeController.php";

$vehicule = new VehiculeController();
$vehicule->afficher();

$data = $vehicule->afficher();

if (!empty($data)) {
    echo '<div class="container"><table class="table table-bordered">';
    echo '<tr><th scope="col">id_vehicule</th><th scope="col">Marque</th><th scope="col">Modele</th><th scope="col">Couleur</th><th scope="col">Immatriculation</th><th scope="col">Editer</th><th scope="col">Supprimer</th></tr>';

    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['marque']) . '</td>';
        echo '<td>' . htmlspecialchars($row['model']) . '</td>';
        echo '<td>' . htmlspecialchars($row['couleur']) . '</td>';
        echo '<td>' . htmlspecialchars($row['immatriculation']) . '</td>';
        echo '<td><a href="vehiculeEdit.php?id=' . $row['id'] . '" class="btn btn-light">Editer</a></td>';
        echo '<td><a href="vehiculeDelete.php?id=' . $row['id'] . '" class="btn btn-danger">Supprimer</a></td>';
        echo '</tr>';
    }

    echo '</table></div>';
} else {
    echo 'Aucune donnée trouvée.';
}

$vehicule->ajouter();
