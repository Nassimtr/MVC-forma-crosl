<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Formation</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Modifier une Formation</h1>

        <?php if ($formation): ?>
            <form action="index.php?action=updateFormation" method="post">
                <input type="hidden" name="idFormation" value="<?= htmlspecialchars($formation['idFormation']) ?>">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="idTheme">Thème:</label>
                        <select id="idTheme" name="idTheme" class="form-control">
                            <?php foreach ($themes as $theme): ?>
                                <option value="<?= $theme['id'] ?>" <?= $theme['id'] == $formation['idTheme'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($theme['libelle']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="libelle">Libellé:</label>
                        <input type="text" id="libelle" name="libelle" value="<?= htmlspecialchars($formation['libelle']) ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="salle">Salle:</label>
                        <input type="text" id="salle" name="salle" value="<?= htmlspecialchars($formation['salle']) ?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="adresse">Adresse:</label>
                        <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($formation['adresse']) ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cp">Code Postal:</label>
                        <input type="text" id="cp" name="cp" value="<?= htmlspecialchars($formation['cp']) ?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ville">Ville:</label>
                        <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($formation['ville']) ?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="prix">Prix:</label>
                        <input type="text" id="prix" name="prix" value="<?= htmlspecialchars($formation['prix']) ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="objectifs">Objectifs:</label>
                    <textarea id="objectifs" name="objectifs" class="form-control" required><?= htmlspecialchars($formation['Objectifs']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="public">Public cible:</label>
                    <input type="text" id="public" name="public" value="<?= htmlspecialchars($formation['public']) ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="niveau">Niveau:</label>
                    <input type="text" id="niveau" name="niveau" value="<?= htmlspecialchars($formation['niveau']) ?>" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        <?php else: ?>
            <p>Formation non trouvée.</p>
        <?php endif; ?>
    </div>
</body>
</html>
