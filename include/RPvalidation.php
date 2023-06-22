<?php 
if(isset($_SESSION['id'])){
    if($_SESSION['role']!='Paie'){
        header('location: 404.php');
    }
}
?>