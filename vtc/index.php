<?php

require_once "view/header.html";
require_once "controller/ConducteurController.php";

$conducteur = new ConducteurController();
$conducteur->afficher();

$data = $conducteur->afficher();

if (!empty($data)) {
    echo '<div class="container"><table class="table table-bordered">';
    echo '<tr><th scope="col">id_conducteur</th><th scope="col">Prenom</th><th scope="col">Nom</th><th scope="col">Editer</th></tr>';

    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['prenom']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
        echo '<td><a href="../view/showConducteur.php?&id=' . $row['id'] . '">Editer</a></td>';
        echo '</tr>';
    }

    echo '</table></div>';
} else {
    echo 'Aucune donnée trouvée.';
}

$conducteur = new ConducteurController();
$conducteur->ajouter();
