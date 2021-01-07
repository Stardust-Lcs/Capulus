<?php
// require_once __ROOT__ . 'models/User.php';

class Home {
    function index() {
        // $user = new User();
        // print_r($user->get());
        View::load('home', [
            'peepee' => '====D',
            'ball' => 'B',
            'count' => 2
        ]);
    }
}
