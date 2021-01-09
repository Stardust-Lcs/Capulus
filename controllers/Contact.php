<?php
class Contact {
    function index() {
        View::load("/templates/header");
        View::load('contact');
        View::load("/templates/footer");
    }
}