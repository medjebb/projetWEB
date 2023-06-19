<?php
require_once('dbaccess.php');

class HeureSup 
{
    private $status;
    private $datehs;
    private $nbrheures;
    private $idEmploye;
    
    public function __construct($datehs, $nbrheures, $idEmploye)
    {
        $this->datehs=$datehs;
        $this->nbrheures=$nbrheures;
        $this->idEmploye=$idEmploye;
        $this->status=2;
    }

    public static function getById($id){
        $_dba = new Dbaccess(); 
        $_dba->query('Select * from hs where idEmploye="'.$id.'"');
        return $_dba->resultSet();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from hs");
        $_dba->execute();
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from hs ");
        return $_dba->resultSet();
    }
    public static function getAll_enCours(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from hs where status=2");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO hs VALUES(null,"'. $this->status .'","'. $this->nbrheures .'","'. $this->datehs .'","'. $this->idEmploye .'")');
        $_dba->execute();
        return 0;
    }
}
