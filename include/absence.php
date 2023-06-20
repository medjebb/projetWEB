<?php
require_once('dbaccess.php');

class absence 
{
    private $status;
    private $nbrHeure;
    private $idEmploye ;
    private $justification;
    private $date;
    
    public function __construct($nbrHeure,$idEmploye,$date)
    {
        $this->status=0;
        $this->nbrHeure=$nbrHeure;
        $this->idEmploye =$idEmploye;
        $this->date=$date;
    }

    public static function getById($id){
        $_dba = new Dbaccess(); 
        $_dba->query('Select * from absence where idEmploye="'.$id.'"');
        return $_dba->resultSet();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from absence");
        $_dba->execute();
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from absence ");
        return $_dba->resultSet();
    }

    public static function getAll_enAttente(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from absence where status=2");
        return $_dba->resultSet();
    }

    public static function getAll_NonJustifier(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from absence where status=0");
        return $_dba->resultSet();
    }
    public static function getAll_Justifier(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from absence where status=1");
        return $_dba->resultSet();
    }
    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO absence VALUES(null,null,"'. $this->idEmploye .'","'. $this->nbrHeure .'","'. $this->status .'","'. $this->date .'")');
        $_dba->execute();
        return 0;
    }

    public static function accepter($id){
        $status=1;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE absence set status="'.$status.'" where idAbsence = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }
    public static function refuser($id){
        $status=0;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE absence set status="'.$status.'" where idAbsence = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }

    public static function mettre_en_attent($id){
        $status=2;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE absence set status="'.$status.'" where idAbsence = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }
}