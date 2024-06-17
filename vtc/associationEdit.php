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

if (isset($_POST['submit'])) {
    $idConducteur = $_POST['conducteur'];
    $idVehicule = $_POST['vehicule'];

    if ($associationController->updateAssociation($associationId, $idConducteur, $idVehicule)) {
        echo "Association updated successfully!";
    } else {
        echo "Failed to update association.";
    }
}

$data = $associationController->read();

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

    <h3>Edit Association</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="conducteur" class="form-label">Nom du conducteur</label>
            <select name="conducteur" class="form-select" aria-label="Default select example">
                <?php
                $query = "SELECT id, nom FROM conducteur";
                $sql = (new Connection())->getConnect()->query($query);
                while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($data['id'] == $currentConducteurId) ? "selected" : "";
                    echo "<option value='" . $data['id'] . "' $selected>" . $data['nom'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicule" class="form-label">Immatriculation de la voiture</label>
            <select name="vehicule" class="form-select" aria-label="Default select example">
                <?php
                $query = "SELECT id, immatriculation FROM vehicule";
                $sql = (new Connection())->getConnect()->query($query);
                while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($data['id'] == $currentVehiculeId) ? "selected" : "";
                    echo "<option value='" . $data['id'] . "' $selected>" . $data['immatriculation'] . "</option>";
                }
                ?>
            </select>
        </div>
        <input type="submit" name="submit" value="Valider" class="btn btn-light">
    </form>
</div>