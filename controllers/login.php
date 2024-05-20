<?php
require_once 'models/userModel.php';

function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = verifyUserPassword($email, $password);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['idUser'];
            $_SESSION['name'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['verif'] = "ok";
            $_SESSION['role'] = ($user['numStatut'] == 0) ? 'admin' : 'user';

            header('Location: index.php');
            exit();
        } else {
            // Si les identifiants sont incorrects, affichez à nouveau la page de connexion avec un message d'erreur.
            echo "Identifiants incorrects"; // Gestion d'erreur simple
           // include('path/to/your/login_form.php'); // Assurez-vous que le chemin vers votre formulaire de connexion est correct
        }
    } else {
       include('vues/login.php');
    }
}
