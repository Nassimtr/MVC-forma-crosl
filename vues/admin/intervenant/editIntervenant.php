<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Intervenant</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier un Intervenant</h1>
        <?php if ($intervenant): ?>
            <form action="index.php?action=updateIntervenantAction&id=<?= htmlspecialchars($intervenant['idIntervenant']) ?>" method="post">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($intervenant['nom']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($intervenant['prenom']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($intervenant['email']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone:</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?= htmlspecialchars($intervenant['telephone']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        <?php else: ?>
            <p>Intervenant non trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>
