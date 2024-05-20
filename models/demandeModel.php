<?php
require_once 'database.php';

function addDemande($idSession, $idUser, $accorde, $dateDemande) {
    $db = dbConnect();
    $stmt = $db->prepare("INSERT INTO demande (idSession, idUser, accorde, dateDemande) VALUES (?, ?, ?, ?)");
    $stmt->execute([$idSession, $idUser, $accorde, $dateDemande]);
    return $db->lastInsertId();
}

function updateDemande($idDemande, $idSession, $idUser, $accorde, $dateDemande) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE demande SET idSession = ?, idUser = ?, accorde = ?, dateDemande = ? WHERE idDemande = ?");
    $stmt->execute([$idSession, $idUser, $accorde, $dateDemande, $idDemande]);
}

function deleteDemande($idDemande) {
    $db = dbConnect();
    $stmt = $db->prepare("DELETE FROM demande WHERE idDemande = ?");
    $stmt->execute([$idDemande]);
}

function getDemandeById($idDemande) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM demande WHERE idDemande = ?");
    $stmt->execute([$idDemande]);
    return $stmt->fetch();
}

function getAllDemandes() {
    $db = dbConnect();
    $stmt = $db->query("SELECT * FROM demande");
    return $stmt->fetchAll();
}

function getParticipantsBySession($idSession) {
    $db = dbConnect();
    $query = "SELECT u.idUser, u.nom, u.prenom, u.email, d.dateDemande, d.accorde 
              FROM utilisateur u
              INNER JOIN demande d ON u.idUser = d.idUser
              WHERE d.idSession = ? AND d.accorde = 'oui'";
    $stmt = $db->prepare($query);
    $stmt->execute([$idSession]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function hasExistingDemande($idUser, $idSession) {
    $db = dbConnect();
    $query = "SELECT COUNT(*) as count FROM demande WHERE idUser = ? AND idSession = ? AND accorde IN ('oui', 'en attente')";
    $stmt = $db->prepare($query);
    $stmt->execute([$idUser, $idSession]);
    $result = $stmt->fetch();
    return $result['count'] > 0;
}

function countUserDemandesByYear($idUser, $year) {
    $db = dbConnect();
    $query = "SELECT COUNT(*) as count FROM demande d
              JOIN session s ON d.idSession = s.idSession
              WHERE d.idUser = ? AND YEAR(s.dateSession) = ? AND d.accorde IN ('oui', 'en attente')";
    $stmt = $db->prepare($query);
    $stmt->execute([$idUser, $year]);
    $result = $stmt->fetch();
    return $result['count'];
}

function countUserDemandesByTheme($idUser, $themeId, $year) {
    $db = dbConnect();
    $query = "SELECT COUNT(*) as count FROM demande d
              JOIN session s ON d.idSession = s.idSession
              JOIN formation f ON s.idFormation = f.idFormation
              WHERE d.idUser = ? AND f.idTheme = ? AND YEAR(s.dateSession) = ? AND d.accorde IN ('oui', 'en attente')";
    $stmt = $db->prepare($query);
    $stmt->execute([$idUser, $themeId, $year]);
    $result = $stmt->fetch();
    return $result['count'];
}

// Récupère toutes les demandes en attente
function getAllDemandesEnAttente() {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT d.*, s.dateSession, f.libelle AS formationName, u.nom, u.prenom 
                          FROM demande d
                          JOIN session s ON d.idSession = s.idSession
                          JOIN formation f ON s.idFormation = f.idFormation
                          JOIN utilisateur u ON d.idUser = u.idUser
                          WHERE d.accorde = 'en attente'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function updateDemandeStatus($idDemande, $accorde) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE demande SET accorde = ? WHERE idDemande = ?");
    $stmt->execute([$accorde, $idDemande]);
}



