<?php
include('../../config/connexion.php');
include('../layout/header.php');
include('../layout/sidebar.php');
include('../layout/navbar.php');


$categoria_id = $_GET['id'];
$consulta = "SELECT * FROM categoria WHERE id = {$categoria_id}";
$resultadoCategoria =  mysqli_query($connexion, $consulta);
$categoria = mysqli_fetch_assoc($resultadoCategoria);
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
            <h3>Editar una categoría</h3>
            <form action="../../requests/categorias/update.php" method="POST" id="form">
            <input type="hidden" name="id" value="<?php echo $categoria['id'] ?>">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="nombre">Nombre:</label>
                  <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $categoria['nombre'] ?>" required>
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