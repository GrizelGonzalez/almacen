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

$consulta = "SELECT p.*, c.nombre as categoria FROM producto p INNER JOIN categoria c ON p.categoria_id = c.id;";
$productos = $connexion->query($consulta);
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
            <h3>Lista de productos</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Categoría</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($productos as $producto) {
                  echo "
                        <tr>
                          <td>{$producto['nombre']}</td>
                          <td>{$producto['descripcion']}</td>
                          <td>{$producto['categoria']}</td>
                          <td>{$producto['precio']}</td>
                          <td>{$producto['stock']}</td>
                          <td>
                            <a class='btn btn-info' href='editar.php?id={$producto['id']}'>editar</a> 
                            <a class='btn btn-danger text-white' type='button' onclick='confirmDelete(\"../../requests/productos/delete.php?id={$producto['id']}\")'>eliminar</a>
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