<?php
class Register {
    function index() {
        View::load("templates/header", [
            'active_register' => True
        ]);
        View::load('register');
        View::load("templates/footer");
    }
}
