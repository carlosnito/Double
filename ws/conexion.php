<?php

class Conexion extends PDO{

	private $Host = 'localhost';
	private $NombreBd = 'tickets';
	private $UsuarioBd = 'root';
	private $PwBd = '1q2w3e4r';

	public function __construct(){

		try{
			parent::__construct('mysql:host=' . $this->Host . ';dbname=' . $this->NombreBd . ';charset=utf8', $this->UsuarioBd, $this->PwBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		} catch(PDOException $e){
			echo 'Error: '.	 $e->getMessage();
			exit;

		}
	}
}

?>
