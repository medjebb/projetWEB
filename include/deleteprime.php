<?php

session_start();
require_once('primes.php');

$id = $_GET['idPrime'];
Prime::delete($id);
header('location: ../RHprime.php');

?>