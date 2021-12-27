<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
                                                  $paymentid=$_POST['razorpay_payment_id'];
                                                    $orderid=$_SESSION['razorpay_order_id'];
                                                    $emailid=$_SESSION['emailid'];
                                                    $phoneno=$_SESSION['phoneno'];
                                                    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                                                    $paydate=date('d-m-Y h-i-s');
      $query='insert into orderdetails(paymentid,orderid,phoneno,emailid,ordate) values("'.$paymentid.'","'.$orderid.'","'.$phoneno.'","'.$emailid.'","'.$paydate.'")';
            if(mysqli_query($conn,$query)){
                // $html=$html."<p>Congratulations!!</p>";
                // header("./");
                echo "Payment Done";
}
 else{
                $html=mysqli_error($conn);
                echo $html;
            }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
