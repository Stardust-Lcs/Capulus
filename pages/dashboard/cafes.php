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
                'title' => 'Cafes',
                'breadcrumbs' => [
                  ['url' => baseURL('dashboard/cafes'), 'name' => 'Cafes']
                ]
              ]); ?>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-add">
                Add new cafe
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
              <h3 class="text-white mb-0">Your Cafes</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Address</th>
                    <th scope="col" class="sort" data-sort="budget">Photo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                  if (count($cafes) === 0) { ?>
                    <tr>
                      <td colspan="4">
                        No Cafes
                      </td>
                    </tr>
                    <?php
                  } else {
                    $i = 1;
                    foreach ($cafes as $cafe) { ?>
                      <tr>
                        <td>
                          <?php echo $i++; ?>
                        </td>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm"><?php echo $cafe->name ?></span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm"><?php echo $cafe->address ?></span>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="media align-items-center">
                            <div class="media-body">
                              <img src="<?php echo $cafe->photo ?>" width="100%" />
                            </div>
                          </div>
                        </td>
                        <td class="text-right">
                          <a href="<?php echo baseURL("dashboard/tables?id=$cafe->cafe_id"); ?>">
                            <button type="button" class="btn btn-sm btn-neutral">
                              See Tables
                            </button>
                          </a>
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
              <h6 class="modal-title" id="modal-title-add">Add new cafe</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">

              <form>
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
              </form>

            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>

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
