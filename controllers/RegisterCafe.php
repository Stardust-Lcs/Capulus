<?php
class RegisterCafe
{
    function index()
    {
        View::load('/templates/header');
        View::load('registerCafe');
        View::load('/templates/footer');
    }
}
