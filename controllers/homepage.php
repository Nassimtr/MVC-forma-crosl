<?php


function homepage()
{
    require('vues/homePage.php');
}


function showAdminPanel() {
    
    include 'vues/admin/homePageAdmin.php';
}

function routeUser() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Assurez-vous que la session est démarrée
    }

    if (isset($_SESSION['user_id'])) {
        if ($_SESSION['role'] === "admin") {
            showAdminPanel(); 
        } else {
            echo "Bienvenue sur votre tableau de bord."; // Ou redirigez vers une page spécifique pour les utilisateurs non admin
            // header("Location: user_dashboard.php"); // Exemple d'une redirection possible
        }
    } else {
        homepage(); // Affiche la page d'accueil par défaut pour les non-connectés
    }
}

