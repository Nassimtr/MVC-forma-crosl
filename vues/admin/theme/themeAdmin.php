<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Thèmes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des Thèmes</h1>
        <a href="index.php?action=addThemeForm" class="btn btn-primary mb-3">Ajouter un nouveau thème</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Libellé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($themes as $theme): ?>
                <tr>
                    <td><?= htmlspecialchars($theme['libelle']) ?></td>
                    <td>
                        <a href="index.php?action=editTheme&id=<?= $theme['id'] ?>" class="btn btn-secondary">Modifier</a>
                        <a href="index.php?action=deleteTheme&id=<?= $theme['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce thème ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
