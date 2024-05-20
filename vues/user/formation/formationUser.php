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
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Libellé</th>
                    <th>Détails</th>
                    <th>Sessions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($formations as $formation): ?>
                <tr>
                    <td><?= htmlspecialchars($formation['libelle']) ?></td>
                    <td>
                    <button class="btn btn-info" onclick="window.location.href='index.php?action=detailFormation&id=<?= $formation['idFormation'] ?>'">Voir Détails</button>
                    </td>
                    <td>
                        <button class="btn btn-success" onclick="window.location.href='index.php?action=showUserSessions&id=<?= $formation['idFormation'] ?>'">Voir Sessions</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
