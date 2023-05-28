<?php
require_once('dbaccess.php');

class Entreprise{

    private  $nom;
    private  $address;
    private  $dateCreation;
    private  $createur ;

    public function __construct($nom,$address,$dateCreation,$createur){
        $this->nom = $nom;
        $this->address = $address;
        $this->dateCreation = $dateCreation;
        $this->createur = $createur;
    }

    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from entreprise");
        $_dba->execute();
        return $_dba->rowCount();
    }


    public static function getOne($id){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from entreprise where idEntreprise = '$id'");
        return $_dba->single();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from entreprise");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO entreprise VALUES(null,"'. $this->nom .'","'. $this->address .'","'. $this->dateCreation .'","'. $this->createur .'")');
        $_dba->execute();
        return 0;
    }

    public static function delete($id){
        $_dba = new Dbaccess();
        $_dba->query("delete from entreprise where idEntreprise = '$id'" );
        $_dba->execute();
        return 0;
    }

    public function update($id){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE entreprise set nomEntreprise = "'. $this->nom .'" , address = "'. $this->address .'" , createDate = "'. $this->dateCreation .'" , createdBy = "'. $this->createur .'" where idEntreprise = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }


};

?>