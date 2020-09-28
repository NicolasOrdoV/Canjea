<?php $streets = Streets::ctrSelectStreets(); ?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Inicio</a>
                    <span>Registrar</span>
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
        <div class="register-form card m-auto">
            <div class="card-header container bg-dark text-center text-white ">
                <h1><small>Registrar</small></h1>
            </div>
            <div class="card-body ">
                <form action="#" method="POST" class="needs-validation" novalidate>
                    <?php
                    if (isset($_POST['Nombre'])) {
                        $item = 'Correo';
                        $value = $_POST['Correo'];
                        $answers = UserController::findUser($item, $value);
                        if ($answers['Correo'] == $_POST['Correo'])
                            echo '<div class="alert alert-danger">Correo ya existe, por favor ingrese otro correo </div>';
                        else {
                            $password = $_POST['Contrasena'];
                            $passwordC = $_POST['ContrasenaC'];

                            if ($password == $passwordC) {
                                $answer = UserController::registerUser($_POST);
                                if ($answer == "ok") {
                                    UserController::sendEmail($_POST);
                                }
                                if ($answer == "error") {

                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Formato incorrecto</strong>Ingresa tus datos en el formato correcto.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger">Contraseña no coinciden </div>';
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="group-input col-lg-6">
                            <label for="username">Nombre*</label>
                            <input type="text" id="username" name="Nombre" required value="<?php echo isset($_POST['Nombre']) ? $_POST['Nombre'] : ''; ?>" placeholder="Ingresar Nombre">
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                        <div class="group-input col-lg-6">
                            <label for="pass">Apellido*</label>
                            <input type="text" id="pass" name="Apellido" required value="<?php echo isset($_POST['Apellido']) ? $_POST['Apellido'] : ''; ?>" placeholder="Ingresar Apellido">
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                        <div class="group-input col-lg-12">
                            <label for="con-pass">Correo *</label>
                            <input type="email" id="con-pass" name="Correo" required value="<?php echo isset($_POST['Correo']) ? $_POST['Correo'] : ''; ?>" placeholder="ejemplo@gmail.com ">
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                        <div class="group-input col-lg-12 row">
                            <div class="col-6 row">
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
                            <div class="col-6 row">
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
                    <div class="row">
                        <div class="group-input col-lg-6">
                            <label for="con-pass">Dirección *</label>
                            <input type="text" id="con-pass" name="Direccion" required value="<?php echo isset($_POST['Direccion']) ? $_POST['Direccion'] : ''; ?>" placeholder="Ingresar Dirección">
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                        <div class="group-input col-lg-6">
                            <label for="con-pass">Fecha Nacimiento *</label>
                            <input type="date" id="con-pass" name="FechaNacimiento" required value="<?php echo isset($_POST['FechaNacimiento']) ? $_POST['FechaNacimiento'] : ''; ?>">
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="group-input col-lg-6">
                            <label for="con-pass">Genero *</label>
                            <select id="con-pass" name="Genero" class="form-control" required value="<?php echo isset($_POST['Genero']) ? $_POST['Genero'] : ''; ?>">
                                <option value="">Seleccione..</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                        <div class="group-input col-lg-6">
                            <label for="con-pass">Celular*</label>
                            <input type="number" id="con-pass" name="Celular" required value="<?php echo isset($_POST['Celular']) ? $_POST['Celular'] : ''; ?>" min='111111' max='9999999999' placeholder="Recuerda que el celular es maximo de 10 numeros">
                            <div class="invalid-feedback">El campo esta vacio</div>
                            <div class="valid-feedback">valido</div>
                        </div>
                    </div>
                    <div class="group-input col-lg-12">
                        <label for="con-pass">Barrio*</label>
                        <input list="Barrios" id="con-pass" placeholder="Busca tu barrio" name="Id_barrio" required>
                        <datalist id="Barrios">
                            <?php foreach ($streets as $street) { ?>
                                <option><?php echo $street['Id_barrio'] . '.';
                                        echo $street['Nombre_barrio']; ?></option>
                            <?php } ?>
                        </datalist>
                        <div class="invalid-feedback">El campo esta vacio</div>
                        <div class="valid-feedback">valido</div>
                    </div>
                    <div class="form-group m-auto">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                        <label class="form-check-label" for="defaultCheck1">
                            Aceptar <a href="#">Términos y condiciones</a>
                        </label>
                        <div class="invalid-feedback">El campo esta vacio</div>
                        <div class="valid-feedback">valido</div>
                    </div>
                    <div class="group-input col-lg-12 row my-3">
                        <div class="group-input col-lg-9"></div>
                        <div class="group-input col-lg-3">
                            <button type="submit" class="site-btn register-btn ">Registrarse</button>
                        </div>
                        <!-- <div class="group-input col-lg-4"></div> -->
                    </div>
                    <div class="group-input col-lg-12 row">
                        <div class="group-input col-lg-9"></div>
                        <div class="group-input col-lg-3">
                            <div class="switch-login">
                                <a href="index.php?pagesUser=loginUser" class="or-login">Ya tienes Cuenta</a>
                            </div>
                        </div>
                        <!-- <div class="group-input col-lg-4"> </div> -->
                    </div>
            </div>
            </form>
        </div>
    </div>
    <div class="row my-5"></div>
</div>
<!-- </div> -->
</div>
<!-- Register Form Section End -->