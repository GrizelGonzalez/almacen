<?php
include('../../config/connexion.php');
include('../layout/header.php');
include('../layout/sidebar.php');
include('../layout/navbar.php');


$ciudad_id = $_GET['id'];
$consultaCiudad = "SELECT * FROM ciudad WHERE id = {$ciudad_id}";
$resultadoCiudad =  mysqli_query($conexion, $consultaCiudad);
$ciudad = mysqli_fetch_assoc($resultadoCiudad);
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" style="margin: 0 auto;">
        <div class="card">
          <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
              <i class="material-icons">edit</i>
            </div>
          </div>
          <div class="card-body">
            <h3>Editar una ciudad</h3>
            <form action="../../requests/ciudad/update.php" method="POST" id="form">
            <input type="hidden" name="id" value="<?php echo $ciudad['id'] ?>">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="nombre">Nombre:</label>
                  <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $ciudad['nombre'] ?>" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('../layout/footer.php');
?>
<script src="../../public/validations/categorias/form-validation.js"></script>