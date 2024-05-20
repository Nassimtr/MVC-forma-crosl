<?php

function dbconnect() {
    try {
        $database = new PDO('mysql:host=localhost;dbname=mvcCrosl;charset=utf8', 'root', 'root');
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $database;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données: ' . $e->getMessage());
    }
}
