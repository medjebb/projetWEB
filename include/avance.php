<?php
require_once('dbaccess.php');

class avance 
{
    private $statut;
    private $dateDemande;
    private $avance;
    private $idEmploye;

    public function __construct($statut,$dateDemande,$avance,$idEmploye)
    public function __construct($statut,$dateDemande,$avance,$idEmploye)
    {
        $this->statut=$statut;
        $this->dateDemande=$dateDemande;
        $this->avance=$avance;
         $this->idEmploye=$idEmploye;
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

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO avance (statut,dateDemande,avance,idEmploye) VALUES("'.$this->statut.'", "'.$this->dateDemande.'","'.$this->avance.'","'.$this->idEmploye.'")');
        $_dba->execute();
        return 0;
    }

}

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO avance (statut,dateDemande,avance,idEmploye) VALUES("'.$this->statut.'", "'.$this->dateDemande.'","'.$this->avance.'","'.$this->idEmploye.'")');
        $_dba->execute();
        return 0;
    }

}