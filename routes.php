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
    "POST /order" => "CafeDetails/nextOrder",
    // "GET /paymentDetails" => "PaymentDetails/index",
    "GET /registerCafe" => "RegisterCafe/index",
    "GET /result-order" => "ResultOrder/index",

    "GET /dashboard" => "Dashboard/index",
    "GET /dashboard/tables" => "TablesController/dashboard",
    "GET /dashboard/your-cafe" => "YourCafe/dashboard",

    "POST /user/login" => "Auth/userLogin",
    "GET /user/logout" => "Auth/userLogout",
    "POST /user/register" => "Register/userRegister",
    "POST /cafe/register" => "RegisterCafe/cafeRegister",
    "POST /cafe/register/upload" => "Upload/uploadImage",
    "POST /order/confirm" => "CafeDetails/createOrder",
    "POST /cafe/edit" => "YourCafe/edit",
    "POST /table/add" => "TablesController/add",
];
