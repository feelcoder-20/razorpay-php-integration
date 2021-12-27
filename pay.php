<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
//  Fetching details of user

$price=$_POST['price'];
$qnty=$_POST['qnty'];
$emailid=$_POST['emailid'];
$phoneno=$_POST['phoneno'];
$amount=$price*$qnty;
//Storing data in session
$_SESSION['price']=$price;
$_SESSION['qnty']=$qnty;
$_SESSION['amount']=$amount;
$_SESSION['phoneno']=$phoneno;
$_SESSION['emailid']=$emailid;




//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $amount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'manual';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "LearnWithRajnish",
    "description"       => "Education",
    "image"             => "http://sstechnogyaan.com/razorpay/razorpay-php-testapp-master/razorpay-php-testapp-master/logo.png",
    "prefill"           => [
    "name"              => "Daft Punk",
    "email"             => $emailid,
    "contact"           => $phoneno,
    ],
    "notes"             => [
    "address"           => "67/2 Park Street",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
