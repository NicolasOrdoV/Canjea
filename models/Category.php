<?php

require_once 'providers/database.php';

Class Category 
 {

	static public function listCategories($table)
	{
		try {
			$stmt= Conexion::conectar()->prepare("SELECT * FROM $table WHERE Estado = 'Activo'");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		} catch ( PDOException $e) {
			die($e->getMessage());
		}

	}
}

