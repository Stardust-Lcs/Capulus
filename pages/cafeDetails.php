<!DOCTYPE html>
<html lang="en">

<?php
global $session;
$user = $session->get('user'); ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>Cafe</h4>
            <h2><?php echo $cafe->name; ?></h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div>
          <img src="<?php echo $cafe->photo ?>" alt="<?php echo $cafe->name ?>" class="img-fluid wc-image">
        </div>
      </div>

      <div class="col-md-5">
        <div class="sidebar-item recent-posts">
          <div class="sidebar-heading">
            <h2>Info Cafe</h2>
          </div>

          <div class="content">
            <p><b>Address</b> <br><?php echo $cafe->address ?></p>
          </div>
        </div>

        <br>
        <br>

        <div class="sidebar-item recent-posts">
          <div class="sidebar-heading">
            <h2>Contact Details</h2>
          </div>

          <div class="content">
            <p>
              <span>Name</span>
              <br>
              <strong><?php echo $cafe->fullname; ?></strong>
            </p>

            <p>
              <span>Phone</span>
              <br>
              <strong>
                <a href="tel:<?php echo $cafe->phone; ?>"><?php echo $cafe->phone; ?></a>
              </strong>
            </p>

            <p>
              <span>Email</span>

              <br>

              <strong>
                <a href="mailto:<?php echo $cafe->email ?>"><?php echo $cafe->email ?></a>
              </strong>
            </p>
          </div>
        </div>

        <br>

        <div class="main-button">
          <a href="#" data-toggle="modal" data-target="#exampleModal">Order</a>
        </div>

        <br>
      </div>
    </div>
  </div>
</section>

<!-- <div class="section contact-us">
  <div class="container">
    <div class="sidebar-item recent-posts">
      <div class="sidebar-heading">
        <h2>Description</h2>
      </div>

      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia doloremque sit, enim sint odio corporis illum perferendis, unde repellendus aut dolore doloribus minima qui ullam vel possimus magnam ipsa deleniti.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ducimus ab numquam magnam aliquid, odit provident consectetur corporis eius blanditiis alias nulla commodi qui voluptatibus laudantium quaerat tempore possimus esse nam sed accusantium inventore? Sapiente minima dicta sed quia sunt?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum qui, corrupti consequuntur. Officia consectetur error amet debitis esse minus quasi, dicta suscipit tempora, natus, vitae voluptatem quae libero. Sunt nulla culpa impedit! Aliquid cupiditate, impedit reiciendis dolores, illo adipisci, omnis dolor distinctio voluptas expedita maxime officiis maiores cumque sequi quaerat culpa blanditiis. Quia tenetur distinctio rem, quibusdam officiis voluptatum neque!</p>
      </div>

      <br>
      <br>
    </div>

    <div class="sidebar-item recent-posts">
      <div class="sidebar-heading">
        <h2>Availability &amp; Prices</h2>
      </div>

      <div class="content">
        <div class="table-responsive">
          <table width="100%" border="5" cellspacing="0" cellpadding="0" class="table">
            <thead>
              <tr>
                <th>Package</th>
                <th>Day</th>
                <th>Hour</th>
                <th>Price</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td></td>
                <td>Senin - Kamis</td>
                <td>09:00 - 19:00</td>
                <td>Rp.12.000</td>
              </tr>

              <tr>
                <td></td>
                <td>Jumat</td>
                <td>09:00 - 20:00</td>
                <td>Rp.13.000</td>
              </tr>

              <tr>
                <td></td>
                <td>Sabtu - Minggu</td>
                <td>09:00 - 22:00</td>
                <td>Rp.15.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <br>
      <br>
    </div>

    <div class="sidebar-item recent-posts">
      <div class="sidebar-heading">
        <h2>Info</h2>
      </div>

      <div class="content">
        <ul class="list-group list-group-no-border">
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-2 col-sm-3">
                <p class="pjVpProductPolicyTitle">
                  <strong>Check-in</strong>
                </p>
              </div>
              <div class="col-md-10 col-sm-9">
                <p>
                  Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum.
                </p>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-md-2 col-sm-3">
                <p>
                  <strong>Check-out</strong>
                </p>
              </div>

              <div class="col-md-10 col-sm-9">
                <p>
                  Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum.
                </p>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-md-2 col-sm-3">
                <p>
                  <strong>Pets</strong>
                </p>
              </div>
              <div class="col-md-10 col-sm-9">
                <p>
                  Not allowed
                </p>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-md-2 col-sm-3">
                <p>
                  <strong>Policies</strong>
                </p>
              </div>
              <div class="col-md-10 col-sm-9">
                <div>
                  <p>
                    Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum. <br>
                    Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum. <br>
                  </p>
                </div>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-md-2 col-sm-3">
                <p>
                  <strong>Fees</strong>
                </p>
              </div>

              <div class="col-md-10 col-sm-9">
                <div>
                  <p>
                    Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum. <br>
                    Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum. <br>
                  </p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <br>
    <br>

    <div class="sidebar-item recent-posts">
      <div class="sidebar-heading">
        <h2>Map</h2>
      </div>

      <div class="content">
        <img src="assets/images/map.jpg" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="contact-us">
          <div class="contact-form">
            <form method="POST" action="<?= baseURL('order') ?>" id="order">
              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" value="<?= $user->username; ?>" id="paymentname" readonly></input>
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" value="<?= $user->email; ?>" id="paymentemail" readonly></input>
                  </fieldset>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" value="<?= $user->phone; ?>" id="paymentnumber" readonly></input>
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="date" class="form-control" placeholder="Enter Date" name="date" id="date" required="">
                  </fieldset>
                </div>
              </div>

              <input type="hidden" name="cafe_id" value="<?php echo $cafe->cafe_id ?>">

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <select name="table" class="form-control" placeholder="Choose your table" id="table">
                      <?php
                      if (count($cafe->tables) === 0) { ?>
                        <option>No table available</option>
                        <?php
                      } else {
                        foreach ($cafe->tables as $table) { ?>
                          <option value="<?php echo $table->table_id ?>"><?php echo $table->table_name; ?></option>
                      <?php
                        }
                      } ?>
                    </select>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                    <input type="number" class="form-control" placeholder="Many Table" name="qty" required min="1" max="99">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <select name="payment" class="form-control" placeholder="Payment" id="paymentmethod">
                      <option value="ovo">OVO</option>
                      <option value="gopay">Gopay</option>
                      <option value="paypal">Paypal</option>
                    </select>
                  </fieldset>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Send Request</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>
