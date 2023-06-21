<?php

session_start();
require_once('indemnites.php');

$id = $_GET['idIndemnite'];
Indemnite::delete($id);
header('location: ../RHindemnite.php');

?>