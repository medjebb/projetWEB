<?php
require_once('dbaccess.php');

class Rubrique{

    private  $nom;
    private  $dateCreation;

    public function __construct($nom){
        $this->nom = $nom;
        $this->dateCreation = date("Y-m-d");
    }

    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("select * from rubrique");
        $_dba->execute();
        return $_dba->rowCount();
    }


    public static function getOne($id){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from rubrique where idRubrique = '$id'");
        return $_dba->single();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from rubrique");
        return $_dba->resultSet();
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO rubrique VALUES(null,"'. $this->nom .'","'. $this->dateCreation .'")');
        $_dba->execute();
        return 0;
    }

    public static function delete($id){
        $_dba = new Dbaccess();
        $_dba->query("delete from rubrique where idRubrique = '$id'" );
        $_dba->execute();
        return 0;
    }

    public function update($id){
        $_dba = new Dbaccess(); 
        $_dba->query('UPDATE rubrique set nomRubrique = "'. $this->nom .'" , datecreation = "'. $this->dateCreation .'"  where idRubrique = "'.$id.'" ');
        $_dba->execute();
        return 0;
    }


};

?>