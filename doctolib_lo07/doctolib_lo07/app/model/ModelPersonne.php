<?php

require_once 'Model.php';
class Modelpersonne{
     const ADMINISTRATEUR=0;
     const PRATICIEN=1;
     const PATIENT=2;
    
    private $id,$nom,$prenom,$adresse,$login,$password,$statut,$specialite_id;
    
    public function __construct($id=NULL,$nom=NULL,$prenom=NULL,$adresse=NULL,$login=NULL,$password=NULL,$statut=NULL,$specialite_id=NULL) {
        if(!is_null($id)){
            $this->id=$id;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->adresse=$adresse;
            $this->login=$login;
            $this->password=$password;
            $this->statut=$statut;
            $this->specialite_id=$specialite_id;
        }
    }
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getSpecialite_id() {
        return $this->specialite_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setStatut($statut){
        $this->statut = $statut;
    }

    public function setSpecialite_id($specialite_id){
        $this->specialite_id = $specialite_id;
    }
    
    
    //-------------------ensemble des methodes model pour la connexion et l'inscription----------------------------
    public static function CheckLogin($login, $password){ //permet de verifier que le login et le password fourni sont bien existant
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from personne where login=:login and password=:password";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(["login"=>$login, "password"=>$password]);
            $results=$sth->fetchAll(PDO::FETCH_CLASS, "Modelpersonne");
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }

    }

    //Inscription d'une personne dans la base de donnée
    public static function inscription($nom,$prenom,$adresse,$login,$password,$statut,$specialite_id){
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //recupération du max id
            $requete="select max(id) from personne";
            $sth=$database->prepare($requete);
            $sth->execute();
            $tuple = $sth->fetch();
            $id = $tuple['0'];
            $id++;
            //verifie si le login est déja présent dans la base de donnée
            $requete="select * from personne where login=:login";
            $sth=$database->prepare($requete);
            $sth->execute(["login"=>$login]);
            $tab=$sth->fetchAll(PDO::FETCH_ASSOC);
            if(count($tab)>0){
                return false;
            }
            else{
                //insertion dans la base de donnée
                $requete="insert into personne value(:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite_id)";
                $sth=$database->prepare($requete);
                $sth->execute(
                    ["id"=>$id,
                    "nom"=>$nom,
                    "prenom"=>$prenom,
                    "adresse"=>$adresse,
                    "login"=>$login,
                    "password"=>$password,
                    "statut"=>$statut,
                    "specialite_id"=>$specialite_id
                    ]);
                return true;
            }
            
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }


//------------------------------    methode de modele pour les administrateurs------------------------
    
