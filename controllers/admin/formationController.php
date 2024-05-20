<?php
require_once 'models/formationModel.php';
require_once 'models/themeModel.php';

function showFormations() {
    $formations = getAllFormations();
    include 'vues/admin/formation/formationAdmin.php';
}

function deleteFormationAction($idFormation) {
    if (deleteFormation($idFormation)) {
        header("Location: index.php?action=showFormations");
        exit();
    } else {
        echo "Erreur lors de la suppression de la formation.";
    }
}

function editFormationAction($idFormation) {
    $formation = getFormationById($idFormation); // Récupérer les informations de la formation
    $themes = getAllThemes();  // Récupérer tous les thèmes disponibles
    if ($formation) {
        include 'vues/admin/formation/editFormation.php'; // Charger la vue de modification de la formation
    } else {
        echo "Erreur : Formation non trouvée.";
    }
}

function updateFormationAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idFormation = $_POST['idFormation'];
        $idTheme = $_POST['idTheme'];
        $libelle = $_POST['libelle'];
        $salle = $_POST['salle'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $objectifs = $_POST['objectifs'];
        $prix = $_POST['prix'];
        $public = $_POST['public'];
        $niveau = $_POST['niveau'];

        if (updateFormation($idFormation, $idTheme, $libelle, $salle, $adresse, $cp, $ville, $objectifs, $prix, $public, $niveau)) {
            header("Location: index.php?action=showFormations");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la formation.";
        }
    } 
    else {
        echo "Accès non autorisé.";
    }
}



function addFormationForm() {
    $themes = getAllThemes();  // Récupérer tous les thèmes disponibles
    include 'vues/admin/formation/addFormation.php';  // Charger la vue du formulaire d'ajout
}

function addFormationAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idTheme = $_POST['idTheme'];
        $libelle = $_POST['libelle'];
        $salle = $_POST['salle'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $objectifs = $_POST['objectifs'];
        $prix = $_POST['prix'];
        $public = $_POST['public'];
        $niveau = $_POST['niveau'];

        $formationId = addFormation($idTheme, $libelle, $salle, $adresse, $cp, $ville, $objectifs, $prix, $public, $niveau);
        if ($formationId) {
            header("Location: index.php?action=showFormations");
            exit();
        } else {
            echo "Erreur lors de l'ajout de la formation.";
        }
    } else {
        echo "Méthode HTTP non autorisée pour cette action.";
    }
}
