<h2 class="sub-header">Transacciones</h2>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>No. de cuenta que envía</th>
      <th>No. de cuenta que recibe</th>
      <th>Fecha</th>
      <th>Cantidad</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        include_once('../php/config.php');
        session_start();
        $idUsuario = $_SESSION['idUsuario'];
        $result = mysqli_query($mysqli,"SELECT * FROM Transacciones as t JOIN Cuentas as c ON t.cuentaEmisora = c.numeroDeCuenta OR t.cuentaRecipiente = c.numeroDeCuenta WHERE c.idUsuario = '$idUsuario' ORDER BY t.fecha");
        $indice = 1;
        while($res = mysqli_fetch_array($result))
        {
          echo "<tr>";
          echo "<td>",$indice,"</td>";
          echo "<td>",$res['cuentaEmisora'],"</td>";
          echo "<td>",$res['cuentaRecipiente'],"</td>";
          echo "<td>",$res['fecha'],"</td>";
          echo "<td>$",$res['cantidad'],"</td>";
          /*echo "<td><a href=\"edit.php?id=",$res['id'],"\">Editar</a> | <a href=\"delete.php?id=",$res['id'],"\" onClick=\"return confirm ('Estas seguro de borrar')\">Borrar</a></td>";*/
          echo "</tr>";
          $indice++;
        }
      ?>
    </tbody>
  </table>
</div>

<div class="row text-center">
  <a href="#/nuevaTransaccion" class="btn btn-lg btn-warning" role="button">Nueva Transaccion</a>
</div>