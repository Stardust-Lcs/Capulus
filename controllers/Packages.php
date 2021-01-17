<?php
class Packages {
    function index() {
        $cafe = new Cafe();
        $rows = $cafe->get();

        View::load("templates/header", [
            'active_packages' => True
        ]);
        View::load('packages', [
            'rows' => $rows
        ]);
        View::load("templates/footer");
    }
}
