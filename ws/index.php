<?php

include 'conexion.php';

$pdo = new conexion();

//Metodo que realiza la consulta de todos los registros de la BD
if($_SERVER['REQUEST_METHOD'] == 'GET' ){


	if(isset($_GET['GtId'])){

		$sql = $pdo->prepare("SELECT * FROM gestiontickets WHERE GtId=:GtId");
		$sql->bindValue(':GtId', $_GET['GtId']);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 Ok");
		echo json_encode($sql->fetchAll());
		exit;


	} else {

			$sql = $pdo->prepare("SELECT * FROM gestiontickets");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 Ok");
			echo json_encode($sql->fetchAll());
			exit;
	}
}

//Metodo que realiza el registro de un ticket por ws.
if($_SERVER['REQUEST_METHOD'] == 'POST' ){

	$sql = "INSERT INTO gestiontickets(GtUsuario, GtEstatus, GtFechaCreacion) VALUES (:GtUsuario,:GtEstatus,:GtFechaCreacion)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':GtUsuario', $_POST['GtUsuario']);
	$stmt->bindValue(':GtEstatus', $_POST['GtEstatus']);
	$stmt->bindValue(':GtFechaCreacion', $_POST['GtFechaCreacion']);
	$stmt->execute();
	$IdPost = $pdo->lastinsertid();
	if($IdPost){
		header("HTTP/1.1 200 Ok");
		echo json_encode($IdPost);
		exit;

	}
}


//Metodo que permite Editar un ticket por ws.
if($_SERVER['REQUEST_METHOD'] == 'PUT' ){

	$sql = "UPDATE gestiontickets SET GtUsuario=:GtUsuario, GtEstatus=:GtEstatus, GtFechaCreacion=:GtFechaCreacion WHERE GtId =:GtId";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':GtUsuario', $_GET['GtUsuario']);
	$stmt->bindValue(':GtEstatus', $_GET['GtEstatus']);
	$stmt->bindValue(':GtFechaCreacion', $_GET['GtFechaCreacion']);
	$stmt->bindValue(':GtId', $_GET['GtId']);
	$stmt->execute();
	header("HTTP/1.1 200 Ok");
	exit;
}
//Metodo que borra un registro de la BD mediante ws
if($_SERVER['REQUEST_METHOD'] == 'DELETE' ){

	$sql = "DELETE FROM  gestiontickets WHERE GtId =:GtId";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':GtId', $_GET['GtId']);
	$stmt->execute();
	header("HTTP/1.1 200 Ok");
	exit;
}


?>