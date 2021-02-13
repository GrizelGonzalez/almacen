<?php
session_start();
if (isset($_SESSION['response'])) {
  if (strpos($_SESSION['response'], "success") !== false) {
    $message = explode(',', $_SESSION['response']);
    echo "
    <script type='text/javascript'>
      window.onload = function() {
        toast('$message[0]', '$message[1]');
      };
    </script>
    ";
  }
}
session_destroy();
include('../../config/connexion.php');
include('../layout/header.php');
include('../layout/sidebar.php');
include('../layout/navbar.php');

$consulta = "SELECT * FROM ciudad";
$ciudades = $connexion->query($consulta);
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
              <i class="material-icons">list</i>
            </div>
          </div>
          <div class="card-body">
            <h3>Lista de ciudades</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th cellpadding="3"></th>
                  <th cellpadding="3"></th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($ciudades as $ciudad) {
                  echo "
                        <tr>
                          <td>{$ciudad['nombre']}</td>
                          <td></td>
                          <td></td>
                          <td>
                            <a class='btn btn-info' href='editar.php?id={$ciudad['id']}'>editar</a> 
                            <a class='btn btn-danger text-white' type='button' onclick='confirmDelete(\"../../requests/ciudad/delete.php?id={$ciudad['id']}\")'>eliminar</a>
                          </td>
                        </tr>
                        ";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('../layout/footer.php');
?>