<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Demandes en Attente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Demandes en Attente</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Formation</th>
                    <th>Date Session</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandesEnAttente as $demande): ?>
                <tr>
                    <td><?= htmlspecialchars($demande['nom']) ?></td>
                    <td><?= htmlspecialchars($demande['prenom']) ?></td>
                    <td><?= htmlspecialchars($demande['formationName']) ?></td>
                    <td><?= htmlspecialchars($demande['dateSession']) ?></td>
                    <td>
                        <a href="index.php?action=approveDemande&idDemande=<?= $demande['idDemande'] ?>" class="btn btn-success">Approuver</a>
                        <a href="index.php?action=rejectDemande&idDemande=<?= $demande['idDemande'] ?>" class="btn btn-danger">Rejeter</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
