<?php
require_once 'database.php';

function getUserByEmail($email) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT idUser, nom, prenom, numStatut, motDePasse FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function verifyUserPassword($email, $password) {
    $user = getUserByEmail($email);
    if ($user && password_verify($password, $user['motDePasse'])) {
        return $user;
    } else {
        return false;
    }
}

function addUser($nom, $prenom, $adresse, $cp, $ville, $email, $fonction, $numAssociation, $numStatut, $motDePasse) {
    $db = dbConnect();
    $stmt = $db->prepare("INSERT INTO utilisateur (nom, prenom, adresse, cp, ville, email, fonction, numAssociation, numStatut, motDePasse) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $adresse, $cp, $ville, $email, $fonction, $numAssociation, $numStatut, password_hash($motDePasse, PASSWORD_DEFAULT)]);
    return $db->lastInsertId();
}

function updateUser($idUser, $nom, $prenom, $adresse, $cp, $ville, $email, $fonction, $numAssociation, $numStatut, $motDePasse) {
    $db = dbConnect();
    // Préparer la requête sans inclure le mot de passe par défaut
    $sql = "UPDATE utilisateur SET nom = ?, prenom = ?, adresse = ?, cp = ?, ville = ?, email = ?, fonction = ?, numAssociation = ?, numStatut = ? WHERE idUser = ?";
    $params = [$nom, $prenom, $adresse, $cp, $ville, $email, $fonction, $numAssociation, $numStatut, $idUser];

    // Ajouter le mot de passe à la requête si celui-ci est fourni
    if (!empty($motDePasse)) {
        $sql = "UPDATE utilisateur SET nom = ?, prenom = ?, adresse = ?, cp = ?, ville = ?, email = ?, fonction = ?, numAssociation = ?, numStatut = ?, motDePasse = ? WHERE idUser = ?";
        $params[] = password_hash($motDePasse, PASSWORD_DEFAULT); // Hasher le nouveau mot de passe
        $params[] = $idUser;
    }

    $stmt = $db->prepare($sql);
    $succes = $stmt->execute($params);
    return $succes;
}

function deleteUser($idUser) {
    $db = dbConnect();
    $stmt = $db->prepare("DELETE FROM utilisateur WHERE idUser = ?");
    return $stmt->execute([$idUser]);
}

function getUserById($idUser) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE idUser = ?");
    $stmt->execute([$idUser]);
    return $stmt->fetch();
}

function getAllUsers() {
    $db = dbConnect();
    $stmt = $db->query("SELECT * FROM utilisateur");
    return $stmt->fetchAll();
}
