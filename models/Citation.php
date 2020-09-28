<?php 

require_once 'providers/database.php'; 


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
}