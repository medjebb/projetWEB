<?php

session_start();
require_once('rubrique.php');

$id = $_GET['idRubrique'];
Rubrique::delete($id);
header('location: ../PaieRubrique.php');

?>