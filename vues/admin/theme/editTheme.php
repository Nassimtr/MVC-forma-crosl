<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Thème</title>
</head>
<body>
    <h1>Modifier un Thème</h1>
    <?php if ($theme): ?>
        <form action="index.php?action=updateThemeAction&id=<?= htmlspecialchars($theme['id']) ?>" method="post">
            <label for="libelle">Libellé du thème:</label>
            <input type="text" id="libelle" name="libelle" value="<?= htmlspecialchars($theme['libelle']) ?>" required>
            <button type="submit">Mettre à jour</button>
        </form>
    <?php else: ?>
        <p>Thème non trouvé.</p>
    <?php endif; ?>
</body>
</html>
