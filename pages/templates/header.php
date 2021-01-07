<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

  <title>Capulus | Find Your Favorite Cafe</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

    <!-- Header -->
   <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="home">
          <h2>Capulus<em>.</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo ($active_home ? 'active' : ''); ?>">
              <a class="nav-link" href="home">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item <?php echo ($active_packages ? 'active' : ''); ?>">
              <a class="nav-link" href="packages">List Cafe</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="blog">Blog</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

              <div class="dropdown-menu">
                <a class="dropdown-item" href="about">About Us</a>
                <a class="dropdown-item" href="testimonials">Testimonials</a>
                <a class="dropdown-item" href="terms">Terms</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact">Contact Us</a>
            </li>
            <li class="nav-item <?php echo ($active_login ? 'active' : ''); ?>">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item <?php echo ($active_register ? 'active' : ''); ?>">
              <a class="nav-link" href="/register">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
