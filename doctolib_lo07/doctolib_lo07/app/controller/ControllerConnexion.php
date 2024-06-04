<?php
session_start();
//$_SESSION['login']=$_POST["login"];
//$_SESSION
require_once '../model/ModelPersonne.php';


class ControllerConnexion{
    // --- page d'acceuil
    public static function Acceuil() {
     include 'config.php';
     $vue = $root . '/app/view/viewAccueil.php';
     if (DEBUG)
      echo ("Controller : Accueil : vue = $vue");
     require ($vue);
    }

    //login du patient
    public static function Login() {
        include 'config.php';
        $vue1 = $root . '/app/view/connexion/viewLogin.php';
        $vue2 = $root . '/app/view/patient/patientAcceuil.php';
        $vue3 = $root . '/app/view/praticien/praticienAcceuil.php';
        $vue4 = $root  . '/app/view/administrateur/viewAdministrateurAcceuil.php';
        
        if(DEBUG)
         echo ("Controller : Accueil : vue = $vue");
            if(isset($_POST["login"])){
            $results=ModelPersonne::Checklogin($_POST['login'], $_POST['password']);}
            if(!empty($results)){
                $_SESSION["autorise"]=true;
                $_SESSION["id"]=$results[0]->getId();
                $_SESSION["login"]=$results[0]->getLogin();
                $_SESSION["nom"]=$results[0]->getNom();
                $_SESSION["prenom"]=$results[0]->getPrenom();
            }
            else{
            $_SESSION["autorise"]=false;
            }
            if($_SESSION["autorise"]){
                switch($results[0]->getStatut()){
                    case(Modelpersonne::PATIENT):
                        require($vue2);
                        break;
                    case(Modelpersonne::PRATICIEN):
                        require($vue3);
                        break;
                    case(Modelpersonne::ADMINISTRATEUR):
                        require($vue4);
                        break;

                }

            }
            else{
                require($vue1);
            }
        }    




    //----- pour l'inscription------//
    public static function inscription(){//methode permettant l'inscription
        // ajouter une validation des informations du formulaire
        $results = ModelPersonne::inscription(
            htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['login']),htmlspecialchars($_POST['pass']),htmlspecialchars($_POST['statut']),htmlspecialchars($_POST['specialite'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInscris.php';
        if (DEBUG)
         echo ("ControllerVin : vinReadAll : vue = $vue");
        require ($vue);
    }

    //affiche la page d'inscription
    public static function pageInscription() {
        // ----- Construction chemin de la vue
        $results=ModelPersonne::getAllSpecialite();
        include 'config.php';
        //$results=ModelPersonne::
        $vue = $root . '/app/view/connexion/viewInscription.php';
        require ($vue);
       }
    
    //deconnexion
    public static function deconnexion(){
        //session_destroy();
        header('Location: router2.php?action=truc');
    }
    
    
    
    
}