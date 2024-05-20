<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Formation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Détails de la Formation</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($formation['libelle']) ?></h5>
                <p class="card-text">Salle: <?= htmlspecialchars($formation['salle']) ?></p>
                <p class="card-text">Adresse: <?= htmlspecialchars($formation['adresse']) ?></p>
                <p class="card-text">Code Postal: <?= htmlspecialchars($formation['cp']) ?></p>
                <p class="card-text">Ville: <?= htmlspecialchars($formation['ville']) ?></p>
                <p class="card-text">Objectifs: <?= htmlspecialchars($formation['Objectifs']) ?></p>
                <p class="card-text">Prix: <?= htmlspecialchars($formation['prix']) ?>€</p>
                <p class="card-text">Public cible: <?= htmlspecialchars($formation['public']) ?></p>
                <p class="card-text">Niveau: <?= htmlspecialchars($formation['niveau']) ?></p>
            </div>
        </div>
    </div>
</body>
</html>