<?php
require_once 'models/intervenantModel.php';

function showIntervenants() {
    $intervenants = getAllIntervenants();
    include 'vues/admin/intervenant/intervenantAdmin.php';
}

function addIntervenantForm() {
    include 'vues/admin/intervenant/addIntervenant.php';
}

function addIntervenantAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        $intervenantId = addIntervenant($nom, $prenom, $email, $telephone);
        if ($intervenantId) {
            header("Location: index.php?action=showIntervenants");
            exit();
        } 
        else {
            echo "Erreur lors de l'ajout de l'intervenant.";
        }
    }
}

function editIntervenantAction($id) {
    $intervenant = getIntervenantById($id);
    if ($intervenant) {
        include 'vues/admin/intervenant/editIntervenant.php';
    } else {
        echo "Intervenant non trouvé.";
    }
}

function updateIntervenantAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_GET['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        if (updateIntervenant($id, $nom, $prenom, $email, $telephone)) {
            header("Location: index.php?action=showIntervenants");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'intervenant.";
        }
    }
}

function deleteIntervenantAction($id) {
    if (deleteIntervenant($id)) {
        header("Location: index.php?action=showIntervenants");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'intervenant.";
    }
}
