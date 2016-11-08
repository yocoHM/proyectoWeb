<!--Ver como si hay un error pasa algo si nohay error entonces redirige -->
<?php
  include_once('config.php');
  session_start();
  $_SESSION['logged'] = 0;

  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $result = mysqli_query($mysqli,"SELECT id FROM Usuarios WHERE email = '$email' AND pass = '$pass'");

  if ($result->num_rows > 0)
  {
    $res = mysqli_fetch_array($result);
    $idUsuario = $res[0];
    $_SESSION["idUsuario"] = $idUsuario;
    $_SESSION['logged'] = 1;
    echo "<script> window.location.assign('../html/dashboard.html'); </script>";
  }
  else
  {
    echo "Usuario o contraseña incorrectos, por favor registrate";
  }

  ?>