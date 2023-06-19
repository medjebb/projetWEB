<?php

session_start();
require_once('reclamation.php');

// echo $_SESSION['id'] ;
if(isset($_POST['declarerReclamation'])){
    
    $Reclamation = new reclamation($_POST['description'],$_POST['Objetrec'],$_SESSION['id'],$_POST['typeResp'],$_POST['Daterec']);
    
    $Reclamation->save();
    header('location: ../EmpReclamation.php');
        
}

// if(isset($_POST['updateentreprise'])){

//     $entreprise = new Entreprise($_POST['nomEntreprise'],$_POST['address'],$_POST['createDate'],$_POST['createdBy']);
//     $entreprise->update($_POST['idEntreprise']);
//     header('location: ../RHentreprise.php');

// }



?>