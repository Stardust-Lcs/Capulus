<?php
class PaymentDetails
{
    function index()
    {
        View::load('/templates/header');
        View::load('paymentDetails');
        View::load('/templates/footer');
    }
}
