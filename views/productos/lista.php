<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');
?>
      <div class="content">
        <div class="container-fluid">

          <!-- your content here -->

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
                                  <th>Categoría</th>
                                  <th>Precio</th>
                                  <th>Stock</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Pepsi</td>
                                  <td>Refrescos</td>
                                  <td>10</td>
                                  <td>50</td>
                              </tr>
                              <tr>
                                  <td>Coca-cola</td>
                                  <td>Refrescos</td>
                                  <td>10</td>
                                  <td>100</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- End content -->
          </div>
        </div>

<?php
include('../../layout/footer.php');
?>