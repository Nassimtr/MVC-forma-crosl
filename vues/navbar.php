<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Dynamique</title>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <?php if (isLoggedIn() && isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showFormations">Formations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showSessions">Sessions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showThemes">Thèmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showIntervenants">Intervenants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showUsers">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showAllDemandesEnAttente">Demandes</a>
                        </li>

                    <?php endif; ?>
                </ul>

        


                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <?php if (isLoggedIn() && !isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showUserFormations">Formations</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=showMyInscriptions">Demandes</a>
                        </li>

                    <?php endif; ?>
                </ul>









                <ul class="navbar-nav ms-auto">
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" href="index.php?action=logout" style="color: white;">Déconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success" href="index.php?action=login" style="color: white;">Se connecter</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
