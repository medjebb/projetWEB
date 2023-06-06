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
    
    public function conge($typeConge, $DateDebut, $DateRetour,$idEmploye)
    {
        $this->typeConge=$typeConge;
        $this->DateDebut=$DateDebut;
        $this->DateRetour=$DateRetour;
        $this->idEmploye=$idEmploye;
        $this->status=0;
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
    public static function getAll_enCours(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from conge where status=2");
        return $_dba->resultSet();
    }
}
