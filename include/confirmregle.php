<?php

session_start();
require_once('regle.php');


if(isset($_POST['addregle'])){

    if(Regle::count($_POST['idEntreprise'],$_POST['idRubrique']) > 0){
        header('location: ../Paieaddregle.php?error=1');
    }else{
        $Regle = new Regle($_POST['idEntreprise'],$_POST['idRubrique'],$_POST['formule']);
        $Regle->save();
        header('location: ../PaieRegle.php');
    }
    
        
}

if(isset($_POST['updateregle'])){

    $Regle = new Regle($_POST['idEntreprise'],$_POST['idRubrique'],$_POST['formule']);
    $Regle->update();
    header('location: ../PaieRegle.php');
    

}



?>