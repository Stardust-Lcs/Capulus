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
                    <input type="number" class="form-control" placeholder="Many Table" name="qty" required min="1">
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
