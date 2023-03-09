<?php 
include ("../Conexion/Conexion.php");

//var_dump($_GET);

if(isset($_GET['id'])){

	$id=$_GET['id'];
	$Query = "SELECT * FROM gestiontickets WHERE GtId=$id";
	$Result = mysqli_query($conn, $Query);
	//var_dump($Query);

	if(mysqli_num_rows($Result) == 1){
        	$row = mysqli_fetch_array($Result);
        	$Usuario=$row["GtUsuario"];
        	$Estatus=$row["GtEstatus"];
        	$FechaCreacion=$row["GtFechaCreacion"];
        	$Usuario=$row["GtFechaActualizacion"];
    }
}

//Metodo para Actualizar en la BD
if (isset($_POST['ActualizarTicket'])){
	$id = $_GET['id'];
	$Usuario = $_POST['usuario'];
	$Estatus = $_POST['estatus'];
	$FechaCreacion = $_POST['fecha'];
	$FechaActualizacion = date('Y-m-d');

	$Query = "UPDATE gestiontickets set GtUsuario = '$Usuario', GtEstatus = '$Estatus', GtFechaCreacion = '$FechaCreacion', GtFechaActualizacion = '$FechaActualizacion' WHERE GtId='$id'";

	mysqli_query($conn, $Query);
    //se configura mensaje de confirmacion de registro borrado.
	$_SESSION['message'] = 'Ticket Modificado';
	$_SESSION['message:type'] = 'success';
	header("Location:../Admin/Frm_TableTicket.php");
}

?>
<!--se crea el formulario de edicion de Tickets-->
<?php include("../Includes/Header.php"); ?>
	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="../Lib/EditarTicket.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<div class="form-group">
							<input type="text" name="usuario" value = "<?php echo $row["GtUsuario"] ?>" class="form-control" placeholder="Actualice Nombre Usuario">
						</div>

						<div class="form-group">
  							<label>Estatus</label>
  								<select rows="2" value = "<?php echo $row["GtEstatus"] ?>" class="form-control" id="sel1" name="estatus">
  									<option>-</option>
    								<option>Abierto</option>
    								<option>Cerrado</option>
   								</select>
						</div>

						<div class="form-group">
							<label>Fecha de Creacion</label>
								<input type="date" id="fecha" name="fecha" value = "<?php echo $FechaCreacion; ?>" class="form-control" />
						</div>
						<script>
							$( document ).ready(function() {
            					$('#fecha').datepicker();
        					});
						</script>

						<input type="submit" class="btn btn-success btn-block" name="ActualizarTicket" value="ActualizarTicket">

					</form>
				</div>

			</div>

		</div>

	</div>

<?php include("../Includes/Footer.php"); ?>
