<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes inscriptions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Mes Inscriptions</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Formation</th>
                    <th>Date</th>
                    <th>Coût</th>
                    <th>État</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandes as $demande): ?>
                <tr>
                    <td><?= htmlspecialchars($demande['libelle']) ?></td>
                    <td><?= htmlspecialchars($demande['dateSession']) ?></td>
                    <td><?= htmlspecialchars($demande['prix']) ?> €</td>
                    <td><?= htmlspecialchars($demande['accorde']) ?></td>
                    <td>
                        <?php if ($demande['accorde'] == 'en attente'): ?>
                            <a href="index.php?action=cancelDemande&idDemande=<?= $demande['idDemande'] ?>" class="btn btn-danger">Annuler</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>