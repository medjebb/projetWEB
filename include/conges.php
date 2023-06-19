<?php
require_once('dbaccess.php');

class conge 
{
    private $idConge;
    private $typeConge;
    private $DateDebut;
    private $DateRetour;
    private $idEmploye;
    private $status;
    
    public function __construct($typeConge, $DateDebut, $DateRetour,$idEmploye)
    {
        $this->typeConge=$typeConge;
        $this->DateDebut=$DateDebut;
        $this->DateRetour=$DateRetour;
        $this->idEmploye=$idEmploye;
        $this->status=2;
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from conge");
        $_dba->execute();
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from conge ");
        return $_dba->resultSet();
    }
    public static function getById($id){
        $_dba = new Dbaccess(); 
        $_dba->query('Select * from conge where idEmploye="'.$id.'"');
        return $_dba->resultSet();
    }
    public static function getAll_enCours(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from conge where status=2");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO conge VALUES(NULL, "'.$this->typeConge.'", "'.$this->DateDebut.'","'.$this->DateRetour.'","'.$this->status.'" ,"'.$this->idEmploye.'")');
        $_dba->execute();
        return 0;
    }
    public static function accepter($id){
        $status=1;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE conge set status="'.$status.'" where idConge  = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }
    public static function refuser($id){
        $status=0;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE conge set status="'.$status.'" where idConge  = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }
}
