<?php 

require_once 'providers/database.php';

class Offer
{
    static public function getOffer($table,$dates){
        try{
            $stmt = Conexion::conectar()->prepare("INSERT INTO $table(Id_Usuario,Correo,Mensaje,Fecha_oferta, Estado, Id_articulo) VALUES 
             (:Id_Usuario,:Correo,:Mensaje,:Fecha_oferta, :Estado, :Id_articulo) ");
 
             $stmt->bindParam(':Id_Usuario',$dates['Id_Usuario'],PDO::PARAM_INT);
             $stmt->bindParam(':Correo',$dates['Correo'],PDO::PARAM_STR);
             $stmt->bindParam(':Mensaje',$dates['Mensaje'],PDO::PARAM_STR);
             $stmt->bindParam(':Fecha_oferta',$dates['Fecha_oferta'],PDO::PARAM_STR);
             $stmt->bindParam(':Estado',$dates['Estado'],PDO::PARAM_STR);
             $stmt->bindParam(':Id_articulo',$dates['Id_articulo'],PDO::PARAM_INT);
             
 
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
   
    static public function showOffer($item,$value,$table){
        try {
            if ($item==null && $value==null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $table ");
                $stmt->execute();
                return $stmt->fetchAll();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT *FROM $table  where $item = :$item");
                $stmt->bindParam(":".$item,$value,PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
            }
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    static public function showOfferFive($table){
        try {
                $stmt = Conexion::conectar()->prepare("SELECT o.*,u.Nombre as nombre FROM $table o INNER JOIN usuario u ON u.Id_Usuario = o.Id_Usuario LIMIT 5");
                $stmt->execute();
                return $stmt->fetchAll();
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

    static public function showLastIdOffer($table){
        try {
            $stmt = Conexion::conectar()->prepare("SELECT o.*,a.*,u.Correo as email FROM $table o
            INNER JOIN usuario u on u.Id_Usuario = o.Id_Usuario
            INNER JOIN articulo a on a.Id_articulo = o.Id_articulo
            ORDER BY Id_oferta DESC LIMIT 0, 1 ");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
  
