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

if (isset($_POST['submit'])) {
    $marque = $_POST['marque'];
    $model = $_POST['model'];
    $couleur = $_POST['couleur'];
    $immatriculation = $_POST['immatriculation'];

    $donnees = [
        'marque' => $marque,
        'model' => $model,
        'couleur' => $couleur,
        'immatriculation' => $immatriculation
    ];

    if ($vehiculeController->update($vehiculeId, $donnees)) {
        echo "Vehicule updated successfully!";
    } else {
        echo "Failed to update vehicule.";
    }
}

?>

<div class="container">
    <h3>Current Vehicule Details</h3>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th scope="col">ID Vehicule</th>
                <th scope="col">Marque</th>
                <th scope="col">Model</th>
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

    <h3>Edit Vehicule</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" name="marque" class="form-control" value="<?php echo htmlspecialchars($vehicule['marque']); ?>">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control" value="<?php echo htmlspecialchars($vehicule['model']); ?>">
        </div>
        <div class="mb-3">
            <label for="couleur" class="form-label">Couleur</label>
            <input type="text" name="couleur" class="form-control" value="<?php echo htmlspecialchars($vehicule['couleur']); ?>">
        </div>
        <div class="mb-3">
            <label for="immatriculation" class="form-label">Immatriculation</label>
            <input type="text" name="immatriculation" class="form-control" value="<?php echo htmlspecialchars($vehicule['immatriculation']); ?>">
        </div>
        <input type="submit" name="submit" value="Valider" class="btn btn-light">
    </form>
</div>