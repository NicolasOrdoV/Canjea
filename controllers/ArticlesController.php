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
                'Categoria_Id_Categoria' => $data['Categoria_Id_Categoria'],
                'Usuario_Id_Dueno' => $data['Usuario_Id_Dueno'],
                'Estado' => 'Activo',
            ];
            $answer = Article::save($table,$dates);
            return $answer;
    }
     
     

    static public function showArticles($item,$value){
           $table='articulo';
           $answer=Article::proveArticles($table,$item,$value);
           return $answer
           ;
    }

    static public function showArticlesId($item,$value){
        $table='articulo';
        $answer=Article::proveArticlesId($table,$item,$value);
        return $answer;
 }
    static public function findCategory($category,$init,$pagination){
        $table='articulo';
        $answer=Article::findArticle($table,$category,$init,$pagination);
        return $answer;


    }

    static public function showArticlesClothes(){
        $table='articulo';
        $answer=Article::proveArticlesClothes($table);
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
               'Categoria_Id_Categoria' => $_POST['Categoria_Id_Categoria'],
               'Usuario_Id_Dueno' => $_POST['Usuario_Id_Dueno'],
               'Estado' => 'Activo',
               'Id_articulo' =>  $_POST['Id_articulo']
           ];
           $answer = Article::editArticle($table,$dates);
           return $answer;

       }
    }

    public function deleteArticle($id)
    {
        if (isset($_POST['Id_articulo'])) {
            $table = 'articulo';
            $value = $_POST['Id_articulo'];
            $answer = Article::delete($table,$value);
            if ($answer == "ok") {
                echo '<script>
                   window.location = "index.php?pagesArticles=listArticles&id='.$id.'";
                </script>';
            }
        }
    }

    

   static public function pagesArticles($init,$pagination){
    $table = "articulo"; 


    $answer = Article::paginationArticles($table,$init,$pagination);

    return $answer;
   }

}