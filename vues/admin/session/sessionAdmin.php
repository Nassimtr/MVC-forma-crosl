<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Sessions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des Sessions</h1>
        <div class="my-4">
            <a href="index.php?action=addSessionForm" class="btn btn-primary mb-3">Ajouter une Session</a>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Formation</th>
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
                    <td><?= htmlspecialchars($session['formationName']) ?></td>
                    <td><?= htmlspecialchars($session['dateSession']) ?></td>
                    <td><?= htmlspecialchars($session['dateLimite']) ?></td>
                    <td><?= htmlspecialchars($session['idIntervenant']) ?></td>
                    <td><?= htmlspecialchars($session['nbPlace']) ?></td>
                    <td>
                        <a href="index.php?action=editSession&id=<?= $session['idSession'] ?>" class="btn btn-primary">Modifier</a>
                        <a href="index.php?action=downloadParticipantsPDF&idSession=<?= $session['idSession'] ?>" class="btn btn-success">Télécharger PDF</a>
                        <a href="index.php?action=deleteSession&id=<?= $session['idSession'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
