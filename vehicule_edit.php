<?php
require_once "./controller/VehiculeController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $donnees = [
        'marque' => $_POST['marque'],
        'modele' => $_POST['modele'],
        'couleur' => $_POST['couleur'],
        'immatriculation' => $_POST['immatriculation']
    ];

    $vehiculeInstance = new VehiculeController();
    $vehiculeInstance->modifier($donnees);
    header('Location: afficher_vehicule.php');
}

$id = $_GET['$donnees'];
$vehiculeInstance = new VehiculeController();
$vehicule = $vehiculeInstance->getById($id);
?>


<div class="container">
        <h1>Modifier Véhicule</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($vehicule['id']); ?>">
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" class="form-control" id="marque" name="marque" value="<?php echo htmlspecialchars($vehicule['marque']); ?>">
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Modèle</label>
                <input type="text" class="form-control" id="model" name="model" value="<?php echo htmlspecialchars($vehicule['model']); ?>">
            </div>
            <div class="mb-3">
                <label for="couleur" class="form-label">Couleur</label>
                <input type="text" class="form-control" id="couleur" name="couleur" value="<?php echo htmlspecialchars($vehicule['couleur']); ?>">
            </div>
            <div class="mb-3">
                <label for="immatriculation" class="form-label">Immatriculation</label>
                <input type="text" class="form-control" id="immatriculation" name="immatriculation" value="<?php echo htmlspecialchars($vehicule['immatriculation']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>