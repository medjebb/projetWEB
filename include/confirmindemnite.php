<?php

session_start();
require_once('employe.php');
require_once('indemnites.php');


if(isset($_POST['addindemnite'])){

    if(Employe::countbyid($_POST['idEmploye']) == 0){
        header('location: ../RHaddindemnite.php?error=1');
    }else{
        $employe = Employe::getOne($_POST['idEmploye']);
        $indemnite = new Indemnite($_POST['typeIndemnite'],$_POST['montant'],$_POST['dateindemnite'],$_POST['idEmploye'],$employe['idEntreprise']);
        $indemnite->save();
        header('location: ../RHindemnite.php');
    }

        
}

if(isset($_POST['updateindemnite'])){

    $indemnite = new Indemnite($_POST['typeIndemnite'],$_POST['montant'],$_POST['dateindemnite'],$_POST['idEmploye'],$_POST['idEntreprise']);
    $indemnite->update($_POST['idIndemnite']);
    header('location: ../RHindemnite.php');

}



?>