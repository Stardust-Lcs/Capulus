<?php
class Login {
    function index() {
        View::load("templates/header", [
            'active_login' => True
        ]);
        View::load('login');
        View::load("templates/footer");
    }
}
