<?php 
//Hace las consultas y trae datos
require_once 'controllers/HomeController.php';//Muestra la plantilla de la pagina
require_once 'controllers/UserController.php';//Muestra
require_once 'controllers/ArticlesController.php';
require_once 'controllers/CategoriesController.php';
require_once 'controllers/StreetsController.php';
require_once 'controllers/OfferController.php';
require_once 'controllers/CitationController.php';
require_once 'models/User.php';
require_once 'models/Street.php';
require_once 'models/Article.php';
require_once 'models/Category.php';
require_once 'models/Offer.php';
require_once 'models/Citation.php';


 
//Muestra pagina la principal
$home = new HomeController();
$home->index();




   

