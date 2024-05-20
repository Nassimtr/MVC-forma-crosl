<?php
require_once 'database.php';

function getAllAssociations() {
    $db = dbConnect();
    $stmt = $db->query("SELECT * FROM association");
    return $stmt->fetchAll();
}

function getAssociationById($numAssociation) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM association WHERE numAssociation = ?");
    $stmt->execute([$numAssociation]);
    return $stmt->fetch();
}
