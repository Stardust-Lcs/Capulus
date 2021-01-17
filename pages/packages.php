<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>Packages</h4>
            <h2>Choose from our packages!</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Banner Ends Here -->


<!-- Isi -->
<section class="blog-posts grid-system">
  <div class="container">
    <div class="all-blog-posts">
      <div class="row">
        <?php
        if (count($rows) === 0) {
        ?>
          <div class="col-sm-12 text-center">
            <p>Belum ada data.</p>
          </div>
          <?php
        } else {
          foreach ($rows as $row) { ?>
            <div class="col-md-4 col-sm-6 bg-">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="<?php echo $row->photo; ?>" alt="<?php echo $row->name; ?>">
                </div>
                <div class="down-content">
                  <span> <?php //echo $row->min_price . ' - ' . $row->max_price; 
                          ?> </span>
                  <a href="<?php echo baseURL("cafeDetails?id=$row->cafe_id"); ?>">
                    <h4><?php echo $row->name ?></h4>
                  </a>
                  <p><?php echo $row->address ?></p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-lg-12">
                        <ul class="post-tags">
                          <li><i class="fa fa-bullseye"></i></li>
                          <li><a href="<?php echo baseURL("cafeDetails?id=$row->cafe_id"); ?>">View Package</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>
