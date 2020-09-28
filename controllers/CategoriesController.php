<?php 

require_once 'models/Category.php';
class Categories{

static public function showCategories(){

$table='categoria'; 
$answer = Category::listCategories($table);
return $answer;

}

}
