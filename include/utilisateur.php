<?php
require_once('dbaccess.php');

class ustilisateur
{
    private  $CIN;
    private  $Nom;
    private  $Prenom;
    private  $Email;
    private  $password;
    private  $Phone;
    private  $Image;
    private  $DateNaiss;

    public function __construct($CIN,$Nom,$Prenom,$Email,$password,$Phone,$Image,$DateNaiss)
    {
        $this->CIN=  $CIN;
        $this->Nom=  $Nom;
        $this->Prenom=  $Prenom;
        $this->Email=  $Email;
        $this->password=  $password;
        $this->Phone=  $Phone;
        $this->Image=  $Image;
        $this->DateNaiss=  $DateNaiss;
    }
}
