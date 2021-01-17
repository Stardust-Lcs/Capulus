<?php
$routes = [
    "GET /home" => "Home/index",
    "GET /about" => "About/index",
    "GET /login" => "Login/index",
    "GET /register" => "Register/index",
    "GET /packages" => "Packages/index",
    "GET /cafeDetails" => "CafeDetails/index",
    "GET /contact" => "Contact/index",
    "GET /testimonials" => "Testimonials/index",
    "GET /terms" => "Terms/index",
    "GET /blog" => "Blog/index",
    "GET /paymentDetails" => "PaymentDetails/index",
    "GET /registerCafe" => "RegisterCafe/index",

    "GET /dashboard" => "Dashboard/index",
    "GET /dashboard/tables" => "TablesController/dashboard",

    "POST /user/login" => "Auth/userLogin",
    "GET /user/logout" => "Auth/userLogout",
    "POST /user/register" => "Register/userRegister",
    "POST /cafe/register" => "RegisterCafe/cafeRegister",
    "POST /cafe/register/upload" => "Upload/uploadImage",
    "POST /cafeDetails/order" => "CafeDetails/createOrder",

];
