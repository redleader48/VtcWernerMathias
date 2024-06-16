<?php 
require_once "./view/header.html";
require_once "./controller/AssociationController.php";

$associationInstance = new AssociationController();
$associationArray = $associationInstance->afficher();
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id_association</th>
            <th>conducteur</th>
            <th>véhicule</th>
            <th>modification</th>
            <th>suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($associationArray as $association) { ?>
            <tr>
                <td><?php echo $association['id']; ?></td>
                <td><?php echo $association['prenom'] . ' ' . $association['nom']; ?></td>
                <td><?php echo $association['marque'] . ' ' . $association['model'] . ' ' . $association['couleur'] . ' ' . $association['immatriculation']; ?></td>
               
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php 
 $associationInstance = new AssociationController();
 $associationInstance->ajouter();
?>