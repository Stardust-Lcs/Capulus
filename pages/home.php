<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">
      <?php
      if ($bannerCafe) {
        foreach ($bannerCafe as $banner) { ?>
          <div class="item">
            <a href="<?= baseURL("cafeDetails?id=$banner->cafe_id") ?>">
              <img src="<?= $banner->photo ?>" alt="<?= $banner->name ?>" width="600" height="400">
            </a>
            <div class="item-content">

              <div class="main-content">
                <!-- <div class="meta-category">
                  <span> $300.00 - $400.00 </span>
                </div> -->

                <a href="<?= baseURL("cafeDetails?id=$banner->cafe_id") ?>">
                  <h4><?= $banner->name ?></h4>
                </a>

                <ul class="post-info">
                  <!-- <li><i class="fa fa-calendar"></i> Spring &nbsp;</li>
                  <li><i class="fa fa-cube"></i> 20 nights &nbsp;</li> -->
                  <li><i class="fa fa-pin"></i> <?= $banner->address ?></li>
                </ul>
              </div>

            </div>
          </div>
      <?php
        }
      } ?>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
  <div class="container owl">
    <div class="all-blog-posts">
      <h2 class="text-center">Cafe</h2>
      <br>
      <div class="row">
        <?php
        if ($allCafe) {
          foreach ($allCafe as $cafe) { ?>
            <div class="col-md-4 col-sm-6">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="<?= $cafe->photo ?>" alt="<?= $cafe->name ?>" height="200">
                </div>
                <div class="down-content">
                  <!-- <span> Rp.10.000 - Rp.15.000 </span> -->
                  <a href="<?= baseURL("cafeDetails?id=$cafe->cafe_id") ?>">
                    <h4><?= $cafe->name ?></h4>
                  </a>
                  <p><?= $cafe->address ?></p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-lg-12">
                        <ul class="post-tags">
                          <li><i class="fa fa-bullseye"></i></li>
                          <li><a href="<?= baseURL("cafeDetails?id=$cafe->cafe_id") ?>">Order Here</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
    </div>
  </div>
  <!-- Tombol Load More -->
  <!-- <br>
  <br> -->
  <!-- <div class="row justify-content-md-center">
    <div class="col-md-3">
      <div class="main-button">
        <a href="packages">Load More</a>
      </div>
    </div>
  </div> -->
  </div>
  </div>
</section>

<!-- <section class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-content">
          <div class="row">
            <div class="col-lg-8">
              <span>Lorem ipsum dolor sit amet.</span>
              <h4>Sed doloribus accusantium reiciendis et officiis.</h4>
            </div>
            <div class="col-lg-4">
              <div class="main-button">
                <a href="contact.html">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- <section class="blog-posts grid-system">
  <div class="container">
    <div class="all-blog-posts">
      <h2 class="text-center">Blog</h2>
      <br>
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="blog-post">
            <div class="blog-thumb">
              <img src="assets/images2/Kafe 1.jpg" alt="" class="responsive" height="400" height="600">
            </div>
            <div class="down-content">
              <a href="blog-details.html">
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
              </a>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

              <ul class="post-info">
                <li><a href="#">John Doe</a></li>
                <li><a href="#">10.07.2020 10:20</a></li>
                <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="blog-post">
            <div class="blog-thumb">
              <img src="assets/images/blog-2-720x480.jpg" alt="" class="responsive" width="600" height="400">
            </div>
            <div class="down-content">
              <a href="blog-details.html">
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
              </a>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

              <ul class="post-info">
                <li><a href="#">John Doe</a></li>
                <li><a href="#">10.07.2020 10:20</a></li>
                <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="blog-post">
            <div class="blog-thumb">
              <img src="assets/images/blog-3-720x480.jpg" alt="" class="responsive" width="600" height="400">
            </div>
            <div class="down-content">
              <a href="blog-details.html">
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
              </a>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

              <ul class="post-info">
                <li><a href="#">John Doe</a></li>
                <li><a href="#">10.07.2020 10:20</a></li>
                <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  Tombol Load More
  <div class="row justify-content-md-center">
    <div class="col-md-3">
      <div class="main-button">
        <a href="blog">Load More</a>
      </div>
    </div>
  </div>
  </div>
  </div>
</section> -->
