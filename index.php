<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Payment gateway</title>
    <style>
    *{
        margin:0;
        padding:0;
    }
    .container{
        width:100%;
        height:100vh;
        background-color: white;
        display: flex;
        margin:10px;
        padding:10px;
    }
    .imagecon{
          width:310px;
          height:350px;
          margin-right:2px;
    }
    .btn{
        width: 150px;
        padding:5px 10px;
        border-radius: 10px;
        border-color: green;
        background-color: orange;
        outline: none;
    }
    .txt{
        padding:10px;
        border-radius: 10px;
        outline: none;
    }
    </style>
    
</head>

<body>
<h1 style="text-align:center;background-color:blueviolet;border-radius:10px;margin-top:2px;">Razor pay payment gateway integration using Php</h1>
  
   <div class="container">
   
   <div class="imagecon">
          <img src="jeans.jpeg" alt="" width="300" height="350">
   </div>
   <div class="description">
   <h3>Blue Denim Jeans</h3>
   <h1>Price: 1200</h1>
    <form method="post" action="pay.php">
        <input type="hidden" name="price" id="price" value="1">

        <select name="qnty" id="qnty">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br><br>
        <input type="email" name="emailid" id="emailid" placeholder="enter email id" required class="txt"><br><br>
        <input type="number" name="phoneno" id="phoneno" placeholder="enter your phone number" required class="txt"><br><br>
        <button type="submit" id="pay" class="btn">BUY NOW</button>
    </form> 
    
   </div>
   
   </div>
   
   
  
</body>

</html>