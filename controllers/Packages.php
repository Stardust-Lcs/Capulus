<?php
class Packages {
    function index() {
        View::load("templates/header", [
            'active_packages' => True
        ]);
        View::load('packages');
        View::load("templates/footer");
    }
}