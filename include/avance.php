<?php
require_once('dbaccess.php');

class avance 
{
    private $statut;
    private $dateDemande;
    private $avance;
    private $idEmploye;

    public function avance()
    {
        # code...
    }

    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from avance");
        $_dba->execute();
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from avance ");
        return $_dba->resultSet();
    }
    public static function getAll_enCours(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from avance where statut=2");
        return $_dba->resultSet();
    }
}
