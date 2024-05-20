<?php
session_start();
require_once('controllers/homepage.php');
require_once('controllers/login.php');
require_once('controllers/admin/formationController.php'); // Inclure le contrôleur des formations
require_once('controllers/userController.php');
require_once('controllers/admin/themeController.php');
require_once('controllers/admin/intervenantController.php');
require_once('controllers/admin/sessionController.php');
require_once('controllers/admin/userController.php');
require_once('controllers/admin/demandeController.php');

require_once('controllers/user/formationUserController.php');
require_once('controllers/user/sessionUserController.php');
require_once('controllers/user/demandeUserController.php');
require_once('controllers/user/userController.php');

require('vues/navbar.php');
try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        switch ($_GET['action']) {
            

            // Connexion et déconnexion :

            case 'login':
                login();
                break;
            
            case 'logout':
                logout();
                break;
        
            // PARTIE ADMIN --------------------------------------------------------------


            case 'adminPanel':
                if(isAdmin()){
                    showAdminPanel();
                }
                else {
                    routeUser();
                }
                break;

            //Formation :

                case 'showFormations':
                if (isAdmin()){
                    showFormations();  // Affiche toutes les formations
                }
                else{
                    routeUser();
                }
                break;

            case 'addFormationForm':
                if(isAdmin()){
                    addFormationForm();
                }
                else{
                    routeUser();
                }
                break;

            case 'addFormation':
                addFormationAction();
                break;
            
            case 'editFormation':
                if ((isset($_GET['id']) && isAdmin())){
                    editFormationAction($_GET['id']);
                }
                else{
                    routeUser();
                }
                break;

            case 'updateFormation':
                if(isAdmin()){
                    updateFormationAction();
                }
                else{
                    routeUser();
                }
                break;

                break;
            case 'deleteFormation':
                if (isset($_GET['id']) && isAdmin()) {
                    deleteFormationAction($_GET['id']);  // Supprime une formation spécifique
                } else {
                    echo "Action non autorisée ou id manquant."; // Sécurité pour l'administration
                }
                break;


            // Theme :
            case 'showThemes':
                if(isAdmin()){
                showThemes();
                }
                else{
                    routeUser();
                }
                break;

            case 'addThemeForm':
                if(isAdmin()){
                    addThemeForm();
                }
                else {
                    routeUser();
                }
                break;

            case 'addTheme':
                if(isAdmin()){
                    addThemeAction();
                }
                else{
                    routeUser();
                }
                break;

            case 'deleteTheme':
                if (isset($_GET['id']) && isAdmin()){
                    deleteThemeAction($_GET['id']);
                }
                else{
                    routeUser();
                }
                break;

            case 'editTheme':
               if ((isset($_GET['id']) && isAdmin())){
                    editThemeAction($_GET['id']);
                }
                else{
                    routeUser();
                }
                break;
                case 'updateThemeAction': 
                    if (isAdmin()) 
                    { 
                        updateThemeAction();                     } 
                    else {
                        routeUser(); 
                    }
                    break;

            // Intervenant:
            case 'showIntervenants':
                if (isAdmin()) {
                    showIntervenants();
                } else {
                    routeUser();
                }
                break;

            case 'addIntervenantForm':
                if (isAdmin()) {
                    addIntervenantForm();
                } else {
                    routeUser();
                }
                break;

            case 'addIntervenant':
                if (isAdmin()) {
                    addIntervenantAction();
                } else {
                    routeUser();
                }
                break;

            case 'editIntervenant':
                if (isset($_GET['id']) && isAdmin()) {
                    editIntervenantAction($_GET['id']);
                } else {
                    routeUser();
                }
                break;

            case 'updateIntervenantAction':
                if (isAdmin()) {
                    updateIntervenantAction();
                } else {
                    routeUser();
                }
                break;

            case 'deleteIntervenant':
                if (isset($_GET['id']) && isAdmin()) {
                    deleteIntervenantAction($_GET['id']);
                } else {
                    routeUser();
                }
                break;

            // Session : 

            case 'showSessions':
                if (isAdmin()) {
                    showSessions();
                } else {
                    routeUser();
                }
                break;
            
            case 'addSessionForm':
                if (isAdmin()) {
                    addSessionForm();
                } else {
                    routeUser();
                }
                break;
            
            case 'addSession':
                if (isAdmin()) {
                    addSessionAction();
                } else {
                    routeUser();
                }
                break;
            
            case 'editSession':
                if (isset($_GET['id']) && isAdmin()) {
                    editSessionAction($_GET['id']);
                } else {
                    routeUser();
                }
                break;
            
            case 'updateSession':
                if (isAdmin()) {
                    updateSessionAction();
                } else {
                    routeUser();
                }
                break;
            
            case 'deleteSession':
                if (isset($_GET['id']) && isAdmin()) {
                    deleteSessionAction($_GET['id']);
                } else {
                    routeUser();
                }
                break;

            case 'downloadParticipantsPDF':
                if (isset($_GET['idSession'])) {
                    downloadParticipantsPDF($_GET['idSession']);
                } else {
                    echo "Session ID is required.";
                }
                break;

            //Demande :

            case 'showAllDemandesEnAttente':
                if (isAdmin()) {  
                    showAllDemandesEnAttente();
                } else {
                    routeUser();
                }
                break;
        
            case 'approveDemande':
                if (isAdmin() && isset($_GET['idDemande'])) {
                    approveDemande($_GET['idDemande']);
                } else {
                    echo "Accès non autorisé ou paramètres manquants.";
                }
                break;
            
            case 'rejectDemande':
                if (isAdmin() && isset($_GET['idDemande'])) {
                    rejectDemande($_GET['idDemande']);
                } else {
                    echo "Accès non autorisé ou paramètres manquants.";
                }
                break;
          
                

                
            // User :
            case 'showUsers':
                if (isAdmin()) {
                    showUsers();
                } else {
                    routeUser();
                }
                break;
            case 'addUserForm':
                if (isAdmin()) {
                    addUserForm();
                } else {
                    routeUser();
                }
                break;
            case 'addUser':
                if (isAdmin()) {
                    addUserAction();
                } else {
                    routeUser();
                }
                break;
            case 'editUser':
                if (isset($_GET['id']) && isAdmin()) {
                    editUserAction($_GET['id']);
                } else {
                    routeUser();
                }
                break;
            case 'updateUser':
                if (isAdmin()) {
                    updateUserAction();
                } else {
                    routeUser();
                }
                break;

            case 'deleteUser':
                if (isset($_GET['id']) && isAdmin()) {
                    deleteUserAction($_GET['id']);
                } else {
                    routeUser();
                }
                break;


            // PARTIE User --------------------------------------------------------------

            case 'showUserFormations':
                if(isLoggedIn()){
                    showUserFormations();
                }
                else{
                    routeUser();
                }
                break;

            case 'detailFormation':
                if (isset($_GET['id']) && isLoggedIn()) {
                    showFormationDetails($_GET['id']);
                } else {
                    echo "Identifiant de formation non fourni.";
                }
                break;

            case 'showUserSessions':
                if (isset($_GET['id']) && isLoggedIn()) {
                    showUserSessions($_GET['id']);
                } 
                
                else {
                    routeUser();
                }
                break;



            case 'addDemande':
                if (isset($_GET['idSession']) && isLoggedIn()) {
                    handleAddDemande($_GET['idSession']);
                } 
                else {
                    routeUser();
                }
                break;
                
            

            case 'showMyInscriptions':
                showMyInscriptions();
                break;


            case 'cancelDemande':
                if (isset($_GET['idDemande'])) {
                    handleCancelDemande($_GET['idDemande']);
                } else {
                    echo "Identifiant de la demande non fourni.";
                }
                break;

            








            // action par défault     
            default:
                echo "Action non reconnue.";
                break;

        }
    } 
    else {
        routeUser();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    // Affichage de l'erreur pour le débogage. En production, vous voudrez peut-être logger l'erreur et afficher un message d'erreur plus générique.
    echo "Erreur : " . $errorMessage;
}
?>
