<?php
// require_once __ROOT__ . 'models/User.php';

class Home {
    function index() {
        // $user = new User();
        // print_r($user->get());
        View::load("templates/header", [
            'active_home' => TRUE
        ]);
        View::load('home');
        View::load("templates/footer");
    }
}
