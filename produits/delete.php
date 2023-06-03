<?php 
require 'config.php';
$ref = $_GET["ref"];
$quer="delete from produit where reference='$ref';";
$res=mysqli_query($con,$quer);
header("location:acceuil.php");
?>