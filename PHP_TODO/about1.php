<?php  
session_start();
print_r($_POST);

$_SESSION['id']=$_POST;
$_SESSION['update']=$_POST;
?>