<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                    <span>Contactos</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<!-- <div class="register-login-section spad"> -->
<div class="container">
    <div class="contact-form card w-100">
        <div class="leave-comment">
            <div class="card-header container text-center bg-dark text-white">
                <h3><small>Contactos</small></h3>
            </div>
            <div class="card-body w-100">

                <h4>Deja Tu Comentario</h4>
                <p>Nuestro Personal respondera las inquietudes</p>
                <form action="#" class="comment-form" method="POST">
                    <?php
                    if (isset($_POST['Nombre'])) {
                        UserController::sendEmailContact($_POST);
                        echo '<script> if(window.history.replaceState){
                                             window.history.replaceState(null,null,window.location.href);
                                         } </script>';
                        echo '<div class="alert alert-success"> La sugerencia o queja  se envio correctamente </div> ';
                    } ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Su Nombre" name="Nombre">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Su Correo" name="Correo">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Escriba El Mensaje" name="Mensaje"></textarea>
                        </div>
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            <button type="submit" class="site-btn">Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <div class="row my-5"></div>
</div>
<!-- Register Form Section End -->