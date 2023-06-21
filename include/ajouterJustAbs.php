<?php
session_start();
require_once('absence.php');
$id=$_POST['Abs_id'];
$uploadOk = 1;
$info = pathinfo($_FILES['fileAbs']['name']);
$ext = $info['extension']; 
if($ext != "pdf" ) {
   $_SESSION['Abs_error'] ="Desoler ! , seulement des pdf";
   $uploadOk = 0;
   header('location:../EmpAbsences.php');
 }

if ($uploadOk != 0) {
$newname = "Abs_".$id.'.'.$ext; 
$target = 'ABS_justif/'.$newname;

if (file_exists($target)) {
   $_SESSION['Abs_error'] ="Desoler ! , le justificatif peut etre ajouter qu'une seul fois";
   header('location:../EmpAbsences.php');
 }else {
      if($_FILES["fileAbs"]["error"])
      {
      $_SESSION['Abs_error'] ="Erreur ".$_FILES["fileAbs"]["error"]." !!!";
      }else{
         if (move_uploaded_file($_FILES["fileAbs"]["tmp_name"], $target)) {
            $_SESSION['Abs_success']="Le justificatif est bien enregistrer, le Rh va bientot le  traiter .";
            $rst = absence::mettre_en_attent($id);
            $rst = absence::addJustif($id,$newname);
            //echo "The file ". htmlspecialchars( basename( $_FILES["fileAbs"]["name"])). " has been uploaded.";
             } 
      }
   header('location:../EmpAbsences.php');
 }

 }