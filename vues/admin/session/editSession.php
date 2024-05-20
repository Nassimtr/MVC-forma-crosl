<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier une Session</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Modifier une Session</h1>
        <?php if ($session): ?>
        <form action="index.php?action=updateSession" method="post" class="form">
            <input type="hidden" name="idSession" value="<?= htmlspecialchars($session['idSession']) ?>">

            <div class="form-group">
                <label for="idFormation">Formation:</label>
                <select id="idFormation" name="idFormation" class="form-control">
                    <?php foreach ($formations as $formation): ?>
                        <option value="<?= $formation['idFormation'] ?>" <?= $formation['idFormation'] == $session['idFormation'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($formation['libelle']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="dateSession">Date de la session:</label>
                <input type="date" id="dateSession" name="dateSession" value="<?= $session['dateSession'] ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="dateLimite">Date limite:</label>
                <input type="date" id="dateLimite" name="dateLimite" value="<?= $session['dateLimite'] ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="idIntervenant">Intervenant:</label>
                <select id="idIntervenant" name="idIntervenant" class="form-control">
                    <?php foreach ($intervenants as $intervenant): ?>
                        <option value="<?= $intervenant['idIntervenant'] ?>" <?= $intervenant['idIntervenant'] == $session['idIntervenant'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($intervenant['nom']) . ' ' . htmlspecialchars($intervenant['prenom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nbPlace">Nombre de places:</label>
                <input type="number" id="nbPlace" name="nbPlace" value="<?= $session['nbPlace'] ?>" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
        <?php else: ?>
        <p>Session non trouvée.</p>
        <?php endif; ?>
    </div>
</body>
</html>
