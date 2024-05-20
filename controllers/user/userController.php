<?php
require_once 'models/demandeModel.php';
require_once 'models/sessionModel.php';  

function showMyInscriptions() {
    $idUser = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté
    $demandes = getUserDemandes($idUser);
    include 'vues/user/utilisateur/mesInscription.php';
}

function handleCancelDemande($idDemande) {
    $demande = getDemandeById($idDemande);  // Récupérez les données de la demande
    if (!$demande) {
        echo "Demande non trouvée.";
        return;
    }

    $idSession = $demande['idSession'];
    $session = getSessionById($idSession);  // Récupérez les données de la session associée

    if (!$session) {
        echo "Session non trouvée.";
        return;
    }

    if (cancelDemande($idDemande)) {
        if (updateSessionPlaces($idSession, $session['nbPlace'] + 1)) {  // Incrémente le nombre de places disponibles
            header("Location: index.php?action=showMyInscriptions");
            exit();
        } else {
            echo "Erreur lors de la mise à jour des places disponibles.";
        }
    } else {
        echo "Erreur lors de l'annulation de l'inscription.";
    }
}

