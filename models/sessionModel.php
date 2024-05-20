<?php
require_once 'database.php';

function addSession($idFormation, $dateSession, $dateLimite, $idIntervenant, $nbPlace) {
    $db = dbConnect();
    $stmt = $db->prepare("INSERT INTO session (idFormation, dateSession, dateLimite, idIntervenant, nbPlace) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$idFormation, $dateSession, $dateLimite, $idIntervenant, $nbPlace]);
    return $db->lastInsertId();
}

function updateSession($idSession, $idFormation, $dateSession, $dateLimite, $idIntervenant, $nbPlace) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE session SET idFormation = ?, dateSession = ?, dateLimite = ?, idIntervenant = ?, nbPlace = ? WHERE idSession = ?");
    $succes = $stmt->execute([$idFormation, $dateSession, $dateLimite, $idIntervenant, $nbPlace, $idSession]);
    return $succes;
}


function deleteSession($idSession) {
    $db = dbConnect();
    $stmt = $db->prepare("DELETE FROM session WHERE idSession = ?");
    $succes = $stmt->execute([$idSession]);
    return $succes;
}

function getSessionById($idSession) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT s.*, f.idTheme 
                          FROM session s 
                          JOIN formation f ON s.idFormation = f.idFormation 
                          WHERE s.idSession = ?");
    $stmt->execute([$idSession]);
    return $stmt->fetch();
}


function getAllSessions() {
    $db = dbConnect();
    $stmt = $db->query("SELECT session.*, formation.libelle AS formationName FROM session JOIN formation ON session.idFormation = formation.idFormation");
    return $stmt->fetchAll();
}

function getFutureSessionsByFormation($idFormation) {
    $db = dbConnect();
    $today = date('Y-m-d'); 
    $stmt = $db->prepare("SELECT session.*, intervenant.nom AS intervenantNom, intervenant.prenom AS intervenantPrenom 
                          FROM session 
                          JOIN formation ON session.idFormation = formation.idFormation
                          JOIN intervenant ON session.idIntervenant = intervenant.idIntervenant
                          WHERE session.idFormation = ? AND session.dateLimite > ?");
    $stmt->execute([$idFormation, $today]);
    return $stmt->fetchAll();
}

function getUserDemandes($idUser) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT d.*, s.dateSession, f.libelle, f.prix, d.accorde
                          FROM demande d
                          JOIN session s ON d.idSession = s.idSession
                          JOIN formation f ON s.idFormation = f.idFormation
                          WHERE d.idUser = ? AND d.accorde != 'non'");
    $stmt->execute([$idUser]);
    return $stmt->fetchAll();
}

function cancelDemande($idDemande) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE demande SET accorde = 'non' WHERE idDemande = ?");
    return $stmt->execute([$idDemande]);
}

function updateSessionPlaces($idSession, $newPlaceCount) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE session SET nbPlace = ? WHERE idSession = ?");
    return $stmt->execute([$newPlaceCount, $idSession]);
}



