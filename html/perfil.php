<?php
	include_once('../php/config.php');
	session_start();

	$idUsuario = $_SESSION['idUsuario'];

	$result = mysqli_query($mysqli,"SELECT * FROM Usuarios WHERE id = $idUsuario");

	$res = mysqli_fetch_array($result);
?>

<h2 class="sub-header">Mi perfil</h2>

<div class="row placeholders">
	<div class="col-md-3 placeholder"></div>
	<div class="col-md-6 placeholder">
	  <?php
	  //echo "<img src='",$res['foto'],"' width='200' height='200' class='img-responsive' alt='Imagen de usuario'>";
	  ?>
	  <h2><?php echo $res['nombre']; ?></h2>
	  <p class="text-muted"><?php echo $res['apellidos']; ?></p>
	</div>
	<div class="col-md-3 placeholder"></div>
</div>

<div class="row text-center">
	<div class="col-md-4">
		<h3>Dirección</h3>
		<p><?php echo $res['direccion']; ?><p>
	</div>
	<div class="col-md-4">
		<h3>País</h3>
		<p><?php echo $res['pais']; ?><p>
	</div>
	<div class="col-md-4">
		<h3>Tipo de cambio</h3>
		<p><?php echo $res['tipoDeCambio']; ?><p>
	</div>
</div>

<br />

<div class="row text-center">
	<a href="#/editarPerfil" class="btn btn-lg btn-warning" role="button">Editar información</a>
</div>