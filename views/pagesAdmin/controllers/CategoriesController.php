<?php 

require_once 'models/Category.php';
class Categories{

static public function showCategories(){

$table='categoria'; 
$answer = Category::listCategories($table);
return $answer;

}

  public function updateStatusInactive(){

        if (isset($_POST['Id_categoria'])) {
             $table = 'categoria';
             $value = $_POST['Id_categoria'];
             $answer = Category::statusInactive($table,$value);
            if ($answer == "ok") {
                echo '<script> setTimeout(function(){
                    window.location = "template.php?pagesAdmin=listCategory";
                }, 1000 ) </script>';
            }
        }
    }

    public function updateStatusActive(){

        if (isset($_POST['Id_categoria1'])) {
             $table = 'categoria';
             $value = $_POST['Id_categoria1'];
             $answer = Category::statusActive($table,$value);
            if ($answer == "ok") {
                echo '<script> setTimeout(function(){
                    window.location = "template.php?pagesAdmin=listCategory";
                }, 1000 ) </script>';
            }
        }
    }



}
