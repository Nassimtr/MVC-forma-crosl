<?php
require_once 'database.php';

function addTheme($libelle) {
    $db = dbConnect();
    $stmt = $db->prepare("INSERT INTO theme (libelle) VALUES (?)");
    $stmt->execute([$libelle]);
    return $db->lastInsertId();
}

function updateTheme($id, $libelle) {
    $db = dbConnect();
    $stmt = $db->prepare("UPDATE theme SET libelle = ? WHERE id = ?");
    $succes = $stmt->execute([$libelle, $id]);
    return $succes;
}

function deleteTheme($id) {
    $db = dbConnect();
    $stmt = $db->prepare("DELETE FROM theme WHERE id = ?");
    $succes = $stmt->execute([$id]);
    return $succes;
}

function getThemeById($id) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM theme WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getAllThemes() {
    $db = dbConnect();
    $stmt = $db->query("SELECT * FROM theme");
    return $stmt->fetchAll();
}
