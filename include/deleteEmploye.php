<?php
session_start();
require_once('employe.php');
$image = $_GET['img'];
$path = $_SERVER['DOCUMENT_ROOT']."/projetweb/img/pdp/".$image;
unlink($path);

$id = $_GET['idEmploye'];
Employe::delete($id);
header('location: ../RHEmploye.php');

?>
