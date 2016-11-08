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
                          $cuentaEmisora = $_POST['cuentaEmisora'];
                          $cuentaRecipiente = $_POST['cuentaRecipiente'];
                          $idUsuario = $_SESSION["idUsuario"];

                          if(empty($cantidad)||empty($cuentaEmisora)||empty($cuentaRecipiente))
                          {
                                  if (empty($cantidad))
                                  {
                                          printf("Falta la cantidad");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($cuentaEmisoras))
                                  {
                                          printf("Faltan la cuenta emisora");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                                  else if (empty($cuentaRecipiente))
                                  {
                                          printf("Falta la cuenta receptora");
                                          echo "<br><a href='javascript:self.history.back();'>Regresar</a>";
                                  }
                          }
                          else
                          {
                                  $saldo = mysqli_query($mysqli,"SELECT saldo FROM Cuentas WHERE numeroDeCuenta = $cuentaEmisora");
                                  $saldoActual = mysqli_fetch_array($saldo);
                                  echo $saldoActual['cantidad'];
                                  if ($cantidad <= $saldoActual[0])
                                  {
                                    $prueba = mysqli_query($mysqli,"SELECT * FROM Cuentas WHERE numeroDeCuenta = $cuentaRecipiente");
                                    if ($prueba->num_rows > 0)
                                    {
                                      $result = mysqli_query($mysqli,"INSERT INTO Transacciones (cantidad,cuentaEmisora,cuentaRecipiente) VALUES ('$cantidad','$cuentaEmisora','$cuentaRecipiente')");
                                      $result2 = mysqli_query($mysqli,"UPDATE Cuentas SET saldo=saldo+'$cantidad' where numeroDeCuenta = '$cuentaRecipiente'");
                                      $result3 = mysqli_query($mysqli,"UPDATE Cuentas SET saldo=saldo-'$cantidad' where numeroDeCuenta = '$cuentaEmisora'");
                                      echo "Transacción realizada exitosamente";
                                      echo "<script> window.location.assign('../html/dashboard.html'); </script>";
                                      //echo "<br><a href='index.php'>Regresar</a>";
                                    }
                                    else
                                    {
                                      echo "La cuenta en la que quieres depositar no existe";
                                    }
                                  }
                                  else
                                  {
                                    echo "No cuentas con suficiente saldo para realizar esta transferencia";
                                  }
                          }
                        }
                ?>
        </body>
</html>
