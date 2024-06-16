<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Association</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Ajouter Association</h1>
        <form method="post">
            <div class="mb-3">
                <label for="conducteur_id" class="form-label">conducteur</label>
                <select class="form-select" id="conducteur_id" name="conducteur_id">
                    <option selected disabled>Choisir le conducteur</option>
                    <?php foreach ($conducteurs as $conducteur) : ?>
                        <option value="<?php echo $conducteur['id']; ?>"><?php echo $conducteur['prenom'] . " " . $conducteur['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="vehicule_id" class="form-label">vehicule</label>
                <select class="form-select" id="vehicule_id" name="vehicule_id">
                    <option selected disabled>Choisir le vehicule</option>
                    <?php foreach ($vehicules as $vehicule) : ?>
                        <option value="<?php echo $vehicule['id']; ?>"><?php echo $vehicule['marque'] . " " . $vehicule['modele']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter cette association</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>