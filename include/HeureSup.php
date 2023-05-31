<?php
require_once('dbaccess.php');

class HeureSup 
{
    private $status;
    private $datehs;
    private $nbrheures;
    private $idEmploye;
    
    public function HeureSup($datehs, $nbrheures, $idEmploye)
    {
        $this->datehs=$datehs;
        $this->nbrheures=$nbrheures;
        $this->idEmploye=$idEmploye;
        $this->status=0;
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
}
