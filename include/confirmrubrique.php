<?php

session_start();
require_once('rubrique.php');


if(isset($_POST['addrubrique'])){

    $Rubrique = new Rubrique($_POST['nomRubrique']);
    $Rubrique->save();
    header('location: ../PaieRubrique.php');
        
}

if(isset($_POST['updaterubrique'])){

    $Rubrique = new Rubrique($_POST['nomRubrique']);
    $Rubrique->update($_POST['idRubrique']);
    header('location: ../PaieRubrique.php');

}



?>