<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau d'Administration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Panneau d'Administration</h1>
        <p>Bienvenue dans votre panneau d'administration.</p>
        
        <div class="list-group">
            <a href="index.php?action=showUsers" class="list-group-item list-group-item-action">Gérer les Utilisateurs</a>
            <a href="index.php?action=showSessions" class="list-group-item list-group-item-action">Gérer les Sessions</a>
            <a href="index.php?action=showFormations" class="list-group-item list-group-item-action">Gérer les Formations</a>
            <a href="index.php?action=showThemes" class="list-group-item list-group-item-action">Gérer les Thèmes</a>
            <a href="index.php?action=showIntervenants" class="list-group-item list-group-item-action">Gérer les Intervenants</a>
            <a href="index.php?action=showAllDemandesEnAttente" class="list-group-item list-group-item-action">Gérer les demandes</a>
        </div>
    </div>
</body>
</html>
