<?php 
$articlesClothes=ArticleController::showArticlesClothes();
?>


<!-- Hero Section Begin -->
<section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="assets/img/Fondo.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                        <h1 class="text-dark">INTERCAMBIAR</h1>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="index.php?pagesArticles=viewArticle&page=1" class="primary-btn">INTERCAMBIAR AHORA</a>
                        </div>
                    </div>
                   <!--  <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div> -->
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets/img/Fondo-Trueque.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1 class="text-dark">INTERCAMBIAR</h1>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="index.php?pagesArticles=viewArticle&page=1" class="primary-btn">INTERCAMBIAR AHORA</a>
                        </div>
                    </div>
                   <!--  <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
 
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <a href="?pagesArticles=viewArticle&page=1&busqueda=Juguetes">
                        <img src="assets/img/Jugueteria.jpg" alt="">
                        <div class="inner-text">
                            <h4>Juguetes</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                    <a href="?pagesArticles=viewArticle&page=1&busqueda=Herramientas" >
                        <img src="assets/img/Herramientas.jpg" alt="" >
                        <div class="inner-text">
                            <h4>Herramientas</h4>
                        </div>
                    </a>    
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                    <a href="?pagesArticles=viewArticle&page=1&busqueda=Ropa">
                        <img src="assets/img/RopaUsada.jpg" alt="">
                        <div class="inner-text">
                            <h4>Ropa</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                    <a href="?pagesArticles=viewArticle&page=1&busqueda=Antiguedades">
                        <img src="assets/img/Antiguedades.jpg" alt="">
                        <div class="inner-text">
                            <h4>Antigüedades</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                    <a href="?pagesArticles=viewArticle&page=1&busqueda=Libros">
                        <img src="assets/img/Libros.jpg" alt="">
                        <div class="inner-text">
                            <h4>Libros</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                    <a href="?pagesArticles=viewArticle&page=1&busqueda=Aparatos_Electronicos">
                        <img src="assets/img/AparatosElectronicos.jpg" alt="">
                        <div class="inner-text">
                            <h4>Aparatos Electronicos</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Ropa</li>
                            
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php foreach ($articlesClothes as $articlesClothe) {?>
                            
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/Canjea/assets/img/Articles/<?php echo $articlesClothe['img'] ?>" alt="">
                                    <div class="sale">Rebaja</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="quick-view"><a href="#">Ver Mas</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name"><?php $articlesClothe['Nombre_Categoria'] ?></div>
                                    <a href="#">
                                        <h5><?php echo $articlesClothe['Nombre'] ?></h5>
                                    </a>
                                    <div class="product-price">
                                    <?php echo $articlesClothe['user'] ?>
                                    </div>
                                </div>
                            </div>
                       <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="assets/img/Ropa-categoria2.jpg">
                        <h2>Ropa</h2>
                    </div>
                </div>
            </div>
        </div>
 </section>
    <!-- Man Banner Section End -->