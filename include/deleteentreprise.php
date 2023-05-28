<?php

session_start();
require_once('entreprise.php');

$id = $_GET['idEntreprise'];
Entreprise::delete($id);
header('location: ../RHentreprise.php');

?>