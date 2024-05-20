<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Utilisateur</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un Utilisateur</h2>
        <?php if ($user): ?>
        <form action="index.php?action=updateUser" method="post">
            <input type="hidden" name="idUser" value="<?= htmlspecialchars($user['idUser']) ?>">

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="<?= htmlspecialchars($user['adresse']) ?>" required>
            </div>

            <div class="form-group">
                <label for="cp">Code Postal:</label>
                <input type="text" class="form-control" id="cp" name="cp" value="<?= htmlspecialchars($user['cp']) ?>" required>
            </div>

            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" id="ville" name="ville" value="<?= htmlspecialchars($user['ville']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="fonction">Fonction:</label>
                <input type="text" class="form-control" id="fonction" name="fonction" value="<?= htmlspecialchars($user['fonction']) ?>" required>
            </div>

            <div class="form-group">
                <label for="numAssociation">Association:</label>
                <select class="form-control" id="numAssociation" name="numAssociation">
                    <?php foreach ($associations as $association): ?>
                        <option value="<?= $association['numAssociation'] ?>" <?= $association['numAssociation'] == $user['numAssociation'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($association['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="numStatut">Statut:</label>
                <select class="form-control" id="numStatut" name="numStatut">
                    <option value="0" <?= $user['numStatut'] == 0 ? 'selected' : '' ?>>Admin</option>
                    <option value="1" <?= $user['numStatut'] == 1 ? 'selected' : '' ?>>User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="motDePasse">Nouveau Mot de Passe (laisser vide pour ne pas changer):</label>
                <input  class="form-control" id="motDePasse" name="motDePasse" >
            </div>


            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
        <?php else: ?>
            <p>Utilisateur non trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>
