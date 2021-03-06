<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <?php View::load('templates/dashboard/meta'); ?>
</head>

<body>
  <?php View::load('templates/dashboard/sidenav'); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <?php View::load('templates/dashboard/navbar', [
      'username' => $username
    ]) ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <?php View::load('templates/dashboard/breadcrumbs', [
                'title' => 'Tables',
                'breadcrumbs' => [
                  ['url' => baseURL('dashboard/tables'), 'name' => 'Tables']
                ]
              ]); ?>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-add">
                Add new table
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Dark table -->
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <?php
              if ($alert || $success) { ?>
                <div class="alert alert-<?php echo $alert ? 'warning' : 'success'; ?> alert-dismissible fade show" role="alert">
                  <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
                  <span class="alert-text"><?php echo $alert ? $alert : $success; ?></span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php
              } ?>
              <h3 class="text-white mb-0"><?php echo $cafeName; ?> tables</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="status">Price</th>
                    <th scope="col" class="sort" data-sort="status">Total Table</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                  if (count($tables) === 0) { ?>
                    <tr>
                      <td colspan="4">
                        No tables
                      </td>
                    </tr>
                    <?php
                  } else {
                    $i = 1;
                    foreach ($tables as $table) { ?>
                      <tr>
                        <td>
                          <?php echo $i++; ?>
                        </td>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm"><?php echo $table->table_name ?></span>
                            </div>
                          </div>
                        </th>
                        <td>
                          Rp<?php echo $table->price ?>
                        </td>
                        <td>
                          <?php echo $table->total_table ?>
                        </td>
                        <td class="text-right">
                          <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-default">
                            Edit
                          </button>
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-notification">
                            Delete
                          </button>
                        </td>
                      </tr>
                  <?php
                    }
                  } ?>
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer bg-transparent py-4">
              <!-- <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav> -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-add">Add new table</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="<?php echo baseURL("table/add"); ?>" method="POST">
              <div class="modal-body">

                <input type="hidden" name="cafe_id" value="<?php echo $cafeId; ?>">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-table-name">Table Name</label>
                        <input type="text" name="table_name" id="input-table-name" class="form-control" placeholder="VIP Table">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-table-price">Table Price</label>
                        <input type="number" name="price" id="input-table-price" class="form-control" placeholder="200000">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-table-count">Total Table</label>
                        <input type="number" min="1" id="input-table-count" name="total_table" class="form-control" placeholder="How many of this table?">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Delete?</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">

              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <p>Are you sure?</p>
              </div>

            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-white">Yes</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">No</button>
            </div>

          </div>
        </div>
      </div>
      <?php View::load('templates/dashboard/footer'); ?>
    </div>
  </div>
  <?php View::load('templates/dashboard/script'); ?>
</body>

</html>
