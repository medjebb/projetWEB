<?php
require_once('dbaccess.php');
class reclamation
{
    private $status;
    private $objet;
    private $description;
    private $idEmploye;
    private $responsable;
    private $date;

    public function reclamation($description,$objet,$idEmploye, $responsable,$date)
    {
        $this->status= 0;
        $this->objet=$objet;
        $this->description=$description;
        $this->idEmploye=$idEmploye;
        $this->responsable=$responsable;
        $this->date=$date;
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from reclamation");
        $_dba->execute();
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from reclamation");
        return $_dba->resultSet();
    }

    public static function getAll_RH(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from reclamation where responsable=0 AND status=2");
        return $_dba->resultSet();
    }


    public static function getAll_RP(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from reclamation where responsable=1");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO reclamation VALUES(null,"'. $this->description .'","'. $this->idEmploye .'","'.$this->objet.'" ,"'. $this->responsable .'" ,"'.$this->date.'","'.$this->status.'")'); 
        $_dba->execute();
        return 0;
    }
    public static function delete($id){
        $_dba = new Dbaccess();
        $_dba->query("delete from reclamation where idReclamation = '$id'" );
        $_dba->execute();
        return 0;
    }

    public function update($id){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE reclamation set description = "'. $this->description .'" , idEmploye  = "'. $this->idEmploye  .'",objet="'.$this->objet.'" , responsable="'.$this->responsable.'",date="'.$this->date.'",status="'.$this->status.'" where idReclamation = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }

    public static function accepter($id){
        $status=1;
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE reclamation set status="'.$status.'" where idReclamation = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }
}
