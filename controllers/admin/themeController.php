<?php
require_once 'models/themeModel.php';

function showThemes() {
    $themes = getAllThemes();
    include 'vues/admin/theme/themeAdmin.php';  // Vue pour afficher tous les thèmes
}

function addThemeForm() {
    include 'vues/admin/theme/addTheme.php';  // Vue pour ajouter un nouveau thème
}

function addThemeAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $libelle = $_POST['libelle'];

        $themeId = addTheme($libelle);
        if ($themeId) {
            header("Location: index.php?action=showThemes");
            exit();
        } else {
            echo "Erreur lors de l'ajout du thème.";
        }
    } 
    else {
        echo "Méthode HTTP non autorisée pour cette action.";
    }
}

function editThemeAction($id) {
    $theme = getThemeById($id); // Récupérer les informations du thème
    if ($theme) {
        include 'vues/admin/theme/editTheme.php'; // Charger la vue de modification du thème
    } else {
        echo "Erreur : Thème non trouvé.";
    }
}

function updateThemeAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_GET['id'];
        $libelle = $_POST['libelle'];

        if (updateTheme($id, $libelle)) {
            header("Location: index.php?action=showThemes");
            exit();
        } else {
            echo "Erreur lors de la mise à jour du thème.";
        }
    } else {
        echo "Accès non autorisé.";
    }
}

function deleteThemeAction($id) {
    if (deleteTheme($id)) {
        header("Location: index.php?action=showThemes");
        exit();
    } else {
        echo "Erreur lors de la suppression du thème.";
    }
}
