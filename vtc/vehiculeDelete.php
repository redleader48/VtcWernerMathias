<?php
require_once "view/header.html";
require_once './controller/VehiculeController.php';

$vehiculeController = new VehiculeController();

if (isset($_GET['id'])) {
    $vehiculeId = $_GET['id'];
    $vehicule = $vehiculeController->getById($vehiculeId);

    if (!$vehicule) {
        echo "Vehicule not found.";
        exit;
    }
} else {
    echo "No vehicule ID provided.";
    exit;
}

if (isset($_GET['id'])) {
    $vehiculeController = new VehiculeController();
    $vehiculeId = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['confirm'])) {
            if ($vehiculeController->delete($vehiculeId)) {
                echo "Vehicule deleted successfully!";
            } else {
                echo "Failed to delete vehicule.";
            }
        }
    }
} else {
    echo "No vehicule ID provided.";
    exit;
}
?>

<div class="container">
    <h3>Current Vehicule Details</h3>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th scope="col">ID Vehicule</th>
                <th scope="col">Marque</th>
                <th scope="col">Modele</th>
                <th scope="col">Couleur</th>
                <th scope="col">Immatriculation</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($vehicule['id']); ?></td>
                <td><?php echo htmlspecialchars($vehicule['marque']); ?></td>
                <td><?php echo htmlspecialchars($vehicule['model']); ?></td>
                <td><?php echo htmlspecialchars($vehicule['couleur']); ?></td>
                <td><?php echo htmlspecialchars($vehicule['immatriculation']); ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Supprimer ce véhicule
    </button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer ce véhicule ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Supprimer ce véhicule ?
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="submit" name="confirm" value="Confirmer la supression" class="btn btn-primary">
                    <a href="association.php" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>