<?php
error_reporting(0);
session_start();
$categories = Categories::showCategories();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canjea</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style2.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css" type="text/css">
    <script src="assets/js/sweetalert.min.js"></script>
    <script>
        src = "assets/js/showPassword.js" >
    </script>
    <!-- Js Plugins -->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        Hola.Canjeo@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +57 333.465.897
                    </div>
                </div>
                <div class="ht-right ">
                    <?php

                    if (!isset($_SESSION['user'])) { ?>

                        <a href="index.php?pagesUser=loginUser" class="login-panel"><i class="fa fa-user"></i>Iniciar Sesión</a>
                    <?php
                    } else { ?>
                        <ul class="depart-hover">
                            <a href="index.php?pagesUser=logout" class="login-panel">Cerrar sesión</a>

                            <a href="index.php?pagesUser=profileUser&id=<?php echo $_SESSION['user']['Id_Usuario']; ?>" class="login-panel"><i class="fa fa-user"></i><?php echo $_SESSION['user']['Nombre'], $_SESSION['user']['Apellido'] ?></a>
                            <ul>

                </div>
            <?php } ?>
            </div>
        </div>
        </div>
        <?php if ($_SESSION['user']['IdRol'] == null) { ?>
            <div class="container">
                <div class="inner-header">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="assets/img/canjea-largo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">
                                    <Table>Categorías</Table>
                                </button>
                                <form action="?pagesArticles=viewArticle&page=1" method="POST">
                                    <div class="input-group">
                                        <input type="text" placeholder="¿Que Buscas?" name="busqueda" class="form-control">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item">
                    <div class="container justify-content-center text-center">
                        <nav class="nav-menu mobile-menu">
                            <ul class="m-auto justify-content-center text-center">
                                <li class="active"><a href="./index.php">Inicio</a></li>
                                <li><a href="index.php?pagesArticles=viewArticle&page=1">Productos</a></li>
                                <li><a href="?pagesUser=contact">Contactos</a></li>
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>

            <?php } elseif ($_SESSION['user']['IdRol'] == 2) { ?>
                <div class="container">
                    <div class="inner-header">
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="assets/img/canjea-largo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="advanced-search">
                                    <button type="button" class="category-btn">
                                        <Table>Categorías</Table>
                                    </button>
                                    <div class="input-group">
                                        <form action="?pagesArticles=viewArticle&page=1" method="POST">
                                            <div class="input-group">
                                                <input type="text" placeholder="¿Que Buscas?" name="busqueda" class="form-control">
                                                <button type="submit"><i class="ti-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item">
                        <div class="container justify-content-center text-center">
                            <nav class="nav-menu mobile-menu">
                                <ul>
                                    <li class="active"><a href="./index.php">Inicio</a></li>
                                    <li><a href="?pagesArticles=viewArticle&page=1">Productos</a></li>

                                    </li>

                                    <li><a href="?pagesUser=contact">Contactos</a></li>
                                    <li><a href="?pagesArticles=adArticle">Registrar Anuncio</a></li>
                                    <li><a href="?pagesArticles=listArticles&id=<?php echo $_SESSION['user']['Id_Usuario'] ?>">Historial de anuncios</a></li>
                                </ul>
                            </nav>
                            <div id="mobile-menu-wrap"></div>
                        </div>
                    </div>

                <?php } ?>

    </header>
    <!-- Header End -->

    <?php
    if (isset($_GET['pagesUser'])) {
        if (
            $_GET["pagesUser"] == "loginUser" ||
            $_GET["pagesUser"] == "logout" ||
            $_GET["pagesUser"] == "forgotPassword" ||
            $_GET["pagesUser"] == "editPassword" ||
            $_GET["pagesUser"] == "profileUser" ||
            $_GET["pagesUser"] == "editUser" ||
            $_GET["pagesUser"] == "registerUser" ||
            $_GET["pagesUser"] == "contact" ||
            $_GET["pagesUser"] == "updatePassword"
        ) {
            include 'views/pagesUser/' . $_GET['pagesUser'] . '.php'; //link
        } else {
            include 'views/error404.php';
        }
    } elseif (isset($_GET['pagesAdmin'])) {
        if (
            $_GET["pagesAdmin"] == "masterAdmin" ||
            $_GET["pagesAdmin"] == "listUser"
        ) {
            include 'views/pagesAdmin/' . $_GET['pagesAdmin'] . '.php'; //link
        } else {
            include 'views/error404.php';
        }
    } elseif (isset($_GET['pagesArticles'])) {
        if (
            $_GET["pagesArticles"] == "adArticle" ||
            $_GET["pagesArticles"] == "viewArticle" ||
            $_GET["pagesArticles"] == "detailArticle" ||
            $_GET["pagesArticles"] == "listArticles" ||
            $_GET["pagesArticles"] == "editArticle"
        ) {
            include 'views/pagesArticles/' . $_GET['pagesArticles'] . '.php'; //link
        } else {
            include 'views/error404.php';
        }
    } elseif (isset($_GET['pagesCitation'])) {
        if ($_GET["pagesCitation"] == "registerCitation") {
            include 'views/pagesCitation/' . $_GET['pagesCitation'] . '.php'; //link
        } else {
            include 'views/error404.php';
        }
    } else {
        include 'views/Home.php';
    }


    ?>

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.php"><img src="assets/img/canjea-largo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Bogota , Colombia Carrera 5 Avenida 89</li>
                            <li>Telefono : 400577575775</li>
                            <li>Email: CanjeoWEb57@gmail.com</li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Informacion</h5>
                        <ul>
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#">Contacto</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Producto</h5>
                        <ul>
                            <li><a href="#">Productos</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> Todos los derechos reservados <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank"></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.zoom.min.js"></script>
    <script src="assets/js/jquery.dd.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>