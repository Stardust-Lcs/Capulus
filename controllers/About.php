<?php
class About {
    function index() {
        View::load('/templates/header');
        View::load('about');
        View::load('/templates/footer');
    }
}
