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
<?php global $session; ?>

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
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <?php View::load('templates/dashboard/breadcrumbs', [
                'title' => 'Your Cafe',
                'breadcrumbs' => [
                  ['url' => baseURL('dashboard/your-cafe'), 'name' => 'Your Cafe']
                ]
              ]); ?>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#modal-add">
                Add new table
              </button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-sm-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> <?php echo $cafe->name; ?> </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="<?php echo baseURL("dashboard/tables?id=$cafe->cafe_id") ?>" class="btn btn-sm btn-primary">See Tables</a>
                </div>
              </div>
            </div>
            <div class="card-body">
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
              <form action="<?php echo baseURL('cafe/edit') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="cafe_id" value="<?php echo $cafe->cafe_id ?>">
                <h6 class="heading-small text-muted mb-4">Detail</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-name">Name</label>
                        <input type="text" id="input-name" class="form-control" placeholder="Your New Cafe Name" name="name" value="<?php echo $cafe->name; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input type="text" id="input-address" class="form-control" placeholder="New Address" name="address" value="<?php echo $cafe->address; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-photo">Image</label>
                        <img src="<?php echo $cafe->photo ?>" width="100%">
                        <input type="file" id="input-photo" class="form-control" name="photo">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- <hr class="my-4" /> -->
          <!-- Address -->
          <!-- <h6 class="heading-small text-muted mb-4">Cafe details</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-9">
                <div class="form-group">
                  <label class="form-control-label" for="input-info">Info Cafe</label>
                  <input id="input-info" class="form-control" placeholder="Info" value="(Address, tables, other info)" type="text">
                </div>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="form-group">
                <label class="form-control-label" for="input-description">Description</label>
                <input type="text" id="input-description" class="form-control" placeholder="Description" value="About Cafe">
              </div>
            </div>
            <!-- Avaibility -->
          <!-- <h6 class="heading-small text-muted mb-4">Avaibility & Prices</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-day1">Day</label>
                  <select type="text" id="input-day1" class="form-control" placeholder="Day" value="Day">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                    <option value="Senin-Kamis">Senin-Kamis</option>
                    <option value="Senin-Jum'at">Senin-Jum'at</option>
                    <option value="Senin-Sabtu">Senin-Sabtu</option>
                    <option value="Senin-Minggu">Senin-Minggu</option>
                    <option value="Sabtu-Minggu">Sabtu-Minggu</option>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input_price1">Price</label>
                  <input type="number" id="input_price1" placeholder="Price" value="Price" min="0">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-day2">Day</label>
                  <select type="text" id="input-day2" class="form-control" placeholder="Day" value="Day">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                    <option value="Senin-Kamis">Senin-Kamis</option>
                    <option value="Senin-Jum'at">Senin-Jum'at</option>
                    <option value="Senin-Sabtu">Senin-Sabtu</option>
                    <option value="Senin-Minggu">Senin-Minggu</option>
                    <option value="Sabtu-Minggu">Sabtu-Minggu</option>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input_price2">Price</label>
                  <input type="number" id="input_price2" placeholder="Price" value="Price" min="0">
                </div>
              </div>
            </div>
          </div> -->
          <!-- </div> -->
        </div>
        <!-- <hr class="my-4" /> -->
        <!-- Description -->
        <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
        <div class="pl-lg-4">
          <div class="form-group">
            <label class="form-control-label">About Me</label>
            <textarea rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <?php View::load('templates/dashboard/footer'); ?>
  </div>
  </div>
  <?php View::load('templates/dashboard/script'); ?>
</body>

</html>
