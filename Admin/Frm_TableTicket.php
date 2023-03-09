<?php include ("../Conexion/Conexion.php")?>
<?php include ("../Includes/Header.php")?>
	
<div class="col-md-6 mx-auto">
	<!--Se configura mensaje de validacion del Ticket Creado-->
	<?php if(isset($_SESSION['message'])){?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<?= $_SESSION['message']?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
	</div>
	<?php session_unset(); } ?>
	//se crea la tabla detalle.
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Estatus</th>
				<th>Fecha Creacion</th>
				<th>Fecha Actualizacion</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$Query = "SELECT * FROM gestiontickets";
			$Result = mysqli_query($conn, $Query);

			while($row = mysqli_fetch_array($Result)){ ?>
				<tr>
					<td><?php echo $row['GtUsuario'] ?></td>
					<td><?php echo $row['GtEstatus'] ?></td>
					<td><?php echo $row['GtFechaCreacion'] ?></td>
					<td><?php echo $row['GtFechaActualizacion'] ?></td>
					<td>
						<a href="../Lib/EditarTicket.php?id=<?php echo $row['GtId'] ?>" class="btn btn-info">
						<i class="fa fa-check-square-o"></i></a>

						<a href="../Lib/BorrarTicket.php?id=<?php echo $row['GtId']?>"class="btn btn-danger"><i class="fa fa-trash"></i></a>

					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include ("../Includes/Footer.php")?>
