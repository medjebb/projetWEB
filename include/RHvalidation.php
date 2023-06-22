<?php 
if(isset($_SESSION['id'])){
    if($_SESSION['role']!='RH'){
        header('location: 404.php');
    }
}
?>