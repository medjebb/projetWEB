<?php

session_start();
require_once('employe.php');
require_once('primes.php');


if(isset($_POST['addprime'])){

    if(Employe::countbyid($_POST['idEmploye']) == 0){
        header('location: ../RHaddprime.php?error=1');
    }else{
        $prime = new Prime($_POST['typePrime'],$_POST['prime'],$_POST['datePrime'],$_POST['idEmploye']);
        $prime->save();
        header('location: ../RHprime.php');
    }

        
}

if(isset($_POST['updateprime'])){

    $prime = new Prime($_POST['typePrime'],$_POST['prime'],$_POST['datePrime'],$_POST['idEmploye']);
    $prime->update($_POST['idPrime']);
    header('location: ../RHprime.php');

}



?>