<?php
require_once "view/header.html";
require_once './controller/AssociationController.php';

$associationController = new AssociationController();

if (isset($_GET['id'])) {
    $associationId = $_GET['id'];
    $association = $associationController->getAssociationById($associationId);

    if (!$association) {
        echo "Association not found.";
        exit;
    }

    $currentConducteurId = $association['conducteur_id'];
    $currentVehiculeId = $association['vehicule_id'];
} else {
    echo "No association ID provided.";
    exit;
}

$data = $associationController->read();

if (isset($_GET['id'])) {
    $associationController = new AssociationController();
    $associationId = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['confirm'])) {
            if ($associationController->delete($associationId)) {
                echo "Association deleted successfully!";
            } else {
                echo "Failed to delete association.";
            }
        }
    }
} else {
    echo "No association ID provided.";
    exit;
}
?>

<div class="container">
    <h3>Current Association Details</h3>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th scope="col">ID Association</th>
                <th scope="col">Conducteur</th>
                <th scope="col">Véhicule</th>
            </tr>
            <tr>
                <td><?php echo $associationId; ?></td>
                <td><?php
                    foreach ($data as $row) {
                        if ($row['association_id'] == $associationId) {
                            echo $row['nom'] . ' ' . $row['prenom'] . '<br/>' . $row['conducteur_id'];
                            break;
                        }
                    }
                    ?></td>
                <td><?php
                    foreach ($data as $row) {
                        if ($row['association_id'] == $associationId) {
                            echo $row['marque'] . ' ' . $row['model'] . '<br/>' . $row['vehicule_id'];
                            break;
                        }
                    }
                    ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Supprimer cette association
    </button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer cette association ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Supprimer cette association ?
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