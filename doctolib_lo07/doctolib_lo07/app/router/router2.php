<?php
require('../controller/ControllerAdministrateur.php');
require('../controller/ControllerConnexion.php');
require('../controller/ControllerPatient.php');
require('../controller/ControllerPraticien.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
if(isset($_POST["action"])){
    $action=htmlspecialchars($_POST["action"]);
}
else{
    $action = htmlspecialchars($param["action"]);        
}


// --- Liste des méthodes autorisées
switch($action){
    case "listeDisponibilite":
    case "listeRdvPraticien":
    case "listePatient":
    case "ajoutDispo":
    case "insertPraticienDispo":
    
        ControllerPraticien::$action();
        break;
    case "infoCompte":
    case "listeRdv":
    case "listePrat":
    case "insertPatientRdv":
    case "rechSpecialite":
    case "getSpecialite":
        ControllerPatient::$action();
        break;
    case "listeDispo":

        ControllerPatient::$action();
        break;
    case "specialiteReadAll":
    case "listePraticien":
    case "nbrePraticien":
    case "specialiteRech":
    case "specialiteAffiche":
    case "ajoutSpecialite":
    case "insertSpecialite":
    case "info":
        ControllerAdministrateur::$action();
        break;
    
    case "Login":
    case "inscription":
    case "pageInscription":
    case "deconnexion":
        ControllerConnexion::$action();
        break;
    default:
     //$action = "AdministrateurAccueil";
     //ControllerAdministrateur::$action();
     $action="Acceuil";
     ControllerConnexion::$action();
}

