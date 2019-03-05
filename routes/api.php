<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/pay', function () {

    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey("sk_test_QYKKE8bLYhPUjGqsOt1vIy0m");

    // Token is created using Checkout or Elements!
    // Get the payment token ID submitted by the form:
    $token = $_POST['stripeToken'];


	//$chargeamount=$cart->$total
    // Charge the user's card:
    $charge = \Stripe\Charge::create(array(
    "amount" => 2000,
    "currency" => "eur",
    "description" => "Example charge",
    "source" => $token,
    ));

    dd("success payment");



});

