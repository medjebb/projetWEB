<?php
require_once('dbaccess.php');

class Indemnite 
{
    private $typeIndemnite;
    private $montant;
    private $dateindemnite;
    private $idEmploye;
    private $idEntreprise;
    
    public function __construct($typeIndemnite, $montant, $dateindemnite,$idEmploye,$idEntreprise)
    {
        $this->typeIndemnite=$typeIndemnite;
        $this->montant=$montant;
        $this->dateindemnite=$dateindemnite;
        $this->idEmploye=$idEmploye;
        $this->idEntreprise=$idEntreprise;
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from indemnite");
        $_dba->execute();
        return $_dba->rowCount();
    }


    public static function getOne($id){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from indemnite where idIndemnite = '$id'");
        return $_dba->single();
    }

    public static function getById($id){
        $_dba = new Dbaccess(); 
        $_dba->query('Select * from indemnite where idEmploye="'.$id.'"');
        return $_dba->resultSet();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from indemnite");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO indemnite VALUES(NULL, "'.$this->typeIndemnite.'", "'.$this->montant.'","'.$this->dateindemnite.'","'.$this->idEmploye.'","'.$this->idEntreprise.'")');
        $_dba->execute();
        return 0;
    }

    public static function delete($id){
        $_dba = new Dbaccess();
        $_dba->query("delete from indemnite where idIndemnite = '$id'" );
        $_dba->execute();
        return 0;
    }

    public function update($id){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE indemnite set typeIndemnite = "'. $this->typeIndemnite .'" , montant = "'. $this->montant .'" , dateindemnite = "'. $this->dateindemnite .'" , idEmploye = "'. $this->idEmploye .'" , idEntreprise = "'. $this->idEntreprise .'" where idIndemnite = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }

};

?>
