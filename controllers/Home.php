<?php
class Home {
    function index() {
        View::load("templates/header", [
            'active_home' => TRUE
        ]);
        View::load('home');
        View::load("templates/footer");
    }
}
