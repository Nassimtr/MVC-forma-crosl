<?php
require_once 'models/formationModel.php';

function showUserFormations() {
    $formations = getAllFormations();  // Récupérer toutes les formations disponibles
    include 'vues/user/formation/formationUser.php';  // Charger la vue pour les utilisateurs
}


function showFormationDetails($idFormation) {
    $formation = getFormationById($idFormation); // Récupérer la formation par ID
    if ($formation) {
        include 'vues/user/formation/detailFormation.php'; // Afficher la vue avec les détails de la formation
    } else {
        echo "Erreur : Formation non trouvée.";
    }
}