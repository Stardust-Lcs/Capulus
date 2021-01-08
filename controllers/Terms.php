<?php
class Terms {
    function index() {
        View::load('/templates/header');
        View::load('terms');
        View::load('/templates/footer');
    }
}