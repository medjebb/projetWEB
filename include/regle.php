<?php
require_once('dbaccess.php');

class Regle{

    private  $idEntreprise;
    private  $idRubrique;
    private  $formule;
    private  $dateCreation;

    public function __construct($idEntreprise,$idRubrique,$formule){
        $this->idEntreprise = $idEntreprise;
        $this->idRubrique = $idRubrique;
        $this->formule = $formule ;
        $this->dateCreation = date("Y-m-d");
    }

    public static function count($idE,$idR){
        $_dba = new Dbaccess();
        $_dba->query("select * from regle where idEntreprise = '$idE' and idRubrique = '$idR' ");
        $_dba->execute();
        return $_dba->rowCount();
    }



    public static function getOne($idE,$idR){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from regle where idEntreprise = '$idE' and idRubrique = '$idR' ");
        return $_dba->single();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from regle");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO regle VALUES("'. $this->idEntreprise .'","'. $this->idRubrique .'","'. $this->formule .'","'. $this->dateCreation .'")');
        $_dba->execute();
        return 0;
    }

    public static function delete($idE,$idR){
        $_dba = new Dbaccess();
        $_dba->query("delete from regle where idEntreprise = '$idE' and idRubrique = '$idR' ");
        $_dba->execute();
        return 0;
    }

    public function update(){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE regle set formule = "'. $this->formule .'"  , datecreation = "'. $this->dateCreation .'" where idEntreprise ="'. $this->idEntreprise .'" and idRubrique = "'. $this->idRubrique .'"');
        $_dba->execute();
        return 0;
    }


};

?>