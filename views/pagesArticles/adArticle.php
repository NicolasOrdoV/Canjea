<?php $categories = Categories::showCategories(); ?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                    <span>Publicar anuncio</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<!-- <div class="register-login-section spad"> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="register-form card w-70 m-30">
                    <div class="card-header container text-center bg-dark text-white">
                        <h3><small>Publicar anuncio</small></h3>
                    </div>
                    <div class="card-body w-100">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-images"></i></div>
                                    </div>
                                    <input type="file" name="imgA" class="form-control" required><button class="btn btn-warning text-white">+</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_FILES['imgA'])) {
                            $name_img = $_FILES['imgA']['name'];
                            $type_img = $_FILES['imgA']['type'];
                            $size_img = $_FILES['imgA']['size'];



                            $saveImage = $_SERVER['DOCUMENT_ROOT'] . "/Canjea/assets/img/Articles/";
                            if ($size_img <= 100000000) {
                                if ($type_img == "image/png" || $type_img == "image/jpeg" || $type_img == "image/jpg") {

                                    move_uploaded_file($_FILES['imgA']['tmp_name'], $saveImage . $name_img);
                        ?>
                                    <img src="/Canjea/assets/img/Articles/<?php echo $name_img ?>" class="col-lg-4">
                                <?php
                                } else {
                                ?>
                                    <script>
                                        alert("Solo se permiten archivos tipo png,jpg y jpeg");
                                    </script>
                                <?php
                                }
                            } else {
                                ?>
                                <script>
                                    alert("El archivo no puede ser mayor a 1 mega");
                                </script>
                        <?php
                            }
                        }
                        ?>
                        <form action="#" method="POST" class="needs-validation" novalidate>
                            <div class="row">
                                <input type="hidden" name="img" value="<?php echo $name_img ?>">
                                <div class="group-input col-lg-12">
                                    <label for="username">Nombre Anuncio*</label>
                                    <input type="text" id="username" name="Nombre" placeholder="Ingresar titulo del anuncio">
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>

                                <div class="group-input col-lg-12">
                                    <label for="con-pass">Descripción *</label>
                                    <input type="text" class="row-5" id="username" name="Descripcion" placeholder="Ingresar descripción">
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-6">
                                    <label for="con-pass">Cantidad *</label>
                                    <input type="number" id="username" name="Cantidad" placeholder="Ingresar Cantidad">
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-6">
                                    <label for="con-pass">Categoría*</label>
                                    <select id="con-pass" name="Categoria_Id_Categoria" class="form-control">
                                        <option value="">Seleccione..</option>
                                        <?php foreach ($categories as $categorie) { ?>
                                            <option value="<?php echo $categorie['Id_categoria'] ?>"><?php echo $categorie['Nombre_Categoria'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <input type="hidden" name="Usuario_Id_Dueno" value="<?php echo $_SESSION['user']['Id_Usuario'] ?>">
                                <div class="group-input col-lg-9"> </div>
                                <div class="group-input">
                                    <button type="submit" class="site-btn register-btn ">Publicar Anuncio</button>
                                </div>
                            </div>
                    </div>
                    <?php
                    if (isset($_POST['Nombre'])) {
                        $answer = ArticleController::registerArticle($_POST);
                        if ($answer == "ok") {
                            echo '<script>
                                    window.location = "index.php?pagesArticles=viewArticle&page=1";
                                    </script>';
                        }
                    }
                    ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="row my-5"></div>
    </div>
<!-- </div> -->
</div>
<!-- Register Form Section End -->