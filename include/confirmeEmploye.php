<?php
require_once('validation.php');

if(isset($_POST['addEmploye'])
){

     $employe = new Employe(
         $_POST['nom'],
         $_POST['prenom'],
         $_POST['email'],
         $_POST['tel'],
         $_POST['sexe'],
         'Employe',
         $_POST['adress'],
         $_POST['image'],
         $_POST['diplome'],
         $_POST['DateNaissance'],
         $_POST['salaireBase'],
         $_POST['nbEnfant'],
         $_POST['DateEmbauche'],
         $_POST['numCNSS'],
         $_POST['numAmo'],
         $_POST['numIGR'],
         $_POST['numCIMR'],
         $_POST['idEntreprise'],
         $_POST['rib'],
     );
     $employe->save();
     header('location:../RHEmploye.php');
 }

if (isset($_POST['updateEmploye'])) 
{
$employe = new Employe(
    NULL,
    NULL,
    $_POST['Email'],
    $_POST['Tel'],
    NULL,
    NULL,
    $_POST['address'],
    NULL,
    NULL,
    NULL,
    $_POST['SalairedeBase'],
    $_POST['NbEnfants'],
    NULL,
    $_POST['numCNSS'],
    $_POST['numAmo'],
    $_POST['numIGR'],
    $_POST['numCIMR'],
    NULL,
    $_POST['RIB']
);
$employe->update($_POST['idEmploye']);
header('location: ../RHEmploye.php');
}
?>