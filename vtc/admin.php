<?php
require_once "view/header.html";
require_once "controller/AdminController.php";

$adminController = new AdminController();
$data = $adminController->getStatistics();

?>

<div class="container">
    <h1>Page d'Administration</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre de conducteurs</h5>
                    <p class="card-text"><?= $data['num_conducteurs'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre de véhicules</h5>
                    <p class="card-text"><?= $data['num_vehicules'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre d'associations</h5>
                    <p class="card-text"><?= $data['num_associations'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <h2>Véhicules sans conducteur</h2>
    <table class="table table-bordered">
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Immatriculation</th>
        </tr>
        <?php foreach ($data['vehicules_sans_conducteur'] as $vehicule) : ?>
            <tr>
                <td><?= htmlspecialchars($vehicule['marque']) ?></td>
                <td><?= htmlspecialchars($vehicule['model']) ?></td>
                <td><?= htmlspecialchars($vehicule['couleur']) ?></td>
                <td><?= htmlspecialchars($vehicule['immatriculation']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Conducteurs sans véhicule</h2>
    <table class="table table-bordered">
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
        <?php foreach ($data['conducteurs_sans_vehicule'] as $conducteur) : ?>
            <tr>
                <td><?= htmlspecialchars($conducteur['prenom']) ?></td>
                <td><?= htmlspecialchars($conducteur['nom']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>