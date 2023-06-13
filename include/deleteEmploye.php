<?php
session_start();
require_once('employe.php');

$id = $_GET['idEmploye'];
Employe::delete($id);
header('location: ../RHEmploye.php');

