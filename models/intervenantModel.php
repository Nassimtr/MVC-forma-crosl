<?php
require_once 'database.php';

function addIntervenant($nom, $prenom, $email, $telephone) {
    $db = dbConnect();
    $stmt = $db->prepare("INSERT INTO intervenant (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $email, $telephone]);
    return $db->lastInsertId();
}

function updateIntervenant($idIntervenant, $nom, $prenom, $email, $telephone) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE intervenant SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE idIntervenant = ?");
    $succes = $stmt->execute([$nom, $prenom, $email, $telephone, $idIntervenant]);
    return $succes ;
}

function deleteIntervenant($idIntervenant) {
    $db = dbConnect();
    $stmt = $db->prepare("DELETE FROM intervenant WHERE idIntervenant = ?");
    $succes = $stmt->execute([$idIntervenant]);
    return $succes; 
}


function getIntervenantById($idIntervenant) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM intervenant WHERE idIntervenant = ?");
    $stmt->execute([$idIntervenant]);
    return $stmt->fetch();
}

function getAllIntervenants() {
    $db = dbConnect();
    $stmt = $db->query("SELECT * FROM intervenant");
    return $stmt->fetchAll();
}
