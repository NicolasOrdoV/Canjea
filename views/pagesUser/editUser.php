<?php
if (!isset($_SESSION['validation'])) {
    echo '<script> window.location = "?pagesUser=loginUser"</script> ';
    return;
} else {
    if ($_SESSION['validation'] != "ok") {
        echo '<script> window.location = "?pagesUser=loginUser"</script> ';
        return;
    }
}
if (isset($_GET['id'])) {
    $item = "Id_Usuario";
    $value = $_GET['id'];
    $user = UserController::findUser($item, $value);
}
$streets = Streets::ctrSelectStreets();
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Inicio</a>
                    <span>Editar Usuario</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="register-form card m-auto ">
                    <div class="card-header container bg-dark text-center text-white ">
                        <h1><small>Editar</small></h1>
                    </div>
                    <div class="card-body ">
                        <form action="#" method="POST" class="needs-validation" novalidate>
                            <?php
                            if (isset($_POST['Nombre'])) {
                                $answer = UserController::editUser();
                                if ($answer == "ok") {
                                    echo '<script>
                                    window.location="index.php?pagesUser=profileUser&id=' . $_SESSION['user']['Id_Usuario'] . '";
                                    </script>';
                                }
                            }
                            ?>
                            <input type="hidden" name="Id_Usuario" value="<?php echo $user['Id_Usuario'] ?>">
                            <div class="row">
                                <div class="group-input col-lg-6">
                                    <label for="username">Nombre*</label>
                                    <input type="text" id="username" name="Nombre" value="<?php echo $user['Nombre'] ?>" required>
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-6 ">
                                    <label for="pass">Apellido*</label>
                                    <input type="text" id="pass" name="Apellido" value="<?php echo $user['Apellido'] ?>" required>
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-12">
                                    <label for="con-pass">Correo *</label>
                                    <input type="email" id="con-pass" name="Correo" value="<?php echo $user['Correo'] ?>" required>
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-6">
                                    <label for="con-pass">Direccion *</label>
                                    <input type="text" id="con-pass" name="Direccion" value="<?php echo $user['Direccion'] ?>" required>
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-6">
                                    <label for="con-pass">Fecha Nacimiento*</label>
                                    <input type="date" id="con-pass" name="FechaNacimiento" value="<?php echo $user['FechaNacimiento'] ?>" required>
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-6">
                                    <label for="con-pass">Celular*</label>
                                    <input type="number" id="con-pass" name="Celular" value="<?php echo $user['Celular'] ?>" required>
                                    <div class="invalid-feedback">El campo esta vacio</div>
                                    <div class="valid-feedback">valido</div>
                                </div>
                                <div class="group-input col-lg-6">
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
                                <div class="group-input col-lg-9"> </div>
                                <div class="group-input col-lg-3 ">
                                    <button type="submit" class="site-btn register-btn  ">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Register Form Section End -->