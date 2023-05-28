<?php
require_once('dbaccess.php');

class Employe{

    private  $nom;
    private  $prenom;
    private  $email;
    private  $password;
    private  $tel;
    private  $sexe;
    private  $role;
    private  $address;
    private  $image;
    private  $diplome;
    private  $datenaissance;
    private  $datecreation;
    private  $createur;
    private  $salairedebase;
    private  $nbrenfants;
    private  $dateembauche;
    private  $cnss;
    private  $amo;
    private  $igr;
    private  $cimr;
    private  $identreprise;
    private  $dba;

    public function __construct($nom,$prenom,$email,$password,$tel,$sexe,$role,$address,$image,$diplome,$datenaissance,$datecreation,$createur,$salairedebase,$nbrenfants,$dateembauche,$cnss,$amo,$igr,$cimr,$identreprise){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->tel = $tel;
        $this->sexe = $sexe;
        $this->role = $role;
        $this->address = $address;
        $this->image = $image;
        $this->diplome = $diplome;
        $this->datenaissance = $datenaissance;
        $this->datecreation = $datecreation;
        $this->createur = $createur;
        $this->salairedebase = $salairedebase;
        $this->nbrenfants = $nbrenfants;
        $this->dateembauche = $dateembauche;
        $this->cnss = $cnss;
        $this->amo = $amo;
        $this->igr = $igr;
        $this->cimr = $cimr;
        $this->identreprise = $identreprise;
    }

    public static function countbyemail($email,$password){
        $_dba = new Dbaccess();
        $_dba->query("select * from employe where Email= '$email' and Password = '$password' ");
        $_dba->execute();
        return $_dba->rowCount();
    }

    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from employe");
        $_dba->execute();
        return $_dba->rowCount();
    }


    public static function getOnebyemail($email,$password){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from employe where Email= '$email' and Password = '$password' ");
        return $_dba->single();
    }

    public static function getOne($id){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from employe where idEmploye = '$id'");
        return $_dba->single();
    }


    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from employe");
        return $_dba->resultSet();
    }


    /*public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO employe VALUES()');
        $_dba->execute();
        return 0;
    }*/

    public static function delete($id){
        $_dba = new Dbaccess();
        $_dba->query("delete from employe where idEmploye = '$id'" );
        $_dba->execute();
        return 0;
    }

    /*public function update($id){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE employe set ');
        $_dba->execute();
        return 0;
    }*/

};

?>