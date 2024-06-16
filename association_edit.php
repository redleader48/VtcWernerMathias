<?php
require_once "./controller/AssociationController.php";
require_once "./controller/ConducteurController.php";
require_once "./controller/VehiculeController.php";

$association = new Association();
$conducteur = new Conducteur();
$vehicule = new Vehicule();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $donnees = [
        'conducteur_id' => $_POST['conducteur_id'],
        'vehicule_id' => $_POST['vehicule_id']
    ];

    $associationInstance = new AssociationController();
    $associationInstance->modifier($id, $donnees);
    header('Location: afficher_association.php');
}

$id = $_GET['id'];
$associationInstance = new AssociationController();
$association = $associationInstance->getById($id);

$conducteurInstance = new ConducteurController();
$conducteurs = $conducteurInstance->afficher();

$vehiculeInstance = new VehiculeController();
$vehicules = $vehiculeInstance->afficher();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Association</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Modifier Association</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($association['id']); ?>">
            <div class="mb-3">
                <label for="conducteur_id" class="form-label">Choisir le Conducteur</label>
                <select class="form-control" id="conducteur_id" name="conducteur_id">
                    <?php foreach ($conducteurs as $conducteur): ?>
                    <option value="<?php echo $conducteur['id']; ?>" <?php echo $association['conducteur_id'] == $conducteur['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($conducteur['prenom'] . " " . $conducteur['nom']); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="vehicule_id" class="form-label">Choisir le Véhicule</label>
                <select class="form-control" id="vehicule_id" name="vehicule_id">
                    <?php foreach ($vehicules as $vehicule): ?>
                    <option value="<?php echo $vehicule['id']; ?>" <?php echo $association['vehicule_id'] == $vehicule['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($vehicule['marque'] . " " . $vehicule['modele']); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>