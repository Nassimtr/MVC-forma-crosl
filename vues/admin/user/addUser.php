<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Utilisateur</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un Utilisateur</h2>
        <form action="index.php?action=addUser" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="cp">Code Postal:</label>
                <input type="text" class="form-control" id="cp" name="cp" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="fonction">Fonction:</label>
                <input type="text" class="form-control" id="fonction" name="fonction" required>
            </div>
         
            <div class="form-group">
                <label for="numAssociation">Association:</label>
                <select class="form-control" id="numAssociation" name="numAssociation">
                    <?php foreach ($associations as $association): ?>
                        <option value="<?= $association['numAssociation'] ?>">
                            <?= htmlspecialchars($association['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="numStatut">Statut:</label>
                <select class="form-control" id="numStatut" name="numStatut">
                    <option value="0">Admin</option>
                    <option value="1">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="motDePasse">Mot de Passe:</label>
                <input class="form-control" id="motDePasse" name="motDePasse" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
