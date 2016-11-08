<!doctype html>
        <head>
        </head>
        <body>
                <?php
                        session_start();
                        include_once('config.php');
                        if($_POST['op']=="insertar")
                        {
                          $cantidad = $_POST['cantidad'];
                          $idUsuario = $_SESSION['idUsuario'];
                          $alias = $_POST['alias'];

                          if(empty($cantidad)||empty($alias))
                          {
                                  if (empty($cantidad))
                                  {
                                          printf("Falta ingresar la cantidad inicial de la cuenta");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($alias))
                                  {
                                          printf("Falta ingresar el alias de la cuenta");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";                                  
                                  }
                          }
                          else
                          {
                                  $result = mysqli_query($mysqli,"INSERT INTO Cuentas (saldo,idUsuario,alias) VALUES ('$cantidad','$idUsuario','$alias')");
                                  echo "Cuenta creada exitosamente";
                                  echo "<script> window.location.assign('../html/dashboard.html'); </script>";
                          }
                        }
                        else if($_POST['op']=="mostar")
                        {
                          $idUsuario = $_SESSION['idUsuario'];
                          $result = mysqli_query($mysqli,"SELECT * FROM Cuentas WHERE idUsuario = '$idUsuario'");
                        }
                ?>
        </body>
</html>
