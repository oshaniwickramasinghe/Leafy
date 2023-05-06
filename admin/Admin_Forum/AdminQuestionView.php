<?php
require "../../public/Auth.php";
include '../includes/header.php';
include "../../database.php";
include '../../includes/header.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
   integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <title>Forum</title>
</head>
<body>

<div  class  =  "forum_body">
    <h2> Forum</h2>
    <form  method  = "post">
  <div class  = "question">
    <p>What climate is needed for Mediterranean agriculture?</p>

  </div>
<div class="reply">
  <span>The Mediterranean climate is the climate that is needed for Mediterranean agriculture.
 The Mediterranean climate is characterized by summers 
that are hot and relatively dry while its winters are cool and wet.</span>
<i class="fa fa-reply" aria-hidden="true"> </i><p>Reply</p>

</div>
<div class="add_question">

<input type  = "text"  name  =  "question"  value  = "Write your question here......" >
</div>
 <button>Add question</button>
   </form>
   <div class  =  "backk">
   <a href = "../../post/vegetable.php"><button> <b><<</b> back</button>
</div>
</div>


</body>


<footer>
<!-- <div class="footer-copyright">
            <p>copyright @2022 Leafy All Rights Reserved</p>
        </div> -->
<img src = "../images/Footer.svg"  height= "121.3px" style = "margin-top:auto">
</footer>
</html>