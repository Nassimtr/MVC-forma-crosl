<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter une Formation</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Ajouter une Formation</h1>
        <form action="index.php?action=addFormation" method="post" class="form">
            <div class="form-group">
                <label for="idTheme">Thème:</label>
                <select id="idTheme" name="idTheme" class="form-control">
                    <?php foreach ($themes as $theme): ?>
                    <option value="<?= $theme['id'] ?>"><?= htmlspecialchars($theme['libelle']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="libelle">Libellé:</label>
                <input type="text" id="libelle" name="libelle" required class="form-control">
            </div>

            <div class="form-group">
                <label for="salle">Salle:</label>
                <input type="text" id="salle" name="salle" required class="form-control">
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" required class="form-control">
            </div>

            <div class="form-group">
                <label for="cp">Code Postal:</label>
                <input type="text" id="cp" name="cp" required class="form-control">
            </div>

            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" required class="form-control">
            </div>

            <div class="form-group">
                <label for="objectifs">Objectifs:</label>
                <textarea id="objectifs" name="objectifs" required class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="text" id="prix" name="prix" required class="form-control">
            </div>

            <div class="form-group">
                <label for="public">Public cible:</label>
                <input type="text" id="public" name="public" required class="form-control">
            </div>

            <div class="form-group">
                <label for="niveau">Niveau:</label>
                <input type="text" id="niveau" name="niveau" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
