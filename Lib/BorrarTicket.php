<?php 
include ("../Conexion/Conexion.php");

//var_dump($_GET);

//se realiza validacion sobre el metodo GET con el if.
if(isset($_GET['id'])){
    //se procede a realizar el Query de Borrado de Registros.
	$id=$_GET['id'];
	$Query = "DELETE FROM gestiontickets WHERE GtId=$id";
	$Result = mysqli_query($conn, $Query);

		if(!$Result){
			die("Fallo el Borrado de Datos");
		}
    //se configura mensaje de confirmacion de registro borrado.
	$_SESSION['message'] = 'Ticket Borrado';
	$_SESSION['message:type'] = 'danger';

	header("Location:../Admin/Frm_TableTicket.php");
}

?>