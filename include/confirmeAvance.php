<?php
require_once('avance.php');

if(isset($_POST['addAvance'])
){
     $avance = new avance(2,NULL,$_POST['mad'],$_POST['idemploye']);
     $avance->save();
     header('location:../EmpAvance.php');
 }