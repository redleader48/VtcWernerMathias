<?php

require_once "view/header.html";
require_once "controller/ConducteurController.php";

$conducteur = new ConducteurController();
$conducteur->afficher();

$data = $conducteur->afficher();

if (!empty($data)) {
    echo '<div class="container"><table class="table table-bordered">';
    echo '<tr><th scope="col">id_conducteur</th><th scope="col">Prenom</th><th scope="col">Nom</th><th scope="col">Editer</th><th scope="col">Supprimer</th></tr>';

    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['prenom']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
        echo '<td><a href="conducteurEdit.php?&id=' . $row['id'] . '" class="btn btn-light">Editer</a></td>';
        echo '<td><a href="conducteurDelete.php?id=' . $row['id'] . '" class="btn btn-danger">Supprimer</a></td>';
        echo '</tr>';
    }

    echo '</table></div>';
} else {
    echo 'Aucune donnée trouvée.';
}

$conducteur = new ConducteurController();
$conducteur->ajouter();
