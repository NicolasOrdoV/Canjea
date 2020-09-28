<?php 

require_once 'models/Article.php';

class ArticleController {

    static public function registerArticle($data)
    {
            $table = 'articulo';
            $dates = [
                'Nombre' => $data['Nombre'],
                'img' => $data['img'],
                'Descripcion' => $data['Descripcion'],
                'Cantidad' => $data['Cantidad'],
                'Categoria_Id_categoria' => $data['Categoria_Id_categoria'],
                'Usuario_Id_Dueno' => $data['Usuario_Id_Dueno'],
                'Estado' => 'Activo',
            ];
            $answer = Article::save($table,$dates);
            return $answer;
    }
     
    static public function showArticles($item,$value){
           $table='articulo';
           $answer=Article::proveArticles($table,$item,$value,);
           return $answer;
    }

    static public function showArticlesId($item,$value){
        $table='articulo';
        $answer=Article::proveArticlesId($table,$item,$value,);
        return $answer;
 }
    static public function findCategory($category){
        $table='articulo';
        $answer=Article::findArticle($table,$category);
        return $answer;


    }

    static public function updateArticle(){
        if(isset($_POST['Id_articulo'])){
            $table = 'articulo';
            $dates = [
               'Nombre' => $_POST['Nombre'],
               'img' => $_POST['img'],
               'Descripcion' => $_POST['Descripcion'],
               'Cantidad' => $_POST['Cantidad'],
               'Categoria_Id_categoria' => $_POST['Categoria_Id_categoria'],
               'Usuario_Id_Dueno' => $_POST['Usuario_Id_Dueno'],
               'Estado' => 'Activo',
               'Id_articulo' =>  $_POST['Id_articulo']
           ];
           $answer = Article::editArticle($table,$dates);
           return $answer;

       }
    }

    public function deleteArticle()
    {
        if (isset($_POST['Id_articulo'])) {
            $table = 'articulo';
            $value = $_POST['Id_articulo'];
            $answer = Article::delete($table,$value);
            if ($answer == "ok") {
                echo '<script>
                   window.location = "index.php?pagesArticles=listArticles";
                </script>';
            }
        }
    }

}