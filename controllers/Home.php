<?php
class Home {
    function index() {
        $cafes = (new Cafe())->get();
        $cafes[0]->name = "uoyoyo";
        $cafes[0]->update();

        View::load("templates/header", [
            'active_home' => TRUE
        ]);
        View::load('home');
        View::load("templates/footer");
    }
}
