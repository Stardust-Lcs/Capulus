<?php
class Login {
    function index() {
        readable_var_dump($_GET);
        View::load("templates/header", [
            'active_login' => True
        ]);
        View::load('login');
        View::load("templates/footer");
    }
}
