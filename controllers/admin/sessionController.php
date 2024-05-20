<?php
require_once 'models/sessionModel.php'; 
require_once 'models/formationModel.php';
require_once 'models/intervenantModel.php';
require_once 'models/demandeModel.php';
require_once 'lib/dompdf/autoload.inc.php'; 
use Dompdf\Dompdf;


function showSessions() {
    $sessions = getAllSessions();
    include 'vues/admin/session/sessionAdmin.php'; // Chemin vers la vue qui affiche toutes les sessions
}

function addSessionForm() {
    $formations = getAllFormations(); // Récupère toutes les formations pour les lister dans le formulaire
    $intervenants = getAllIntervenants(); // Récupère tous les intervenants pour les lister
    include 'vues/admin/session/addSession.php'; // Chemin vers la vue du formulaire d'ajout de session
}

function addSessionAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idFormation = $_POST['idFormation'];
        $dateSession = $_POST['dateSession'];
        $dateLimite = $_POST['dateLimite'];
        $idIntervenant = $_POST['idIntervenant'];
        $nbPlace = $_POST['nbPlace'];

        $sessionId = addSession($idFormation, $dateSession, $dateLimite, $idIntervenant, $nbPlace);
        if ($sessionId) {
            header("Location: index.php?action=showSessions");
            exit();
        } else {
            echo "Erreur lors de l'ajout de la session.";
        }
    } else {
        echo "Méthode HTTP non autorisée pour cette action.";
    }
}

function editSessionAction($idSession) {
    $session = getSessionById($idSession);
    $formations = getAllFormations();
    $intervenants = getAllIntervenants();
    if ($session) {
        include 'vues/admin/session/editSession.php'; // Chemin vers la vue de modification de la session
    } else {
        echo "Erreur : Session non trouvée.";
    }
}

function updateSessionAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idSession = $_POST['idSession'];
        $idFormation = $_POST['idFormation'];
        $dateSession = $_POST['dateSession'];
        $dateLimite = $_POST['dateLimite'];
        $idIntervenant = $_POST['idIntervenant'];
        $nbPlace = $_POST['nbPlace'];

        if (updateSession($idSession, $idFormation, $dateSession, $dateLimite, $idIntervenant, $nbPlace)) {
            header("Location: index.php?action=showSessions");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la session.";
        }
    } else {
        echo "Accès non autorisé.";
    }
}

function deleteSessionAction($idSession) {
    if (deleteSession($idSession)) {
        header("Location: index.php?action=showSessions");
        exit();
    } else {
        echo "Erreur lors de la suppression de la session.";
    }
}


function downloadParticipantsPDF($idSession) {
    $participants = getParticipantsBySession($idSession);
    $html = '<h1>Liste des Participants</h1><table border="1"><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Date de Demande</th></tr>';
    if (count($participants) > 0) {
        foreach ($participants as $participant) {
            $html .= "<tr><td>{$participant['idUser']}</td><td>{$participant['nom']}</td><td>{$participant['prenom']}</td><td>{$participant['email']}</td><td>{$participant['dateDemande']}</td></tr>";
        }
    } else {
        $html .= '<tr><td colspan="5">Aucun participant inscrit à cette session.</td></tr>';
    }
    $html .= '</table>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
    $dompdf->stream("session-$idSession-participants.pdf", array("Attachment" => true));
    exit;
}