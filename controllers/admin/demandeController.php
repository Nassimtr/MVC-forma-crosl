<?php
require_once 'models/demandeModel.php';

// Affiche toutes les demandes en attente pour l'administration
function showAllDemandesEnAttente() {
    $demandesEnAttente = getAllDemandesEnAttente();
    include 'vues/admin/demande/listeDemandes.php'; // Affichez la vue appropriée ici
}

function approveDemande($idDemande) {
    updateDemandeStatus($idDemande, 'oui');
    header("Location: index.php?action=showAllDemandesEnAttente");
    exit();
}

function rejectDemande($idDemande) {
    updateDemandeStatus($idDemande, 'non');
    header("Location: index.php?action=showAllDemandesEnAttente");
    exit();
}

