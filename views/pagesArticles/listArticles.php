<?php

if (isset($_GET['id'])) {
    $item = 'Id_Usuario';
    $value = $_GET['id'];
    $articles = ArticleController::showArticlesId($item, $value);
}


?>


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i>Inicio</a>
                    <span>Artículos</span>
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
            <div class="product-list">
                <table class="table table-striped table-hover" id="myTable">
                    <thead class="thead-dark">
                        <th scope="col">Artículos</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Acciones</th>
                    </thead>
                    <tbody>
                        <?php if ($articles == "") { ?>
                            <p> No hay Anuncios existentes </p>
                        <?php  }  ?>
                        <?php foreach ($articles as $article) { ?>
                            <tr>
                                <td><?php echo $article['Nombre'] ?></td>
                                <td> <img src="/Canjea/assets/img/Articles/<?php echo $article['img'] ?>" alt="" width="100"></td>
                                <td><?php echo $article['Descripcion'] ?></td>
                                <td><?php echo $article['Cantidad'] ?></td>
                                <td><?php echo $article['Nombre_Categoria'] ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="?pagesArticles=editArticle&id=<?php echo $article['Id_articulo'] ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="col-6">
                                            <form action="#" method="POST">
                                                <input type="hidden" name="Id_articulo" value="<?php echo $article['Id_articulo'] ?>">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                <?php
                                                $delete = new ArticleController();
                                                $delete->deleteArticle($_SESSION['user']['Id_Usuario']);
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row my-5"></div>
</div>
<!-- </section> -->
<!-- Product Shop Section End -->