<!doctype html>
        <head>
        </head>
        <body>
                <?php
                        include_once('config.php');

                        if ($_POST['op'] == "insertar")
                        {
                          $nombre = $_POST['nombre'];
                          $apellidos = $_POST['apellidos'];
                          $direccion = $_POST['direccion'];
                          $pais = $_POST['pais'];
                          $tipoDeCambio = $_POST['tipoDeCambio'];
                          $pass = $_POST['pass'];
                          $imagen = $_POST['imagen'];
                          $email = $_POST['email'];

                          $error = false;

                          if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0)
                          {
                            $tmpName = $_FILES['imagen']['tmp_name'];
                            
                            //leer el archivo en forma de stream
                            $fp = fopen($tmpName, 'r');
                            $datos = fread($fp, filesize($tmpName));
                            $datos = addslashes($datos);
                            fclose($fp);
                            
                          }
                          else
                          {
                            $error = true;
                          }

                          if(empty($nombre)||empty($apellidos)||empty($direccion)||empty($pais)||empty($tipoDeCambio)||empty($pass)||empty($email)||$error)
                          {
                                  if (empty($nombre))
                                  {
                                          printf("Falta el nombre");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($apellidos))
                                  {
                                          printf("Faltan los apellidos");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($direccion))
                                  {
                                          printf("Falta la direccion");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($pais))
                                  {
                                          printf("Falta el pais");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($tipoDeCambio))
                                  {
                                          printf("Falta el tipo de cambio");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($pass))
                                  {
                                          printf("Falta la contraseña");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($email))
                                  {
                                          printf("Falta el correo");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if ($error)
                                  {
                                          print("Falta la imagen de perfil");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                          }
                          else
                          {
                                  $result = mysqli_query($mysqli,"INSERT INTO Usuarios (nombre,apellidos,direccion,pais,tipoDeCambio,pass,foto,email) VALUES ('$nombre','$apellidos','$direccion','$pais','$tipoDeCambio','$pass','$datos','$email')");
                                  session_start();
                                  $result2 = mysqli_query($mysqli,"SELECT id FROM Usuarios WHERE email = '$email'");
                                  $res = mysqli_fetch_array($result2);
                                  $idUsuario = $res[0];
                                  $_SESSION["idUsuario"] = $idUsuario;
                                  echo "<script> window.location.assign('../html/dashboard.html'); </script>";
                          }
                        }
                        else if ($_POST['op'] == "modificar")
                        {
                          $nombre = $_POST['nombre'];
                          $apellidos = $_POST['apellidos'];
                          $direccion = $_POST['direccion'];
                          $pais = $_POST['pais'];
                          $tipoDeCambio = $_POST['tipoDeCambio'];
                          $pass = $_POST['pass'];
                          $imagen = $_POST['imagen'];
                          $email = $_POST['email'];
                          $idUsuario = $_POST['idUsuario'];

                          if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0)
                          {
                            $tmpName = $_FILES['imagen']['tmp_name'];
                            
                            //leer el archivo en forma de stream
                            $fp = fopen($tmpName, 'r');
                            $datos = fread($fp, filesize($tmpName));
                            $datos = addslashes($datos);
                            fclose($fp);
                            $result = mysqli_query($mysqli,"UPDATE Usuarios SET nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', pais = '$pais', tipoDeCambio = '$tipoDeCambio', pass = '$pass', email = '$email', foto = '$datos' WHERE id = $idUsuario ");
                            echo "<script> window.location.assign('../html/dashboard.html'); </script>";
                          }
                          else
                          {
                            $result = mysqli_query($mysqli,"UPDATE Usuarios SET nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', pais = '$pais', tipoDeCambio = '$tipoDeCambio', pass = '$pass', email = '$email' WHERE id = $idUsuario ");
                            echo "<script> window.location.assign('../html/dashboard.html'); </script>";
                          }
                        }
                ?>
        </body>
</html>
 </body>
</html>
