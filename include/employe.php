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

    private  $RIB;

    public function __construct($nom,$prenom,$email,$password,$tel,$sexe,$role,$address,$image,$diplome,$datenaissance,$datecreation,$salairedebase,$nbrenfants,$dateembauche,$cnss,$amo,$igr,$cimr,$identreprise,$RIB){
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
        $idcreateur=intval($_SESSION['id']);
        $this->createur=$idcreateur;
        $this->salairedebase =floatval($salairedebase);
        $this->nbrenfants =intval($nbrenfants);
        $this->dateembauche = $dateembauche;
        $this->cnss = $cnss;
        $this->amo = $amo;
        $this->igr = $igr;
        $this->cimr = $cimr;
        $this->identreprise =intval($identreprise);
        $this->RIB = intval($RIB);
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

    public function save(){
        $_dba = new Dbaccess();

        $_dba->query('INSERT INTO employe (Nom, Prenom, Email, Password, Tel, sexe, role, address, Image, Diplome, DateNaissance, DateCreation, idCreateur, SalairedeBase, NbEnfants, DateEmbauche, numCNSS, numAmo, numIGR, numCIMR, idEntreprise, RIB) VALUES ("'.$this->nom.'", "'.$this->prenom.'", "'.$this->email.'", "'.$this->password.'", "'.$this->tel.'", "'.$this->sexe.'", "'.$this->role.'", "'.$this->address.'", "'.$this->image.'", "'.$this->diplome.'", "'.$this->datenaissance.'", "'.$this->datecreation.'", "'.$this->createur.'", "'.$this->salairedebase.'", "'.$this->nbrenfants.'", "'.$this->dateembauche.'", "'.$this->cnss.'", "'.$this->amo.'", "'.$this->igr.'", "'.$this->cimr.'", "'.$this->identreprise.'", "'.$this->RIB.'")');

        $_dba->execute();
        return 0;
    }

    public static function delete($id){
        $_dba = new Dbaccess();
        $_dba->query("delete from employe where idEmploye = '$id'" );
        $_dba->execute();
        return 0;
    }

    public function update($id){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE employe SET Email = "'. $this->email .'", Tel = "'. $this->tel .'", address = "'. $this->address .'", SalairedeBase = "'. $this->salairedebase .'", NbEnfants = "'. $this->nbrenfants .'", numCNSS = "'. $this->cnss .'", numAMO = "'. $this->amo .'", numIGR = "'. $this->igr .'", numCIMR = "'. $this->cimr .'", RIB = "'. $this->RIB .'" WHERE idEmploye = "'.$id.'"');

        $_dba->execute();
        return 0;
    }

};

?>