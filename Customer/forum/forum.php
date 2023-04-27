<?php
include "../Auth.php";
include "../database.php";
include '../includes/header.php';


$id  = $_SESSION['USER_DATA']['user_id'];

$sql  = "SELECT COUNT(*) FROM notification WHERE status = 0 && customer_id = $id  ";
$result = mysqli_query($conn,$sql);
$row  = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
<title>forum</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="https://kit.fontawesome.com/6b34f3c462.css" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="../CSS/delivery.css">
<link rel="stylesheet" href="../CSS/style.css">
<script src="main.js"></script>
</head>

<!-- Modal for the reply -->

<div class="left_menu_bar">
            <div id="menu">
                <a><i class="fa-solid fa-bars"></i></a>
                <div class="image"><img src="images/badge.svg" alt=""></div>
                <h3>Leafy</h3>
            </div>
            <ul>
                <li><a href="../customerhome.php"><i class="fa-solid fa-house"  style="font-size:16px;color:black;"></i>Home</a></li>
                <li><a href="../wishlist/wishlist.php"><i class="fa fa-list" aria-hidden="true" style="font-size:16px;color:black;"></i>Wishlist</a></li>
                <li><a href="../notification/notification.php"><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;"></i>Notifications <div class  = "count" style = "margin-top:-8%"><?php echo $row[0]?></div></a></li>
                <li><a href="../forum/forum.php"><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Forum</a></li>
                <li><a href="../history/history.php"><i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>History</a></li>
                <li><a href="../location/location.php"><i class="fa-solid fa-location-arrow"  style="font-size:16px;color:black;"></i>Location</a></li>
               
            </ul>

        </div>

<div  class  =  "forum_body">


<div  class  = "R">
<div id="id01" class="modal" style="display: none;">
<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
<div id="ReplyModal" class="modal fade" role="dialog">
        <h4 class="modal-title">Reply Question</h4>
      </div>
      <div class="modal-body" style=" margin-left: 12%">

        <form name="frm1" method="post">
            <input type="hidden" id="commentid" name="Rcommentid">
            <div class="form-group">
              <label for="comment">Write your reply:</label><br>
              <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
            </div>
<!-- after click on reply button modal will be hidden -->
        	 <input type="button" id="btnreply" onclick="hideModal();" name="btnreply" class="btn btn-primary" value="Reply">
      </form>
      </div>
    </div>
</div>


<!-- reply fo the question -->

<div class="reply">
  <div class="reply_body">
    <h4>Recent questions</h4>
	<table class="table" id="MyTable" style="background-color: #ffff; border:0px;border-radius:10px">
	  <tbody id="record">
	  </tbody>
	</table>
  </div>
</div>


 <!-- question forum -->

<div class="forum">
<div class="question">

<h3>Forum</h3>

    <form name="frm" method="post">
      <input type="hidden" id="commentid" name="Pcommentid" value="0">

      <div class="form-group">
      <label for="comment">Write your question:</label><br>
      <textarea class="form-control" rows="5" name="msg" required></textarea>
     </div>

	    <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
  </form>

</div>
</div>

<!-- end of the forum body -->
</div>

<div class="footer">
<img src = "../images/Footer.svg"  height= "121.3px" style = "margin-top:auto">
</div>
</body>
</html>