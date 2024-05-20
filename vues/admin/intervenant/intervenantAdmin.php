<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Intervenants</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des Intervenants</h1>
        <a href="index.php?action=addIntervenantForm" class="btn btn-primary mb-3">Ajouter un nouvel Intervenant</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($intervenants as $intervenant): ?>
                <tr>
                    <td><?= htmlspecialchars($intervenant['idIntervenant']) ?></td>
                    <td><?= htmlspecialchars($intervenant['nom']) ?></td>
                    <td><?= htmlspecialchars($intervenant['prenom']) ?></td>
                    <td><?= htmlspecialchars($intervenant['email']) ?></td>
                    <td><?= htmlspecialchars($intervenant['telephone']) ?></td>
                    <td>
                        <a href="index.php?action=editIntervenant&id=<?= $intervenant['idIntervenant'] ?>" class="btn btn-secondary">Modifier</a>
                        <a href="index.php?action=deleteIntervenant&id=<?= $intervenant['idIntervenant'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet intervenant ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
