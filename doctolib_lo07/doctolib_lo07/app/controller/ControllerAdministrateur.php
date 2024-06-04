<?php
require_once '../model/ModelPersonne.php';


class ControllerAdministrateur{
    // --- page d'acceuil
    public static function AdministrateurAccueil() {
     include 'config.php';
     $vue = $root . '/app/view/viewAdministrateurAccueil.php';
     if (DEBUG)
      echo ("ControllerVin : caveAccueil : vue = $vue");
     require ($vue);
    }

    //afficher la liste de toutes les spécialités
    public static function specialiteReadAll(){ 
        $results= Modelpersonne::getAllSpecialite();
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewSpecialite.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }
    public static function listePraticien(){
        $results=Modelpersonne::getPraticien();
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewPraticien.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }


    //afficher une liste d'id pour les spécialités
    public static function specialiteRech(){
        $results=Modelpersonne::getIdSpecialite();
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewIdSelect.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }


    //Affiche une specialite en fonction de l'id
    public static function specialiteAffiche(){
        $results=Modelpersonne::selectSpecialite($_POST["idSpecialite"]);
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewSelected.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }


    public static function info(){
        $result1=Modelpersonne::getAllSpecialite();
        $result2=Modelpersonne::getAllpraticien();
        $result3=Modelpersonne::getAllpatient();
        $result4=Modelpersonne::getAlladmin();
        $result5=Modelpersonne::getAllRdv();
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewInfo.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }






    public static function nbrePraticien(){
        $results=Modelpersonne::getNbrePraticienParPatient();
        //Construction du chemin de la vue
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewNbrePraticien.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }

    public static function ajoutSpecialite(){
        
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewAddSpecialite.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }

    //page d'insertion de la specialite
    public static function insertSpecialite(){
        $results=Modelpersonne::insertSpecialite($_POST["specialite"]);
        
        include 'config.php';
        $vue=$root.'/app/view/administrateur/viewAddedSpecialite.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }


}

