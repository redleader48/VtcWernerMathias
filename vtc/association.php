<?php

require_once "view/header.html";
require_once './controller/AssociationController.php';

$associationController = new AssociationController();

if (isset($_POST['submit'])) {
    $idConducteur = $_POST['conducteur'];
    $idVehicule = $_POST['vehicule'];

    if ($associationController->setAssociation($idConducteur, $idVehicule)) {
        echo "Association added successfully!";
    } else {
        echo "Failed to add association.";
    }
}

$associationController = new AssociationController();
$associationController->read();

$data = $associationController->read();

if (!empty($data)) {
    echo '<div class="container"><table class="table table-bordered">';
    echo '<tr><th scope="col">id_association</th><th scope="col">Conducteur</th><th scope="col">vehicule</th><th scope="col">Editer</th></tr>';

    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . $row['association_id'] . '</td>';
        echo '<td>' . $row['nom'] . ' ' . $row['prenom'] . '<br/>' . $row['conducteur_id'] . '</td>';
        echo '<td>' . $row['marque'] . ' ' . $row['modele'] . '<br/>' . $row['vehicule_id'] . '</td>';
        echo '<td><a href="../view/showConducteur.php?&id=' . $row['association_id'] . '">Editer</a></td>';
        echo '</tr>';
    }

    echo '</table></div>';
} else {
    echo 'Aucune donnée trouvée.';
}
?>
<div class="container">
    <div class="mb-3">
        <form method="POST">
            <label for="conducteur" class="form-label">Nom du conducteur</label>
            <select name="conducteur" class="form-select" aria-label="Default select example">
                <?php
                $query = "SELECT id, nom FROM conducteur";
                $sql = (new Connection())->getConnect()->query($query);
                while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $data['id'] . "'>" . $data['nom'] . "</option>";
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
                echo "<option value='" . $data['id'] . "'>" . $data['immatriculation'] . "</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" name="submit" value="Valider" class="btn btn-light">
    </form>