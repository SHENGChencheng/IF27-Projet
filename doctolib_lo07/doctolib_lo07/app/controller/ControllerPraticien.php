<?php

require_once '../model/ModelPersonne.php';



class ControllerPraticien{
    // --- page d'acceuil
    public static function AdministrateurAccueil() {
     include 'config.php';
     $vue = $root . '/app/view/viewAdministrateurAccueil.php';
     if (DEBUG)
      echo ("ControllerVin : caveAccueil : vue = $vue");
     require ($vue);
    }
    
    public static function listeDisponibilite(){
        $results= Modelpersonne::getListeDisponibilite($_SESSION["id"]);
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/praticien/viewListeDispo.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }


    public static function listeRdvPraticien(){
        $results= Modelpersonne::getListeRdvWithPatient($_SESSION["id"]);
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/praticien/viewListeRdv.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }

    public static function listePatient(){
        $results= Modelpersonne::getListePatientDistinct($_SESSION["id"]);
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/praticien/viewListePatient.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }



    public static function ajoutDispo(){
        
        include 'config.php';
        $vue=$root.'/app/view/praticien/viewAjoutDispo.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }

    public static function insertPraticienDispo(){
        Modelpersonne::insertPraticienDispo($_SESSION["id"], $_POST["nbreRdv"], $_POST["dateRdv"]);
        
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewDispoAjoute.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
        
    }
    
    
    public static function insertSpecialite(){
        
    }
}