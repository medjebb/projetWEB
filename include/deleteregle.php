<?php

session_start();
require_once('regle.php');

$idRubrique = $_GET['idRubrique'];
$idEntreprise = $_GET['idEntreprise'];
Regle::delete($idEntreprise,$idRubrique);
header('location: ../PaieRegle.php');

?>