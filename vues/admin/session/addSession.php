<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter une Session</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Ajouter une Session</h1>
        <form action="index.php?action=addSession" method="post" class="form">
            <div class="form-group">
                <label for="idFormation">Formation:</label>
                <select id="idFormation" name="idFormation" class="form-control">
                    <?php foreach ($formations as $formation): ?>
                        <option value="<?= $formation['idFormation'] ?>">
                            <?= htmlspecialchars($formation['libelle']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="dateSession">Date de la session:</label>
                <input type="date" id="dateSession" name="dateSession" required class="form-control">
            </div>

            <div class="form-group">
                <label for="dateLimite">Date limite d'inscription:</label>
                <input type="date" id="dateLimite" name="dateLimite" required class="form-control">
            </div>

            <div class="form-group">
                <label for="idIntervenant">Intervenant:</label>
                <select id="idIntervenant" name="idIntervenant" class="form-control">
                    <?php foreach ($intervenants as $intervenant): ?>
                        <option value="<?= $intervenant['idIntervenant'] ?>">
                            <?= htmlspecialchars($intervenant['nom']) . ' ' . htmlspecialchars($intervenant['prenom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nbPlace">Nombre de places:</label>
                <input type="number" id="nbPlace" name="nbPlace" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
