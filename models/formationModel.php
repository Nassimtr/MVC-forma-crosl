<?php

require_once 'database.php';

require_once 'database.php';

function addFormation($idTheme, $libelle, $salle, $adresse, $cp, $ville, $objectifs, $prix, $public, $niveau) {
    $db = dbConnect();
    $stmt = $db->prepare("INSERT INTO formation (idTheme, libelle, salle, adresse, cp, ville, Objectifs, prix, public, niveau) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$idTheme, $libelle, $salle, $adresse, $cp, $ville, $objectifs, $prix, $public, $niveau]);
    return $db->lastInsertId();
}

function updateFormation($idFormation, $idTheme, $libelle, $salle, $adresse, $cp, $ville, $objectifs, $prix, $public, $niveau) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE formation SET idTheme = ?, libelle = ?, salle = ?, adresse = ?, cp = ?, ville = ?, Objectifs = ?, prix = ?, public = ?, niveau = ? WHERE idFormation = ?");
    $success = $stmt->execute([$idTheme, $libelle, $salle, $adresse, $cp, $ville, $objectifs, $prix, $public, $niveau, $idFormation]);
    return $success;  
}

function deleteFormation($idFormation) {
    $db = dbConnect();
    $stmt = $db->prepare("DELETE FROM formation WHERE idFormation = ?");
    $success = $stmt->execute([$idFormation]);
    return $success;  //retourne true si la suppression a réussi
}


function getFormationById($idFormation) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM formation WHERE idFormation = ?");
    $stmt->execute([$idFormation]);
    return $stmt->fetch();
}

function getAllFormations() {
    $db = dbConnect();
    $stmt = $db->query("SELECT * FROM formation");
    return $stmt->fetchAll();
}
