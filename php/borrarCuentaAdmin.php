<?php
include_once('conexion.php');
session_start();
$idAdmin = $_SESSION['idAdmin'];

$query = "DELETE FROM administrador WHERE idAdmin ='$idAdmin'";


$rsQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($rsQuery)
	include_once('../include/cerrarSesion.php');

?>