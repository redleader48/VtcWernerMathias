
    <?php 
    require_once "./view/header.html";

    require_once "./controller/VehiculeController.php";
   
$vehiculeInstance = new VehiculeController();
$vehiculeArray = $vehiculeInstance->afficher();




?>
<table border="2" row="2">
        <tr>
            <th>ID_Vehicule</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Immatriculation</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php foreach ($vehiculeArray as $vehicule): ?>
        <tr>
            <td><?php echo htmlspecialchars($vehicule['id']); ?></td>
            <td><?php echo htmlspecialchars($vehicule['marque']); ?></td>
            <td><?php echo htmlspecialchars($vehicule['model']); ?></td>
            <td><?php echo htmlspecialchars($vehicule['couleur']); ?></td>
            <td><?php echo htmlspecialchars($vehicule['immatriculation']); ?></td>
            <td><?php echo htmlspecialchars($vehicule['id']); ?></td>
            <td><?php echo htmlspecialchars($vehicule['id']); ?></td>
            <td>
                
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php 
    $vehiculeInstance = new VehiculeController();
    $vehiculeInstance->ajouter();

    ?>

