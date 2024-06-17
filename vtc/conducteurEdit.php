<?php
require_once "view/header.html";
require_once './controller/ConducteurController.php';

$conducteurController = new ConducteurController();

if (isset($_GET['id'])) {
    $conducteurId = $_GET['id'];
    $conducteur = $conducteurController->getById($conducteurId);

    if (!$conducteur) {
        echo "Conducteur not found.";
        exit;
    }
} else {
    echo "No conducteur ID provided.";
    exit;
}

if (isset($_POST['submit'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];

    $donnees = [
        'prenom' => $prenom,
        'nom' => $nom
    ];

    if ($conducteurController->update($conducteurId, $donnees)) {
        echo "Conducteur updated successfully!";
    } else {
        echo "Failed to update conducteur.";
    }
}
?>
<div class="container">
    <h3>Current Conducteur Details</h3>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th scope="col">ID Conducteur</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($conducteur['id']); ?></td>
                <td><?php echo htmlspecialchars($conducteur['prenom']); ?></td>
                <td><?php echo htmlspecialchars($conducteur['nom']); ?></td>
            </tr>
        </table>
    </div>

    <h3>Edit Conducteur</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" value="<?php echo htmlspecialchars($conducteur['prenom']); ?>">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($conducteur['nom']); ?>">
        </div>
        <input type="submit" name="submit" value="Valider" class="btn btn-light">
    </form>
</div>