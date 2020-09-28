<?php

require_once 'providers/database.php';


class User
{
    static public function save($table , $dates)
    {
        try{
           $stmt = Conexion::conectar()->prepare("INSERT INTO $table(Nombre, Apellido, Correo,
            Contrasena, Direccion, FechaNacimiento, Genero, Celular, Estado,IdRol, Id_barrio) VALUES 
            (:Nombre, :Apellido, :Correo,
            :Contrasena, :Direccion, :FechaNacimiento, :Genero, :Celular, :Estado, :IdRol, :Id_barrio) ");

            $stmt->bindParam(':Nombre',$dates['Nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':Apellido',$dates['Apellido'],PDO::PARAM_STR);
            $stmt->bindParam(':Correo',$dates['Correo'],PDO::PARAM_STR);
            $stmt->bindParam(':Contrasena',$dates['Contrasena'],PDO::PARAM_STR);
            $stmt->bindParam(':Direccion',$dates['Direccion'],PDO::PARAM_STR);
            $stmt->bindParam(':FechaNacimiento',$dates['FechaNacimiento'],PDO::PARAM_STR);
            $stmt->bindParam(':Genero',$dates['Genero'],PDO::PARAM_STR);
            $stmt->bindParam(':Celular',$dates['Celular'],PDO::PARAM_STR);
            $stmt->bindParam(':Estado',$dates['Estado'],PDO::PARAM_STR);
            $stmt->bindParam(':IdRol',$dates['IdRol'],PDO::PARAM_INT);
            $stmt->bindParam(':Id_barrio',$dates['Id_barrio'],PDO::PARAM_INT);

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



    static public function update($table , $dates)
    {
        try{
           $stmt = Conexion::conectar()->prepare("UPDATE $table SET Nombre = :Nombre, Apellido = :Apellido, 
             Correo = :Correo, Direccion = :Direccion, FechaNacimiento =:FechaNacimiento, Celular = :Celular,  Id_barrio = :Id_barrio  WHERE Id_Usuario = :Id_Usuario" );

            $stmt->bindParam(':Nombre',$dates['Nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':Apellido',$dates['Apellido'],PDO::PARAM_STR);
            $stmt->bindParam(':Correo',$dates['Correo'],PDO::PARAM_STR);
            $stmt->bindParam(':Direccion',$dates['Direccion'],PDO::PARAM_STR);
            $stmt->bindParam(':FechaNacimiento',$dates['FechaNacimiento'],PDO::PARAM_STR);
            $stmt->bindParam(':Celular',$dates['Celular'],PDO::PARAM_STR);
            $stmt->bindParam(':Id_barrio',$dates['Id_barrio'],PDO::PARAM_INT);
            $stmt->bindParam(':Id_Usuario',$dates['Id_Usuario'],PDO::PARAM_INT);

            if($stmt->execute())
            {
               return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            
            $stmt->close();
            $stmt = null;

        }catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }





    static public function showUser($table,$item,$value){
        try {
            if ($item==null && $value==null) {
                $stmt = Conexion::conectar()->prepare("SELECT u.*,r.TipoRol as rol ,b.Nombre_barrio as street FROM $table u INNER JOIN rol r ON r.IdRol = u.IdRol INNER JOIN barrio b on b.Id_barrio = u.Id_barrio ");
                $stmt->execute();
                return $stmt->fetchAll();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT u.*,r.TipoRol as rol ,b.Nombre_barrio as street FROM $table u INNER JOIN rol r ON r.IdRol = u.IdRol INNER JOIN barrio b on b.Id_barrio = u.Id_barrio where $item = :$item");
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

    static public function editPassword($table,$data){
        try {
            $stmt=Conexion::conectar()->prepare("UPDATE $table SET Contrasena = :Contrasena WHERE Id_Usuario=:Id_Usuario");
            $stmt->bindParam(":Contrasena",$data['Contrasena'],PDO::PARAM_STR);
            $stmt->bindParam(":Id_Usuario",$data['Id_Usuario'],PDO::PARAM_INT);
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
            $stmt=Conexion::conectar()->prepare("UPDATE $table SET Estado = 'Inactivo' WHERE Id_Usuario=:Id_Usuario");
            $stmt->bindParam(":Id_Usuario",$value,PDO::PARAM_INT);
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

    static public function statusInactive($table,$value){
        try {
            $stmt=Conexion::conectar()->prepare("UPDATE $table SET Estado = 'Activo' WHERE Id_Usuario=:Id_Usuario");
            $stmt->bindParam(":Id_Usuario",$value,PDO::PARAM_INT);
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