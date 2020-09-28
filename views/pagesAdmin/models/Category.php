<?php

require_once '../../providers/database.php';

Class Category 
 {

	static public function listCategories($table)
	{
		try {
			$stmt= Conexion::conectar()->prepare("SELECT * FROM $table");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		} catch ( PDOException $e) {
			die($e->getMessage());
		}

	}

	static public function statusInactive($table,$value){
        try {
            $stmt=Conexion::conectar()->prepare("UPDATE $table SET Estado = 'Inactivo' WHERE Id_categoria=:Id_categoria");
            $stmt->bindParam(":Id_categoria",$value,PDO::PARAM_INT);
            if ($stmt -> execute()) {
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }      
            $stmt -> close();
            $stmt = null;      
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

	}
	

	static public function statusActive($table,$value){
        try {
            $stmt=Conexion::conectar()->prepare("UPDATE $table SET Estado = 'Activo' WHERE Id_categoria=:Id_categoria");
            $stmt->bindParam(":Id_categoria",$value,PDO::PARAM_INT);
            if ($stmt -> execute()) {
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }      
            $stmt -> close();
            $stmt = null;      
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}