    //recupere la liste de toutes les spécialités
    public static function getAllSpecialite(){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from specialite";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //affiche la liste de tous les administrateurs
    public static function getAlladmin(){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from personne where statut=0";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    // affiche le Nombre de praticiens par patient pour un administrateur
    public static function getNbrePraticienParPatient(){
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="SELECT p.id AS patient_id, COUNT(DISTINCT r.praticien_id) AS nombre_praticiens,p.nom
            FROM personne p
            JOIN rendezvous r ON p.id = r.patient_id
            GROUP BY p.id;";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //affiche la liste des id de spécialité
    public static function getIdSpecialite(){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select id from specialite";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll();
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //selectionne une specialite avec son id 
    public static function selectSpecialite($id){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from specialite where id=:id";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(["id"=>$id]);
            $results=$sth->fetch();
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //permet d'inserer une nouvelle specialité dans la table
    public static function insertSpecialite($specialite) {
        try {
         $database = Model::getInstance();
      
         // recherche de la valeur de la clé = max(id) + 1
         $query = "select max(id) from specialite";
         $statement = $database->query($query);
         $tuple = $statement->fetch();
         $id = $tuple['0'];
         $id++;
         //verifie si la specialite est déja présente dans la base de donnée
         $requete="select * from specialite where label=:label";
         $sth=$database->prepare($requete);
         $sth->execute(["label"=>$specialite]);
         $tab=$sth->fetchAll(PDO::FETCH_ASSOC);
         if(count($tab)>0){
             return false;
         }
         else{
             // ajout d'un nouveau tuple;
            $query = "insert into specialite value (:id, :specialite)";
            $statement = $database->prepare($query);
            
            $statement->execute([
                'id' => $id,
                'specialite' =>$specialite
                ]);
            return true;
         }
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
    }

    //-------------------------------------- methode de modele pour les patients-----------------------------

    //recupere la liste de tous les patients
    public static function getAllpatient(){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from personne where statut=2";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //affiche la liste de tous les rendezvous
    public static function getAllRdv(){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from rendezvous";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //affiche les information de compte d'un patient
    public static function getInfoCompte($id){
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from personne where id=:id;";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(["id"=>$id]);
            $results=$sth->fetchAll(PDO::FETCH_CLASS, "Modelpersonne");
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //affiche  la liste des rendez vous d'un client
    public static function getListeRendezvous($id){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="SELECT praticien.nom AS nom, praticien.prenom AS prenom, rendezvous.rdv_date
            FROM rendezvous
            JOIN personne AS praticien ON rendezvous.praticien_id = praticien.id
            WHERE rendezvous.patient_id =:id;";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(["id"=>$id]);
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //affiche  la liste des rendez vous d'un patient
    public static function getListePraticien(){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select p.id, p.nom, prenom from personne p where p.statut=1;";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }

    }

    public static function insertPatientRdv($patient_id, $praticien_id, $date) {    //insertion d'un nouveau rendez-vous pour un client
        try {
         $database = Model::getInstance();
      
         
         $query = "update rendezvous set patient_id=:patient_id where praticien_id=:praticien_id and rdv_date=:rdv_date";
         $statement = $database->prepare($query);
         $statement->execute([
           'patient_id' => $patient_id,
           'praticien_id' =>$praticien_id,
           'rdv_date' =>$date
           
         ]);
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
    }

    public static function rechListeSpecialite($term){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select label from specialite s where s.label like :terme";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(['terme'=>'%'.$term.'%']);
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }

    }




    // ---------------------------methode de modele pour le praticien-----------------------------------

    //affiche la liste de tous les praticiens
    public static function getAllpraticien(){ 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select * from personne where statut=1";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    //liste des praticiens ainsi que leur spécialité 
    public static function getPraticien(){
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select P.id, P.nom, P.prenom, P.adresse, label from personne as P, specialite as S where S.id=specialite_id and statut=1";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute();
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    public static function getListeDisponibilite($id){ //affiche la liste des disponibilites d'un praticiens 
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="select r.rdv_date from rendezvous r where r.patient_id=0 and r.praticien_id=:id";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(["id"=>$id]);
            $results=$sth->fetchAll();
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }
    }

    public static function getListeRdvWithPatient($id){ //affiche la liste des rendez vous avec les noms des patients
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="SELECT r.rdv_date AS rdv_date, p.nom AS patient_nom
            FROM rendezvous r
            JOIN personne p ON r.patient_id = p.id
            WHERE r.praticien_id=:id and r.patient_id!=0;";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(["id"=>$id]);
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }

    }

    public static function getListePatientDistinct($id){ //affiche la liste des patients pour un praticien
        try{
            //recuperation de la connexion
            $database= Model::getInstance();
            //preparation de la requete
            $requete="SELECT DISTINCT p.nom AS nom, p.prenom AS prenom
            FROM personne p
            JOIN rendezvous r ON p.id = r.patient_id
            WHERE r.praticien_id =:id;";
            $sth=$database->prepare($requete);
            //exécution de la requete
            $sth->execute(["id"=>$id]);
            $results=$sth->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            echo ''.$ex->getMessage();
        }

    }

    public static function insertPraticienDispo($praticien_id, $nbreRdv, $dateRdv) {//permet d'inserer une nouvelle disponibilite pour un praticien
        try {
         $database = Model::getInstance();
      
         // recherche de la valeur de la clé = max(id) + 1
         $query = "select max(id) from rendezvous";
         $statement = $database->query($query);
         $tuple = $statement->fetch();
         $id = $tuple['0'];
         $id++;
      
         // ajout d'un nouveau tuple;
         $query = "insert into rendezvous value (:id, :patient_id, :praticien_id, :date)";
         $statement = $database->prepare($query);
         for($ind=1;$ind<=$nbreRdv;$ind++){
            $statement->execute([
                'id' => $id,
                'patient_id' =>0,
                'praticien_id' => $praticien_id,
                'date' => $dateRdv.' à '.($ind+10).'h00'
              ]);
            $id++;
         }
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
    }
}
