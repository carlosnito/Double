<?php include ("../Conexion/Conexion.php")?>
<?php include ("../Includes/Header.php")?>
	
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<!--Se configura mensaje de validacion del Ticket Creado-->
			<?php if(isset($_SESSION['message'])){?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<?= $_SESSION['message']?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  						</button>
				</div>
			<?php session_unset(); } ?>

			<div class="card card-body">
				<!--Se crea formulario de Creacion de Ticket y se envia por metodo POST-->
				<form action="../Lib/CrearTicket.php" method="POST">
					<div class="form-group">
						<label>Digite Nombre de Usuario</label>
						<input type="text" name="usuario" class="form-control" placeholder="Digite Nombre Usuario" autofocus="">
					</div>

					<div class="form-group">
  						<label>Estatus</label>
  							<select row=2 class="form-control" id="sel1" name="estatus">
  								<option>-</option>
    							<option>Abierto</option>
    							<option>Cerrado</option>
   							</select>
					</div>

					<div class="form-group">
						<label>Fecha de Creacion</label>
						<input type="date" id="fecha" name="fecha" />
					</div>
					<script>
						$( document ).ready(function() {
            				$('#fecha').datepicker();
        				});
					</script>

					<input type="submit" class="btn btn-success btn-block" name="CrearTicket" value="Crear Ticket">

				</form>

			</div>
		</div>	
	</div>
</div>




<?php include ("../Includes/Footer.php")?>




		