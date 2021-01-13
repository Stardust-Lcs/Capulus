<h6 class="h2 text-white d-inline-block mb-0"><?php echo $title; ?></h6>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item">
            <a href="<?php echo baseURL('dashboard'); ?>">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <?php
        if ($breadcrumbs) {
            foreach ($breadcrumbs as $value) { ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo $value['url'] ?>">
                        <?php echo $value['name']; ?>
                    </a>
                </li>
        <?php   }
        } ?>
        <!-- <li class="breadcrumb-item active" aria-current="page">Tables</li> -->
    </ol>
</nav>
