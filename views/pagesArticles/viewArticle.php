 <?php
 if(isset($_POST['busqueda'])){
    $category = $_POST['busqueda']; 
    $article = ArticleController::showArticles(null,null);
    $pagination = 9;
    $total = count($article);
    $pages = $total / $pagination;
    $pages = ceil($pages);
    echo $total;
//   var_dump($article);
    if (!$_GET) {
        header('Location:index.php?pagesArticles=viewArticle&page=1');
    }
    if ($_GET['page']>$pages || $_GET['page']<= 0) {
        header('Location:index.php?pagesArticles=viewArticle&page=1');  
    } 
    $init = ($_GET['page']-1) * $pagination;
    $articles = ArticleController::findCategory($category,$init,$pagination);
 }elseif (isset($_GET['busqueda'])  ) {
    $category = $_GET['busqueda']; 
    $article = ArticleController::showArticles(null,null);
    $pagination = 9;
    $total = count($article);
    $pages = $total / $pagination;
    $pages = ceil($pages);
    echo $total;
//   var_dump($article);
    if (!$_GET) {
        header('Location:index.php?pagesArticles=viewArticle&page=1');
    }
    if ($_GET['page']>$pages || $_GET['page']<= 0) {
        header('Location:index.php?pagesArticles=viewArticle&page=1');  
    } 
    $init = ($_GET['page']-1) * $pagination;
    $articles = ArticleController::findCategory($category,$init,$pagination); }
 else{
  $article = ArticleController::showArticles(null,null);
  $pagination = 9;
  $total = count($article);
  $pages = $total / $pagination;
  $pages = ceil($pages);
  echo $total;
//   var_dump($article);
  if (!$_GET) {
      header('Location:index.php?pagesArticles=viewArticle&page=1');
  }
    if ($_GET['page']>$pages || $_GET['page']<= 0) {
        header('Location:index.php?pagesArticles=viewArticle&page=1');  
    } 
     $init = ($_GET['page']-1) * $pagination;
     $articles = ArticleController::pagesArticles($init,$pagination);
    //  var_dump($articles);
 }  
 $categories = Categories::showCategories();
 
 ?>
 
 
 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i>Inicio</a>
                        <span>Anuncios</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <!-- <section class="product-shop spad"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                <form action="?pagesArticles=viewArticle&page=1" method="POST"> 
                    <div class="form-group row">
                        <div class="col-6">
                            <select name="busqueda" class="form-control">
                            <option value="">Seleccione</option>
                            <?php foreach ($categories as $categorie) { ?>
                                    <option value="<?php echo $categorie['Nombre_Categoria']?>"><?php echo $categorie['Nombre_Categoria']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning">Buscar</button>
                        </div>
                    </div>
                </form>
                    <div class="product-list">
                        <div class="row">
                            <?php foreach ($articles as $article) { ?>
                                <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="/Canjea/assets/img/Articles/<?php echo $article['img'] ?>" alt="">
                                        <div class="sale pp-sale">Rebaja</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="quick-view"><a href="?pagesArticles=detailArticle&id=<?php echo $article['Id_articulo'] ?>">Ver Mas</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php echo $article['Nombre_Categoria']?>  </div>
                                        <a href="#">
                                            <h5><?php echo $article['Nombre'] ?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?php echo $article['user'] ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php  } ?>
                        </div>
                    </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $_GET['page'] <= 1 ? 'disabled' : ''; ?>"><a class="page-link" href="index.php?pagesArticles=viewArticle&page=<?php echo $_GET['page']-1; ?>">Anterior</a></li>
                                <?php for ($i=0; $i < $pages ; $i++) { ?>
                                    <li class="page-item <?php echo $_GET['page'] == $i+1 ? 'active' : ''; ?>"><a class="page-link" href="index.php?pagesArticles=viewArticle&page=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>    
                               <?php  }  ?>
                                
                                <li class="page-item <?php echo $_GET['page'] >= $pages ? 'disabled' : ''; ?>"><a class="page-link" href="index.php?pagesArticles=viewArticle&page=<?php echo $_GET['page']+1; ?>">Siguiente</a></li>
                            </ul>
                        </nav>
                </div>
            </div>
        </div>
        <div class="row my-5"></div>
    <!-- </section> -->
    <!-- Product Shop Section End -->