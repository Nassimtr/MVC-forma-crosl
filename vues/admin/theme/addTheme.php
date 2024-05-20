<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter un Thème</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Ajouter un Thème</h1>
        <form action="index.php?action=addTheme" method="post" class="form">
            <div class="form-group">
                <label for="libelle">Libellé du thème:</label>
                <input type="text" id="libelle" name="libelle" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
