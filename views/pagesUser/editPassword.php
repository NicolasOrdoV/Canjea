<?php if (isset($_GET['id'])) {
    $item = "Id_Usuario";
    $value = $_GET['id'];
    $user = UserController::findUser($item, $value);
} ?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                    <span>Cambiar Contraseña</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="register-login-section spad">
    <div class="container">
        <div class="login-form card w-100">
            <div class="card-header container text-center bg-dark text-white">
                <h3>Cambiar Contraseña</h3>
            </div>
            <div class="card-body w-100">
                <form action="#" method="post" class="needs-validation" novalidate>
                    <input type="hidden" name="Id_Usuario" value="<?php echo $user['Id_Usuario'] ?>">
                    <div class="group-input col-lg-12 row">
                        <div class="col-12 row">
                            <div class="col-6">
                                <label for="con-pass">Contraseña *</label>
                                <input type="password" class="form-control pwd" id="viewPassword" name="Contrasena" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="Recuerde que su contraseña debe tener minimo 8 caracteres con mayuscula,miniscula,numero" minlength="8" maxlength="15" required value="<?php echo isset($_POST['Contrasena']) ? $_POST['Contrasena'] : ''; ?>" placeholder="Ingresar  Contraseña">
                            </div>
                            <div class="col-6 my-4">
                                <button id="show_password" class="btn   btn-warning btn-sm" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"> </span></button>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function mostrarPassword() {
                                var cambio = document.getElementById("viewPassword");
                                if (cambio.type == "password") {
                                    cambio.type = "text";
                                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                                } else {
                                    cambio.type = "password";
                                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                                }
                            }
                        </script>
                        <div class="col-12 row">
                            <div class="col-6">
                                <label for="con-pass">Confirmar Contraseña *</label>
                                <input type="password" class="form-control pwd" id="viewPasswordC" name="ContrasenaC" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="Recuerde que su contraseña debe tener minimo 8 caracteres con mayuscula,miniscula,numero" minlength="8" maxlength="15" required value="<?php echo isset($_POST['ContrasenaC']) ? $_POST['ContrasenaC'] : ''; ?>" placeholder="Confirmar Contraseña">
                            </div>
                            <div class="col-6 my-4">
                                <button id="show_password" class="btn   btn-warning btn-sm" type="button" onclick="mostrarPasswordC()"> <span class="fa fa-eye-slash icon"> </span></button>
                            </div>
                        </div>
                        <div class="invalid-feedback">Recuerde que la contraseña debe tener 8 caracteres con mayuscula,miniscula,numero</div>
                        <div class="valid-feedback">Valido</div>
                        <script type="text/javascript">
                            function mostrarPasswordC() {
                                var cambio = document.getElementById("viewPasswordC");
                                if (cambio.type == "password") {
                                    cambio.type = "text";
                                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                                } else {
                                    cambio.type = "password";
                                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                                }
                            }
                        </script>
                    </div>
            </div>
            <?php
            if (isset($_POST['Contrasena'])) {
                $password = $_POST['Contrasena'];
                $passwordC = $_POST['ContrasenaC'];

                if ($password == $passwordC) {

                    $answer = UserController::updatePassword();
                    if ($answer == "ok") {
                        echo '<script>
                                        if(window.history.replaceState){
    
                                            window.history.replaceState(null,null,window.location.href);
                                        }
                                        </script>';
                        echo '<div class="alert alert-success">La contaseña ha sido cambiada puede volver a iniciar Sesion</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Los campos no coinciden </div>';
                }
            }
            ?>
            <button type="submit" class="site-btn login-btn">Actualizar Contraseña</button>
            </form>
        </div>

    </div>
</div>