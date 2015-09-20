<?php
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php include ("ewconfig.php") ?>
<?php include ("db.php") ?>
<?php include ("advsecu.php") ?>
<?php include ("phpfn.php") ?>
<?php
if (!IsLoggedIn()) {
  ob_end_clean();
  header("Location: login.php");
  exit();
}
$_SESSION["ultimo_menu_activo"] = "";
LoadUserLevel();
if (IsSysAdmin()) {
  $ewCurSec = 31;
}

// Open connection to the database
$conn = database_connect(HOST, USER, PASS, DB, PORT);

?>
<?php include ("header.php") ?>
<h1>Sistema Bancario</h1>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span> Gestión del Sistema</h3>
  </div>
  <div class="panel-body" align = "center">
    <div role="tabpanel">
      <div class="container">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#cliente">Cliente <img src="assets/images/cliente.png" style="height:25px !important; margin-top:-5px;" alt="cliente" title="clientes" ></span></a></li>
    <li><a data-toggle="pill" href="#cuenta">Cuentas</a></li>
    <li><a data-toggle="pill" href="#deposito">Depositos</a></li>
    <li><a data-toggle="pill" href="#retiro">Retiros</a></li>
  </ul>

  <div class="tab-content">
    <div id="cliente" class="tab-pane fade in active">
      <table width = "800">
          <br><br>
          <tr >
            <td>Crear Cliente</td>
            <td style="width:600px !important;"><a href="clienteadd.php?cmd=resetall" role="button" class="btn btn-success">
              <span class="glyphicon glyphicon-plus"></span></a>
            </td>
          </tr>
          <tr>
            <td>Bloquear Cliente</td>
            <td style="width:600px !important;"><a href="facturalist.php?cmd=resetall" role="button" class="btn btn-success">
              <span class="glyphicon glyphicon-ban-circle"></span></a>
            </td>
          </tr>
          <tr>
            <td>Modificar Cliente</td>
            <td style="width:600px !important;"><a href="facturalist.php?cmd=resetall" role="button" class="btn btn-success">
              <span class="glyphicon glyphicon-list-alt"></span></a>
            </td>
          </tr>
          <tr>
            <td>Eliminar Cliente</td>
            <td style="width:600px !important;"><a href="facturalist.php?cmd=resetall" role="button" class="btn btn-danger">
              <span class="glyphicon glyphicon-remove-sign"></span></a>
            </td>
          </tr>
      </table>
    </div>
    <div id="cuenta" class="tab-pane fade">
      <table width = "800">
          <br><br>
          <tr>
            <td>Crear Cuenta</td>
            <td style="width:600px !important;"><a href="facturalist.php?cmd=resetall" role="button" class="btn btn-success">
              <span class="glyphicon glyphicon-plus"></span></a>
            </td>
          </tr>
          <tr>
            <td>Bloquear Cuenta</td>
            <td style="width:600px !important;"><a href="facturalist.php?cmd=resetall" role="button" class="btn btn-success">
              <span class="glyphicon glyphicon-ban-circle"></span></a>
            </td>
          </tr>
          <tr>
            <td>Modificar Cuenta</td>
            <td style="width:600px !important;"><a href="facturalist.php?cmd=resetall" role="button" class="btn btn-success">
              <span class="glyphicon glyphicon-list-alt"></span></a>
            </td>
          </tr>
          <tr>
            <td>Eliminar Cuenta</td>
            <td style="width:600px !important;"><a href="facturalist.php?cmd=resetall" role="button" class="btn btn-danger">
              <span class="glyphicon glyphicon-remove-sign"></span></a>
            </td>
          </tr>
       </table>
    </div>
    <div id="deposito" class="tab-pane fade">
      <h3>Depositos</h3>
      <p>Depositos a cuentas</p>
    </div>
    <div id="retiro" class="tab-pane fade">
      <h3>Retiros</h3>
      <p>Retiros de cuentas</p>
    </div>
  </div>
</div>

    </div>
  </div>
</div>

<div id="cargando" class="hidden"><img src="assets/images/cargando.gif" border="0" ></div>
<?php include ("footer.php") ?>
<?php
// Close connection
database_close($conn);
?>