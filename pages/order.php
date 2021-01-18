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
  <?php View::load('templates/dashboard/meta') ?>
</head>

<body>
  <?php
  $dateFormat = date_create($date);
  $stringDate = '';
  if ($dateFormat) {
    $stringDate = $dateFormat->format('D, d M Y');
  } ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Your Order</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row mt--5">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-upgrade">
            <div class="card-header text-center border-bottom-0">
              <h4 class="card-title"><?= $cafe->name ?></h4>
              <p class="card-category">
                <?= $cafe->address ?>
              </p>
            </div>
            <div class="card-body">
              <div class="table-responsive table-upgrade">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th class="text-center">qty</th>
                      <th class="text-center">&times;</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= $table->table_name ?></td>
                      <td class="text-center"><?= $quantity ?></td>
                      <td class="text-center">&times;</td>
                      <td class="text-center">Rp<?= $table->price ?></td>
                      <td class="text-center">Rp<?= $table->price * $quantity ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center">Total</td>
                      <td class="text-center">Rp<?= $table->price * $quantity ?></td>
                    </tr>
                    <tr>
                      <td class="text-center"><?= $stringDate ?></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center">
                        <a href="<?= baseURL() ?>" class="btn btn-round btn-default">Cancel</a>
                      </td>
                      <td class="text-center">
                        <form action="<?= baseURL('order/confirm') ?>" method="post">
                          <input type="hidden" name="cafe_id" value="<?= $cafe_id ?>">
                          <input type="hidden" name="table" value="<?= $table_id ?>">
                          <input type="hidden" name="date" value="<?= $date ?>">
                          <input type="hidden" name="qty" value="<?= $quantity ?>">
                          <button type="submit" class="btn btn-round btn-primary">Confirm Order</button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php View::load('templates/dashboard/script') ?>
</body>

</html>
