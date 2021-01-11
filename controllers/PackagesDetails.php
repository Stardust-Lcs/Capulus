<?php
class PackagesDetails
{
    function index()
    {
        View::load("/templates/header");
        View::load('packagesDetails');
        View::load("/templates/footer");
    }
}
