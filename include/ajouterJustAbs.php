<?php

require_once('absence.php');
$id=$_POST['Abs_id'];
$uploadOk = 1;
$info = pathinfo($_FILES['fileAbs']['name']);
$ext = $info['extension']; 
if($ext != "pdf" ) {
   $_SESSION['Abs_error'] ="desoler ,seulement des pdf";
   $uploadOk = 0;
 }

 if ($uploadOk != 0) {
$newname = "Abs_".$id.'.'.$ext; 
$target = 'ABS_justif/'.$newname;
if (move_uploaded_file($_FILES["fileAbs"]["tmp_name"], $target)) {
   //echo "The file ". htmlspecialchars( basename( $_FILES["fileAbs"]["name"])). " has been uploaded.";
 } else {
   $_SESSION['Abs_error'] ="Erreur !!!";
 }

$rst = absence::mettre_en_attent($id);
header('location:../EmpAbsences.php');
 }