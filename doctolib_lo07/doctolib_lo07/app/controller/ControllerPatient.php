<?php

require_once '../model/ModelPersonne.php';



class ControllerPatient{
    // --- page d'acceuil
    public static function AdministrateurAccueil() {
     include 'config.php';
     $vue = $root . '/app/view/viewAdministrateurAccueil.php';
     if (DEBUG)
      echo ("ControllerVin : caveAccueil : vue = $vue");
     require ($vue);
    }
    
    public static function InfoCompte(){
        $results= Modelpersonne::getInfoCompte($_SESSION["id"]);
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/patient/viewInfo.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }


    public static function listeRdv(){
        $results= Modelpersonne::getListeRendezvous($_SESSION["id"]);
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/patient/viewRdv.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }
    
    public static function listePrat(){
        $results= Modelpersonne::getListePraticien();
        include 'config.php';
        $vue=$root.'/app/view/patient/viewListePrat.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);

        
    }

    public static function listeDispo(){
        $results= Modelpersonne::getListeDisponibilite($_POST["listePraticien"]);
        include 'config.php';
        

        $vue=$root.'/app/view/patient/viewDispo.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        $praticien_id=$_POST["listePraticien"];
        require ($vue);

        
    }

    public static function insertPatientRdv() {
        // ajouter une validation des informations du formulaire
        $results = ModelPersonne::insertPatientRdv(
            $_SESSION["id"], $_POST['praticien_id'], $_POST['listeDispo']
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInserted.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
}


public static function rechSpecialite() {
    // ajouter une validation des informations du formulaire
    
    include 'config.php';
    $vue = $root . '/app/view/patient/viewRechSpecial.php';
    if (DEBUG)
     echo ("ControllerVin : vinReadAll : vue = $vue");
    require ($vue);
}

public static function getSpecialite() {
    // ajouter une validation des informations du formulaire
    $results=ModelPersonne::rechListeSpecialite($_POST["specialite"]);
    include 'config.php';
    $vue = $root . '/app/view/patient/viewSpecialite.php';
    if (DEBUG)
     echo ("ControllerVin : vinReadAll : vue = $vue");
    require ($vue);
}
}