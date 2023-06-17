<?php

session_start();
require_once('HeureSup.php');

echo $_SESSION['id'] ;
if(isset($_POST['declarerHeuresSupp'])){
    
    $heuresSupp = new HeureSup($_POST['Datehs'],$_POST['nombreheuresSupp'],$_SESSION['id']);
    
    $heuresSupp->save();
    header('location: ../EmpHeuresSupp.php');
        
}

// if(isset($_POST['updateentreprise'])){

//     $entreprise = new Entreprise($_POST['nomEntreprise'],$_POST['address'],$_POST['createDate'],$_POST['createdBy']);
//     $entreprise->update($_POST['idEntreprise']);
//     header('location: ../RHentreprise.php');

// }



?>