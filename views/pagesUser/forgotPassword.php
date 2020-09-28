<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Inicio</a>
                    <span>Recuperar Contraseña</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- <div class="row"> -->
    <!-- <div class="col-lg-6 offset-lg-3"> -->
    <div class="login-form card w-100">
        <div class="card-header container text-center bg-dark text-white">
            <h3>Recuperar Contraseña</h3>
        </div>
        <div class="card-body w-100">
            <form action="#" method="post" class="needs-validation" novalidate>
                <?php
                $email = new UserController();
                $email->sendPassword($_POST);
                echo '<script>
                if(window.history.replaceState){

                    window.history.replaceState(null,null,window.location.href);
                }
                </script>';
                echo '<div class="alert alert-success">Se ha enviado el link de la recuperacion de contraseña , de la cuenta.</div>';
                ?>
                <div class="group-input">
                    <label for="username">Correo *</label>
                    <input type="email" id="username" name="Correo" value="<?php echo isset($_POST['Correo']) ? $_POST['Correo'] : ''; ?>" placeholder="Ingresar correo" required>
                </div>
                <div class="row">
                    <div class="col-lg-9"></div>
                    <div class="col-lg-3">
                        <button type="submit" class="site-btn">Enviar Correo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->
    <div class="row my-5"></div>
</div>