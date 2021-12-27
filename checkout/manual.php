

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 100%;
            height: 100vh;
            border-radius: 20px;
            display: flex;
        }
        
        .pricedetails {
            position: relative;
            top: 60px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="orderdetail">
            <h1 style="text-align:center;background-color:blueviolet;border-radius:5px;">Order Summary</h1>
            <img src="http://sstechnogyaan.com/razorpay/razorpay-php-testapp-master/razorpay-php-testapp-master/jeans.jpeg" alt="" width="300" height="350">
            <button id="rzp-button1">CONTINUE</button>
        </div>
        <div class="pricedetails">
        <h2>Price Details</h2>
       
                  <h3>Price:<?php echo $_SESSION['price'];?></h3>
                  <h3>Quantity:<?php echo $_SESSION['qnty'];?> </h3>
                  <h3>Payable Amount:<?php  echo $_SESSION['amount'];?></h3>
        </div>
    </div>
</body>

</html>
     




<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
// Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>