<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        CAPULUS.
        <!-- <img src="<?php echo baseURL('assets/dashboard/img/brand/blue.png'); ?>" class="navbar-brand-img" alt="..."> -->
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo $active_dashboard ? 'active' : ''; ?>" href="<?php echo baseURL('dashboard'); ?>">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item <?php echo $active_dashboard ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo baseURL('dashboard/your-cafe') ?>">
              <i class="ni ni-planet text-orange"></i>
              <span class="nav-link-text">Your Cafe</span>
            </a>
          </li>
          <?php
          global $session;
          $user_id = $session->get('user_id');
          $cafe_id = (new Cafe())->get(['cafe_id'], "user_id = '$user_id'", 1);
          if ($cafe_id) {
            $cafe_id = $cafe_id[0]->cafe_id;
          ?>
            <li class="nav-item <?php echo $active_dashboard ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo baseURL("dashboard/tables?id=$cafe_id"); ?>">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Tables</span>
              </a>
            </li>
          <?php
          } ?>
          <li class="nav-item <?php echo $active_dashboard ? 'active' : ''; ?>">
            <a class="nav-link" href="profile.html">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Documentation</span>
        </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Getting started</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
              <i class="ni ni-palette"></i>
              <span class="nav-link-text">Foundation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
              <i class="ni ni-ui-04"></i>
              <span class="nav-link-text">Components</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
              <i class="ni ni-chart-pie-35"></i>
              <span class="nav-link-text">Plugins</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active active-pro" href="upgrade.html">
              <i class="ni ni-send text-dark"></i>
              <span class="nav-link-text">Upgrade to PRO</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
