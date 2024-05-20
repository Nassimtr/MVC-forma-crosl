<?php
require_once 'models/sessionModel.php';

function showUserSessions($idFormation) {
    $sessions = getFutureSessionsByFormation($idFormation);
    include 'vues/user/session/sessionUser.php'; // Vue pour afficher les sessions à l'utilisateur
}
