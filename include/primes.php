<?php
require_once('dbaccess.php');

class Prime 
{
    private $typePrime;
    private $prime;
    private $datePrime;
    private $idEmploye;
    
    public function __construct($typePrime, $prime, $datePrime,$idEmploye)
    {
        $this->typePrime=$typePrime;
        $this->prime=$prime;
        $this->datePrime=$datePrime;
        $this->idEmploye=$idEmploye;
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from prime");
        $_dba->execute();
        return $_dba->rowCount();
    }


    public static function getOne($id){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from prime where idPrime = '$id'");
        return $_dba->single();
    }

    public static function getById($id){
        $_dba = new Dbaccess(); 
        $_dba->query('Select * from prime where idEmploye="'.$id.'"');
        return $_dba->resultSet();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from prime");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO prime VALUES(NULL, "'.$this->typePrime.'", "'.$this->prime.'","'.$this->datePrime.'","'.$this->idEmploye.'")');
        $_dba->execute();
        return 0;
    }

    public static function delete($id){
        $_dba = new Dbaccess();
        $_dba->query("delete from prime where idPrime = '$id'" );
        $_dba->execute();
        return 0;
    }

    public static function getBy_Month_Year($Month, $year) {
        $_dba = new Dbaccess();
        $_dba->query("SELECT SUM(prime) AS somme_primes
                      FROM prime
                      WHERE MONTH(datePrime) = ".$Month." AND YEAR(datePrime) = ".$year);
        $_dba->execute();
        $result = $_dba->single(); // Récupérer le résultat de la requête
        return $result['somme_primes']; // Retourner la somme des primes
    }
    

    public function update($id){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE prime set typePrime = "'. $this->typePrime .'" , prime = "'. $this->prime .'" , datePrime = "'. $this->datePrime .'" , idEmploye = "'. $this->idEmploye .'" where idPrime = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }

};

?>
