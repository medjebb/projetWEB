<?php

session_start();
require_once('conges.php');

$DateRetour= $_POST['DateRetour'];
$DateDebut= $_POST['DateDebut'];
$typeConge= $_POST['typeConge'];
echo $DateDebut;
if( !empty($typeConge) && !empty($DateDebut) && !empty($DateRetour))
{
   $conge= new conge($typeConge, $DateDebut, $DateRetour,$_SESSION['id']);
   $conge->save();
   header('location: ../EmpConge.php');
}


?>