<?php
$offer = OfferController::lastIdOffer(null);
if (!isset($_SESSION['validation'])) {
    echo '<script> window.location = "?pagesUser=loginUser"</script> ';
    return;
} else {
    if ($_SESSION['validation'] != "ok") {
        echo '<script> window.location = "?pagesUser=loginUser"</script> ';
        return;
    }
}
if ($_SESSION['user']['Correo'] == $offer['email'] ) {
    echo '<script> window.location = "?pagesArticles=viewArticle&page=1"</script> ';
    return;
}

//var_dump($offer);
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                    <span>Citación</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->

<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card w-100 m-auto bg-warning">
                <div class="group-input col-lg-6">
                    <h1 class="text-white text-center">Nombre Anuncio:<?php echo $offer['Nombre'] ?><br></h1>
                </div>
                <div>
                    <h1 class="text-white text-center">Imagen: <img src="/Canjea/assets/img/Articles/<?php echo $offer['img'] ?>" alt=" " width="150"><br></h1>
                </div>
                <div>
                    <h1 class="text-white text-center">Descripción:<?php echo $offer['Descripcion'] ?><br></h1>
                </div>
                <div>
                    <h1 class="text-white text-center">Cantidad:<?php echo $offer['Cantidad'] ?><br></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="register-form card w-100 m-auto mx-3">
        <div class="card-header container bg-dark">
            <h2 class="text-white">Citación</h2>
        </div>
        <div class="card-body w-100">
            <form action="#" method="POST" class="needs-validation" novalidate>
                <?php
                if (isset($_POST['Lugar'])) {
                    $answer = citationController::registerCitation($_POST);
                    if ($answer == "ok") {
                        citationController::sendCitation($_POST, $offer['email'], $_SESSION['user']['Correo'], $_SESSION['user']['Nombre']);
                        echo '<script>
                                    if(window.history.replaceState){

                                        window.history.replaceState(null,null,window.location.href);
                                    }
                                    </script>';
                        echo '<div class="alert alert-success">La citacion  ha sido registrada</div>';
                    } else {
                        echo "No se pudo realizar el registro";
                    }
                }
                ?>
                <div class="row">
                    <div class="card-body">
                        <input type="hidden" name="Id_oferta" value="<?php echo $offer[0] ?>">
                        <div class="group-input col-lg-12">
                            <label for="username">Lugar*</label>
                            <input type="text" id="username" name="Lugar" required>
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                        <div class="row">
                            <div class="group-input col-lg-6">
                                <label for="con-pass">Fecha Citación*</label>
                                <input type="date" id="con-pass" name="Fecha_citacion" required>
                                <div class="invalid-feedback">El campo esta vacio</div>
                                <div class="valid-feedback">valido</div>
                            </div>
                            <div class="group-input col-lg-6">
                                <label for="con-pass">Hora de Citación *</label>
                                <input type="time" id="con-pass" name="Hora" required>
                                <div class="invalid-feedback">El campo esta vacio</div>
                                <div class="valid-feedback">valido</div>
                            </div>
                        </div>
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                        <label class="form-check-label" for="defaultCheck1">
                            Aceptar <a href="#">Términos y condiciones</a>
                        </label>
                        <div class="invalid-feedback">El campo esta vacio</div>
                        <div class="valid-feedback">valido</div>
                        <div class="group-input col-lg-8"> </div>
                        <div class="group-input col-lg-4">
                        <button type="submit" class="site-btn register-btn">Registrar Citación</button>
                        </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<div class="row my-5"></div>
</div>
<!-- Register Form Section End -->