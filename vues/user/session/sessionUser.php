<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions de la Formation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sessions Futures</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Date de la session</th>
                    <th>Date limite</th>
                    <th>Intervenant</th>
                    <th>Places disponibles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sessions as $session): ?>
                <tr>
                    <td><?= htmlspecialchars($session['dateSession']) ?></td>
                    <td><?= htmlspecialchars($session['dateLimite']) ?></td>
                    <td><?= htmlspecialchars($session['intervenantNom']) . " " . htmlspecialchars($session['intervenantPrenom']) ?></td>
                    <td><?= htmlspecialchars($session['nbPlace']) ?></td>
                    <td>
                        <a href="index.php?action=addDemande&idSession=<?= $session['idSession'] ?>" class="btn btn-primary">S'inscrire à cette session</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
