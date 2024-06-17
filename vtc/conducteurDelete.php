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

if (isset($_GET['id'])) {
    $conducteurController = new ConducteurController();
    $conducteurId = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['confirm'])) {
            if ($conducteurController->delete($conducteurId)) {
                echo "Conducteur deleted successfully!";
            } else {
                echo "Failed to delete conducteur.";
            }
        }
    }
} else {
    echo "No conducteur ID provided.";
    exit;
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
</div>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Supprimer ce conducteur
    </button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer ce conducteur ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Supprimer ce conducteur ?
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
</div>