<?php 

require_once '../../providers/database.php'; 


class citation {

    static public function saveCitation($table,$dates){

        try{
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table(Id_oferta, Lugar, Fecha_citacion,
             Hora, Estado_citacion) VALUES 
             (:Id_oferta, :Lugar, :Fecha_citacion,:Hora, :Estado_citacion) ");
 
             $stmt->bindParam(':Id_oferta',$dates['Id_oferta'],PDO::PARAM_INT);
             $stmt->bindParam(':Lugar',$dates['Lugar'],PDO::PARAM_STR);
             $stmt->bindParam(':Fecha_citacion',$dates['Fecha_citacion'],PDO::PARAM_STR);
             $stmt->bindParam(':Hora',$dates['Hora'],PDO::PARAM_STR);
             $stmt->bindParam(':Estado_citacion',$dates['Estado_citacion'],PDO::PARAM_STR);
             if($stmt->execute())
             {
                return "ok";
             }else{
                 return Conexion::conectar()->errorInfo();
             }
             
             $stmt->close();
             $stmt = null;
 
         }catch(PDOException $e)
         {
             die($e->getMessage());
         }


    }


     static public function showCitation($table){
         $table = 'citacion';

         $stmt = Conexion::conectar()->prepare("SELECT * FROM $table ");

         $stmt->execute();

         return $stmt->fetchAll();

         $stmt->close();

         $stmt = null;
     }


     static public function showCitationFive($table){
        $table = 'citacion';

        $stmt = Conexion::conectar()->prepare("SELECT c.*,o.Correo as correo FROM $table c INNER JOIN oferta o ON o.Id_oferta = c.Id_oferta LIMIT 5");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}