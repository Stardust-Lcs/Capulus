<?php
class Home {
    function index() {
        $cafe = new Cafe();
        $bannerCafe = $cafe->get([], '', 3);
        $allCafe = $cafe->get();

        View::load("templates/header", [
            'active_home' => TRUE
        ]);
        View::load('home', [
            'bannerCafe' => $bannerCafe,
            'allCafe' => $allCafe
        ]);
        View::load("templates/footer");
    }
}
