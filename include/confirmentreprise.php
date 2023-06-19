<?php

session_start();
require_once('entreprise.php');


if(isset($_POST['addentreprise'])){

    $entreprise = new Entreprise($_POST['nomEntreprise'],$_POST['address'],$_POST['createDate'],$_POST['createdBy']);
    $entreprise->save();
    header('location: ../RHentreprise.php');
        
}

if(isset($_POST['updateentreprise'])){

    $entreprise = new Entreprise($_POST['nomEntreprise'],$_POST['address'],$_POST['createDate'],$_POST['createdBy']);
    $entreprise->update($_POST['idEntreprise']);
    header('location: ../RHentreprise.php');

}



?>