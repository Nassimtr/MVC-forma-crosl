<?php
require_once 'models/userModel.php';
require_once 'models/associationModel.php';

function showUsers() {
    $users = getAllUsers();
    include 'vues/admin/user/userAdmin.php'; // Vue qui affiche tous les utilisateurs
}

function addUserForm() {
    $associations = getAllAssociations();
    include 'vues/admin/user/addUser.php'; // Vue pour ajouter un utilisateur
}

function addUserAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $email = $_POST['email'];
        $fonction = $_POST['fonction'];
        $numAssociation = $_POST['numAssociation'];
        $numStatut = $_POST['numStatut'];
        $motDePasse = $_POST['motDePasse'];

        if (addUser($nom, $prenom, $adresse, $cp, $ville, $email, $fonction, $numAssociation, $numStatut, $motDePasse)) {
            header("Location: index.php?action=showUsers");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur.";
        }
    } else {
        echo "Méthode HTTP non autorisée pour cette action.";
    }
}

function editUserAction($idUser) {
    $user = getUserById($idUser);
    $associations = getAllAssociations();
    include 'vues/admin/user/editUser.php'; // Vue pour éditer un utilisateur
}

function updateUserAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idUser = $_POST['idUser'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $email = $_POST['email'];
        $fonction = $_POST['fonction'];
        $numAssociation = $_POST['numAssociation'];
        $numStatut = $_POST['numStatut'];
        $motDePasse = $_POST['motDePasse'];

        if (updateUser($idUser, $nom, $prenom, $adresse, $cp, $ville, $email, $fonction, $numAssociation, $numStatut, $motDePasse)) {
            header("Location: index.php?action=showUsers");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'utilisateur.";
        }
    } else {
        echo "Accès non autorisé.";
    }
}

function deleteUserAction($idUser) {
    if (deleteUser($idUser)) {
        header("Location: index.php?action=showUsers");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
}
