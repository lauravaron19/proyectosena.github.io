<?php 


class Conexion {
	
	public function conectar()	{
		$pdo = new PDO("mysql:dbname=rolesusuarios;host=localhost", 'root', '');
		return $pdo;
	}
}
