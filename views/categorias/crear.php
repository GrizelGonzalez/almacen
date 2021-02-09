<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');

?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" style="margin: 0 auto;">
        <div class="card">
          <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
              <i class="material-icons">add</i>
            </div>
          </div>
          <div class="card-body">
            <h3>Guardar una nueva categoria</h3>
            <form action="../../requests/categorias/insert.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="nombre">Nombre:</label>
                  <input class="form-control" type="text" name="nombre">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('../../layout/footer.php');
?>