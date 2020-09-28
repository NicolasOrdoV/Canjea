<?php 

require_once '../../providers/database.php';

class Article {

    static public function save($table , $dates)
    {
        try{
           $stmt = Conexion::conectar()->prepare("INSERT INTO $table(Nombre, img, Descripcion, Cantidad, Categoria_Id_Categoria, Usuario_Id_Dueno, Estado) VALUES 
            (:Nombre, :img, :Descripcion, :Cantidad, :Categoria_Id_Categoria, :Usuario_Id_Dueno, :Estado) ");

            $stmt->bindParam(':Nombre',$dates['Nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':img',$dates['img'],PDO::PARAM_STR);
            $stmt->bindParam(':Descripcion',$dates['Descripcion'],PDO::PARAM_STR);
            $stmt->bindParam(':Cantidad',$dates['Cantidad'],PDO::PARAM_INT);
            $stmt->bindParam(':Categoria_Id_Categoria',$dates['Categoria_Id_Categoria'],PDO::PARAM_INT);
            $stmt->bindParam(':Usuario_Id_Dueno',$dates['Usuario_Id_Dueno'],PDO::PARAM_INT);
            $stmt->bindParam(':Estado',$dates['Estado'],PDO::PARAM_STR);

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
 


    
    static public function proveArticles($table,$item,$value){
        try {
            if ($item==null && $value==null) {
                $stmt = Conexion::conectar()->prepare("SELECT a.*,c.Nombre_Categoria ,u.Nombre as user FROM $table a INNER JOIN categoria c ON c.Id_Categoria = a.Categoria_Id_categoria INNER JOIN usuario u on u.Id_Usuario = a.Usuario_Id_Dueno ");
                $stmt->execute();
                return $stmt->fetchAll();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT a.*,c.Nombre_Categoria ,u.Nombre as user,u.Correo as correo FROM $table a INNER JOIN categoria c ON c.Id_Categoria = a.Categoria_Id_categoria INNER JOIN usuario u on u.Id_Usuario = a.Usuario_Id_Dueno  where $item = :$item");
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

    static public function proveArticlesId($table,$item,$value){
        try {

            $stmt = Conexion::conectar()->prepare("SELECT a.*,c.Nombre_Categoria ,u.Nombre as user,u.Correo as correo FROM $table a INNER JOIN categoria c ON c.Id_Categoria = a.Categoria_Id_categoria INNER JOIN usuario u on u.Id_Usuario = a.Usuario_Id_Dueno  where $item = :$item");
            $stmt->bindParam(":".$item,$value,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    static public function findArticle($table,$category){
        try {
                $stmt = Conexion::conectar()->prepare("SELECT a.*,c.Nombre_Categoria  ,u.Nombre as user,u.Correo as correo FROM $table a
                INNER JOIN categoria c ON c.Id_categoria = a.Categoria_Id_categoria 
                INNER JOIN usuario u on u.Id_Usuario = a.Usuario_Id_Dueno
                WHERE c.Nombre_Categoria LIKE '%$category%'");
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
        }
    }

    static public function update($table,$category){
        try {
                $stmt = Conexion::conectar()->prepare("SELECT a.*,c.Nombre_Categoria  ,u.Nombre as user,u.Correo as correo FROM $table a
                INNER JOIN categoria c ON c.Id_categoria = a.Categoria_Id_categoria 
                INNER JOIN usuario u on u.Id_Usuario = a.Usuario_Id_Dueno
                WHERE c.Nombre_Categoria LIKE '%$category%'");
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
        }
    }

    static public function editArticle($table , $dates)
    {
        try{
           $stmt = Conexion::conectar()->prepare("UPDATE $table SET Nombre = :Nombre, img = :img, 
             Descripcion = :Descripcion, Cantidad = :Cantidad, Categoria_Id_Categoria =:Categoria_Id_Categoria, Usuario_Id_Dueno = :Usuario_Id_Dueno, Estado = :Estado WHERE Id_articulo = :Id_articulo" );

            $stmt->bindParam(':Nombre',$dates['Nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':img',$dates['img'],PDO::PARAM_STR);
            $stmt->bindParam(':Descripcion',$dates['Descripcion'],PDO::PARAM_STR);
            $stmt->bindParam(':Cantidad',$dates['Cantidad'],PDO::PARAM_INT);
            $stmt->bindParam(':Categoria_Id_Categoria',$dates['Categoria_Id_Categoria'],PDO::PARAM_INT);
            $stmt->bindParam(':Usuario_Id_Dueno',$dates['Usuario_Id_Dueno'],PDO::PARAM_INT);
            $stmt->bindParam(':Estado',$dates['Estado'],PDO::PARAM_STR);
            $stmt->bindParam(':Id_articulo',$dates['Id_articulo'],PDO::PARAM_INT);

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

    static public function delete($table,$value)
    {
        try {
            $stmt  = Conexion::conectar()->prepare("DELETE FROM $table WHERE Id_articulo = :Id_articulo");

            $stmt->bindParam(":Id_articulo",$value,PDO::PARAM_INT);

            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt = null;
        } catch (PDOException $e) {
            
            die($e->getMessage());
        }
    }


}