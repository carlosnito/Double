<?php
//Se invoca la conexion ala BD para realizar el Insert.
include ("../Conexion/Conexion.php");

//var_dump($_POST);
//die();

//Se declaran variables del Formulario.
$Usuario="";
$Estatus="";
$Date="";
//Con el Foreach se extraen los datos del POST.
foreach($_POST as $clave=>$valor){
	
			$Usuario=$_POST['usuario'];
			$Estatus=$_POST['estatus'];
			$Date=$_POST['fecha'];
		}
//Se realiza Query de inserccion en la BD en la tabla gestiontickets.

$Query = "INSERT INTO gestiontickets(GtUsuario, GtEstatus, GtFechaCreacion) VALUES ('$Usuario','$Estatus','$Date')";

$result= mysqli_query($conn, $Query);

	if (!empty($result)){

		$_SESSION['message'] = 'Ticket Creado';
		$_SESSION['message:type'] = 'success';

		header("Location:../Admin/Frm_Tickets.php");
	}
?>