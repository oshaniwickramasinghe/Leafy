


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Card details</title>
</head>
<body>

<div class="grid">

<div class="left">
<i class="fa fa-cc-visa" style="font-size:200px;color:rgb(112, 109, 109)"></i><br>
<i class="fa fa-cc-mastercard" style="font-size:200px;color: #33ca93"></i>
</div>

<div class="right_2">
    <form  method  = "post" >
        <h3>Payment Details </h3><br>
        <div  class = "pay">
        <label>Cardholder Name</label><br>
        <input type = "text"  name = "cardholder"  Value = "Enter name" required><br>
        <label>Card Number</label><br>
        <input type = "text"  name = "number"  Value = "Enter number" required><br>
        <label>Expiration</label> &emsp;&emsp;&emsp;
       &emsp;&emsp;&emsp;&emsp; <label> CVV</label>    <br>
        <input type = "month"  name = "date"  Value = "YYYY/MM" required><br>
        <div class  = "cvv">
        <input type = "text" class  = "cvv"  name = "cvv"  Value = "1233" required>
         </div>

       </div>
       
 <input type= "submit" class= "btn_1" value= "Pay"  name = "payment"
 data-inline = "true" style = "font-size :16px; width:180px" ><br>
    </form>
    <div class = "back">
 <a href = "../customerhome.view.php"> <input type= "submit" class= "btn_1" value= "Back"  name = "back"
 data-inline = "true" style = "font-size :16px; width:180px" ></a>
</div>
</div>
</div>



</body>
</html>
