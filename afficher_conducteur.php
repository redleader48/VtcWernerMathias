<table border="2" >
        <tr>
            <th>ID_conducteur</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
        <?php foreach ($conducteurs as $conducteur): ?>
        <tr>
            <td><?php echo $conducteur['id']; ?></td>
            <td><?php echo $conducteur['prenom']; ?></td>
            <td><?php echo $conducteur['nom']; ?></td>
            
        </tr>
        </tr>
        </tr>
        <?php endforeach; ?>
    </table>