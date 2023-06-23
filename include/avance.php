<?php
require_once('dbaccess.php');

class avance 
{
    private $statut;
    private $dateDemande;
    private $avance;
    private $idEmploye;

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

    public static function get_accepter($id){
        $_dba = new Dbaccess(); 
        $_dba->query('Select * from avance where statut=1 AND idEmploye="'.$id.'" ');
        return $_dba->resultSet();
    }

    public static function getBy_Month_Year($Month, $year) {
        $_dba = new Dbaccess();
        $_dba->query("SELECT SUM(avance) AS somme_avc
                      FROM avance
                      WHERE MONTH(dateDemande) = ".$Month." AND YEAR(dateDemande) = ".$year);
        $_dba->execute();
        $result = $_dba->single(); // Récupérer le résultat de la requête
        return $result['somme_avc']; // Retourner la somme des primes
    }


    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO avance (statut,dateDemande,avance,idEmploye) VALUES("'.$this->statut.'", "'.$this->dateDemande.'","'.$this->avance.'","'.$this->idEmploye.'")');
        $_dba->execute();
        return 0;
    }


    public static function accepter($id){
        $status=1;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE avance set statut="'.$status.'" where idAvance = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }
    public static function refuser($id){
        $status=0;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE avance set statut="'.$status.'" where idAvance = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }

}