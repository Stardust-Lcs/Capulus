<?php
$routes = [
    "GET /home" => "Home/index",
    "GET /about" => "About/index",
    "GET /login" => "Login/index",
    "GET /register" => "Register/index",
    "GET /packages" => "Packages/index",
    "GET /packagesDetails" => "PackagesDetails/index",
    "GET /contact" => "Contact/index",
    "GET /testimonials" => "Testimonials/index",
    "GET /terms" => "Terms/index",
    "GET /blog" => "Blog/index",
    "GET /paymentDetails" => "PaymentDetails/index",

    "GET /dashboard" => "Dashboard/index",

    "POST /user/login" => "Auth/userLogin",
    "GET /user/logout" => "Auth/userLogout",
    "POST /user/register" => "Register/userRegister",

];
