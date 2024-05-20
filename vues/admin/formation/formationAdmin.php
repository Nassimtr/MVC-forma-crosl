<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Formations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des Formations</h1>
        <a href="index.php?action=addFormationForm" class="btn btn-primary mb-3">Ajouter une formation</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Libellé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($formations as $formation): ?>
                <tr>
                    <td><?= htmlspecialchars($formation['libelle']); ?></td>
                    <td>
                        <a href="index.php?action=editFormation&id=<?= $formation['idFormation']; ?>" class="btn btn-secondary">Modifier</a>
                        <form method="post" action="index.php?action=deleteFormation&id=<?= $formation['idFormation']; ?>" class="d-inline">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
