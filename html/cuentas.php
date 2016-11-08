<h2 class="sub-header">Cuentas</h2>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th>No. de cuenta</th>
      <th>Saldo</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        include_once('../php/config.php');
        session_start();
        $idUsuario = $_SESSION['idUsuario'];
        $result = mysqli_query($mysqli,"SELECT * FROM Cuentas WHERE idUsuario = '$idUsuario'");
        $indice = 1;
        while($res = mysqli_fetch_array($result))
        {
          echo "<tr>";
          echo "<td>",$res['numeroDeCuenta'],"</td>";
          echo "<td>$",$res['saldo'],"</td>";
          /*echo "<td><a href=\"edit.php?id=",$res['id'],"\">Editar</a> | <a href=\"delete.php?id=",$res['id'],"\" onClick=\"return confirm ('Estas seguro de borrar')\">Borrar</a></td>";*/
          echo "</tr>";
          $indice++;
        }
      ?>
    </tbody>
  </table>
</div>

<div class="row text-center">
  <a href="#/nuevaCuenta" class="btn btn-lg btn-warning" role="button">Nueva Cuenta</a>
</div>