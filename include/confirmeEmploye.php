<?php
require_once('validation.php');
function genererMotDePasse($longueur) {
    $bytes = random_bytes($longueur);
    $motDePasse = bin2hex($bytes);
    return $motDePasse;
}
if(isset($_POST['addEmploye'])
){
    
    $file = $_FILES['file'];

        $filename = $file['name'];
        $filetmpname = $file['tmp_name'];
        $filesize = $file['size'];
        $filetype = $file['type'];


        $filext = explode(".",$filename);
        $fileExt = end($filext);
        $image=rand().".".$fileExt;

        move_uploaded_file($filetmpname,$_SERVER['DOCUMENT_ROOT']."/projetweb/img/pdp/".$image);
    $password=genererMotDePasse(8);

    $datecreation=date('Y-m-d');
     $employe = new Employe(
         $_POST['nom'],
         $_POST['prenom'],
         $_POST['email'],
         $password,
         $_POST['tel'],
         $_POST['sexe'],
         'Employe',
         $_POST['adress'],
         $image,
         $_POST['diplome'],
         $_POST['DateNaissance'],
         $datecreation,
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
     header('Location: ../RHEmploye.php');
} 


if (isset($_POST['updateEmploye'])) 
{
    
  $employe = new Employe(
    NULL,
    NULL,
    $_POST['Email'],
    NULL,
    $_POST['Tel'],
    NULL,
    NULL,
    $_POST['address'],
    NULL,
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