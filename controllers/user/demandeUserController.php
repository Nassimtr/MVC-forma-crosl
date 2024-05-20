<?php
require_once 'models/demandeModel.php';
require_once 'models/sessionModel.php';


function decrementSessionPlaces($idSession) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE session SET nbPlace = nbPlace - 1 WHERE idSession = ? AND nbPlace > 0");
    $stmt->execute([$idSession]);
}


function addDemandeToSession($idUser, $idSession) {
    $year = date('Y');
    $sessionData = getSessionById($idSession);
    if (!$sessionData) {
        return "Session non trouvée.";
    }

    if ($sessionData['nbPlace'] <= 0) {
        return "Il n'y a plus de places disponibles pour cette session.";
    }

    if (hasExistingDemande($idUser, $idSession)) {
        return "Vous avez déjà une demande pour cette session.";
    }

    if (countUserDemandesByYear($idUser, $year) >= 3) {
        return "Vous avez atteint le nombre maximum de formations pour cette année.";
    }

    if (countUserDemandesByTheme($idUser, $sessionData['idTheme'], $year) >= 2) {
        return "Vous avez atteint le nombre maximum de formations pour ce thème cette année.";
    }

    $dateDemande = date('Y-m-d');
    $accorde = 'en attente'; // La valeur par défaut est en attente jusqu'à approbation
    if (addDemande($idSession, $idUser, $accorde, $dateDemande)) {
        decrementSessionPlaces($idSession);  // Décrémenter les places disponibles
        return "Votre demande a été ajoutée avec succès.";
    } else {
        return "Erreur lors de l'ajout de la demande.";
    }
}




function handleAddDemande($idSession) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?action=login");
        exit();
    }

    $idUser = $_SESSION['user_id'];
    $response = addDemandeToSession($idUser, $idSession);
    
    if ($response == "Votre demande a été ajoutée avec succès.") {
        echo($response);
    } else {
        echo("Vous ne pouvez pas vous inscrire a cette session");
    }
    exit();
}

