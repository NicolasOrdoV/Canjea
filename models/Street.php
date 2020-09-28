<?php 


require_once 'providers/database.php';

class Street {


    static public function mdlSelectStreets($table)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt=null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}