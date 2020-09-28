<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Inicio</a>
                    <span>Iniciar Sesión</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="login-form card w-100">
        <div class="card-header container text-center bg-dark text-white">
            <h3>Iniciar Sesión</h3>
        </div>
        <div class="card-body w-100">
            <form action="#" method="post" class="needs-validation" novalidate>
                <?php
                $session = new UserController();
                $session->login($_POST);
                ?>
                <div class="group-input">
                    <label for="username">Correo *</label>
                    <input type="email" id="username" name="Correo" value="<?php echo isset($_POST['Correo']) ? $_POST['Correo'] : ''; ?>" placeholder="Ingresar Correo" required>
                    <div class="invalid-feedback">El campo esta vacio</div>
                    <div class="valid-feedback">valido</div>
                </div>
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
                </div>
                <div class="group-input gi-check">
                    <div class="gi-more">
                        <!--  <label for="save-pass">
                                        Recordar Contraseña
                                        <input type="checkbox" id="save-pass" required>
                                        <span class="checkmark"></span>
                                        <div class="invalid-feedback">El campo esta vacio</div>
                                        <div class="valid-feedback">valido</div>
                                    </label> -->
                        <a href="?pagesUser=forgotPassword" class="forget-pass">Recuperar Contraseña</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-6">
                        <button type="submit" class="site-btn" >Iniciar Sesión</button>
                    </div>
                </div>
            </form>
            <div class="switch-login">
                <a href="index.php?pagesUser=registerUser" class="or-login">Crear Cuenta</a>
            </div>
        </div>
    </div>
    <div class="row my-5"></div>
</div>