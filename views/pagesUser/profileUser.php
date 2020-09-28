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
} ?>


<div class="breacrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text">
					<a href="#"><i class="fa fa-home"></i> Inicio</a>
					<span>Perfil Usuario</span>
				</div>
			</div>
		</div>
	</div>
</div>


<main class="container">
	<div class="card w-100 m-auto">
		<div class="card-header container  bg-dark text-white text-center">
			<h2 class="m-auto nav-menu mobile-menu">Perfil del usuario</h2>
		</div>
		<div class="card-body">
			<div>
				<a href="?pagesUser=editUser&id=<?php echo $user['Id_Usuario'] ?>" class="primary-btn float-right">Editar usuario</a>
			</div>
			<div class="form-group">
				<label> Nombre Usuario: <h1><?php echo $user['Nombre'] ?></h1> </label>
			</div>
			<div class="form-group">
				<label> Apellido Usuario </label>
				<h1><?php echo $user['Apellido'] ?></h1>
			</div>
			<div class="form-group">
				<label> Correo: </label>
				<h1><?php echo $user['Correo'] ?></h1>
			</div>
			<div class="form-group">
				<label> Direccion: </label>
				<h1><?php echo $user['Direccion'] ?></h1>
			</div>
			<div class="form-group">
				<label> FechaNacimiento: </label>
				<h1><?php echo $user['FechaNacimiento'] ?></h1>
			</div>
			<div class="form-group">
				<label> Celular: </label>
				<h1>
					<?php echo $user['Celular'] ?></h1>
			</div>
			<div class="form-group">
				<label> Barrio: </label>
				<h1><?php echo $user['street'] ?></h1>
				
					<a href="index.php?pagesUser=updatePassword&id=<?php echo $_SESSION['user']['Id_Usuario'] ?>" class="primary-btn float-right">Editar Contraseña</a>
				
			</div>
		</div>
	</div>
	<section class="mt-5"></section>
</main>