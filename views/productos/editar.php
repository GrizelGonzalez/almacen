<?php
include('../../config/connexion.php');
include('../layout/header.php');
include('../layout/sidebar.php');
include('../layout/navbar.php');

$producto_id = $_GET['id'];

$consulta = "SELECT * FROM categoria";
$resultadoCategoria = mysqli_query($connexion, $consulta);

$consulta = "SELECT * FROM producto WHERE id = {$producto_id}";
$resultadoProducto = mysqli_query($connexion, $consulta);
$producto = mysqli_fetch_assoc($resultadoProducto);

$consulta = "SELECT * FROM tienda";
$resultadotienda = mysqli_query($connexion, $consulta);

$consulta = "SELECT tienda_id FROM producto_has_tienda WHERE producto_id = {$producto_id}";
$resultadoProductoTiendas = mysqli_query($connexion, $consulta);
$tiendaIds = array_merge(...mysqli_fetch_all($resultadoProductoTiendas));

?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
              <i class="material-icons">edit</i>
            </div>
          </div>
          <div class="card-body">
            <h3>Editar un producto</h3>
            <form action="../../requests/productos/update.php" method="POST" id="form">
              <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nombre">Nombre:</label>
                  <input class="form-control" type="text" id="nombre" name="nombre"
                         value="<?php echo $producto['nombre'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="descripcion">Descripción:</label>
                  <input class="form-control" type="text" id="descripcion" name="descripcion"
                         value="<?php echo $producto['descripcion'] ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="categoria">Categoría</label>
                  <select class="form-control" id="categoria" name="categoria" required>
                    <option value="">Selecciona una categoría...</option>
                      <?php
                      while ($categoria = mysqli_fetch_assoc($resultadoCategoria)) {
                          if ($categoria['id'] == $producto['categoria_id']) {
                              echo "<option value='{$categoria['id']}' selected>{$categoria['nombre']}</option>";
                          } else {
                              echo "<option value='{$categoria['id']}'>{$categoria['nombre']}</option>";
                          }
                      }
                      ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="precio">Precio:</label>
                  <input class="form-control" type="text" id="precio" name="precio"
                         value="<?php echo $producto['precio'] ?>" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="stock">Stock:</label>
                  <input class="form-control" type="number" id="stock" name="stock" placeholder="stock"
                         value="<?php echo $producto['stock'] ?>" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
              <i class="material-icons">border_color</i>
            </div>
          </div>
          <div class="card-body">
            <h3>Asociar Sucursales</h3>
            <form action="../../requests/productos/attach.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
              <div class="form-check">
                <label for="sucursales">Sucursales:</label><br>
                  <?php while ($tienda = mysqli_fetch_assoc($resultadotienda)) { ?>
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="sucursales" name="sucursales[]"
                             value="<?php echo $tienda['id'] ?>"
                          <?php if (!empty($tiendaIds) && in_array($tienda['id'], $tiendaIds)) echo "checked"; ?>
                      >
                        <?php echo $tienda['nombre'] ?>
                      <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    </label><br><br>
                  <?php } ?>
              </div>
              <button type="submit" class="btn btn-primary">Asociar</button>
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
<script src="../../public/validations/productos/form-validation.js"></script>