<?php

require_once 'models/userModel.php';

// Vérifie si l'utilisateur est connecté
function isLoggedIn() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Assurez-vous que la session est démarrée
    }

    return isset($_SESSION['verif']) && $_SESSION['verif'] === "ok";
}

// Vérifie si l'utilisateur est un administrateur
function isAdmin() {
    return isLoggedIn() && isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}


function logout() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // vider les données de session
    $_session = [];
    // détruire la session
    session_destroy();

    // rediriger vers la page de connexion ou la page d'accueil
    header("location: index.php"); // vous pouvez aussi choisir de rediriger vers "index.php"
    exit();
}





// Fonction pour afficher la navbar appropriée
function showNavbar() {
    include 'views/navbar.php';  // Inclure la vue de la navbar
}
