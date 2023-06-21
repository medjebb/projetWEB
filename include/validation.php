<?php
session_start();
require_once('employe.php');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $count = Employe::countbyemail($email,$password);

    if($count == 1){
        $employe = Employe::getOnebyemail($email,$password);
        if($employe['role'] == "RH")
        {
            $_SESSION['id'] = $employe['idEmploye'];
            $_SESSION['nom'] = $employe['Nom'];
            $_SESSION['prenom'] = $employe['Prenom'];
            $_SESSION['role'] = $employe['role'];
            $_SESSION['image'] = $employe['Image'];
            if(!isset($_SESSION['redirect']))header('location: ../RHhome.php');
            else header('Location:' .$_SESSION['redirect']);

        }else if($employe['role'] == "Employe"){
            $_SESSION['id'] = $employe['idEmploye'];
            $_SESSION['nom'] = $employe['Nom'];
            $_SESSION['prenom'] = $employe['Prenom'];
            $_SESSION['role'] = $employe['role'];
            $_SESSION['image'] = $employe['Image'];
            if(!isset($_SESSION['redirect']))header('location: ../Employe.php');
            else header('Location:' .$_SESSION['redirect']);
        }else if($employe['role'] == "Paie"){
            /*$_SESSION['id'] = $employe['idEmploye'];
            $_SESSION['nom'] = $employe['Nom'];
            $_SESSION['prenom'] = $employe['Prenom'];
            $_SESSION['role'] = $employe['role'];
            $_SESSION['image'] = $employe['Image'];
            if(!isset($_SESSION['redirect']))header('location: ../RHhome.php');
            else header('Location:' .$_SESSION['redirect']);*/
        }
    }
    else header('Location:../login.php?errornum=1');
}
?>