<?php
 include_once('../php/config.php');
 session_start();
 $idUsuario = $_SESSION['idUsuario'];

$result = mysqli_query($mysqli,"SELECT * FROM Usuarios WHERE id = $idUsuario");

$res = mysqli_fetch_array($result);
?>

<h2 class="sub-header">Editar Perfil</h2>

<form action="../php/usuario.php" method="post" enctype="multipart/form-data">
      <!-- Nombre -->
      <h3>Nombre</h3>
      <input type="text" name="nombre" class="form-control" placeholder="Nombre" <?php echo 'value="',$res['nombre'],'"' ?> required>
      <!-- Apellidos -->
      <h3>Apellidos</h3>
      <input type="text" name="apellidos" class="form-control" placeholder="apellidos"  <?php echo 'value="',$res['apellidos'],'"' ?> required>
      <!--  Dirección -->
      <h3>Dirección</h3>
      <input type="text" name="direccion" class="form-control" placeholder="Dirección"  <?php echo 'value="',$res['direccion'],'"' ?> required>

      <!-- Pais -->
      <h3>País</h3>
      <input type="text" name="pais" class="form-control" placeholder="País" <?php echo 'value="',$res['pais'],'"' ?> required>

       <h3>Email</h3>
      <input type="text" name="email" class="form-control" placeholder="País" <?php echo 'value="',$res['email'],'"' ?> required>

      <!-- Tipo de cambio -->
      <h3>Tipo de cambio</h3>
      <input type="text" name="tipoDeCambio" class="form-control" placeholder="Tipo de cambio"  <?php echo 'value="',$res['tipoDeCambio'],'"' ?> required>

      <!-- Imagen -->
      <h3>Imagen</h3>
      <input type="hidden" name="MAX_FILE_SIZE" value="1024000" class="form-control">
      <input type="file" size="44" name="imagen">

      <!-- Contraseña -->

      <h3>Contraseña</h3>
      <input type="password" name="pass" class="form-control" placeholder="Contraseña"  <?php echo 'value="',$res['pass'],'"' ?> required>
      <input type="hidden" name="op" value="modificar">
      <input type="hidden" name="idUsuario" <?php echo 'value="',$idUsuario,'"' ?> required>
      <br/>

      <div class="text-center">
        <input type="submit" value="Guardar" class="btn btn-success btn-lg text-center">
      </div>
</form>