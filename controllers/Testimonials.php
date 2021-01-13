<?php
class Testimonials {
    function index() {
        View::load("/templates/header");
        View::load('testimonials');
        View::load("/templates/footer");
    }
}
