<?php 

require "../../database/database.php";
require "../../public/Auth.php";
include '../includes/header.php';

?>

<?php   

  if(isset($_GET['deleteUID']))
  {
      
      $Q_id = $_GET['deleteUID'];
      $sql2 = "UPDATE question SET approved=2 WHERE question_id=$Q_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'deleted';

      header('location:../model.html');

  }


  if(isset($_GET['acceptUID']))
  {

      $Q_id = $_GET['acceptUID'];
      $sql2 = "UPDATE question SET approved=1 WHERE question_id=$Q_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'updated';

  }

?>

<!-- <?php
    if(isset($_GET['view']))
    {?>
    <div align="right">
        <a class="delete" href="AdminForum.php ?deleteUID=<?=$_GET['view'] ?>" >Deactivate</a>
        <a class="accept" href="AdminForum.php ?acceptUID=<?=$_GET['view'] ?>" >Accept</a>

    </div>
      
      <?php 
    }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../notification.css">
    <link rel="stylesheet" href="../../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
          
    <title>Admin Forum</title>

    <style>
      
      .main_wrapper .content .box .container_left .main_card .card_left ul li a {
            width: 98%;
            /* width: 200px;  */
        }


        .main_wrapper .content .box .container_left .main_card .card_left table {
            table-layout: fixed; 
            width: 100%;
            
        }
   </style>
</head>

<body>
    <?php include 'AdminForumPHP.php';?>
    <?php include "../menu/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="main_wrapper">
        
        <div class="content">
            <h2>Questions</h2>

            <!-- User-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Questions</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($result)){?>
                                <li><a onclick="myFunction()" href="modalAdminForum.php?view=<?= $record1['question_id']; ?> ">
                                <table>
                                <td>Question ID <?= $record1['question_id']?></td>
                                </table>
                            </a></li><br>
                            <?php }?>
                        </ul>
                    </div>
                    </div>

                </div>
                <div class="container_right" id="view_more">
                    <h3> Question <?= $question_id ?>:   <?= $cust_first_name ?></h3>

                    <div class="container_button">

                        <div align="right">
                            <a id="myBtn" class="delete" href="modalAdminForum.php ?deleteUID=<?=$question_id ?>" >Delete</a>
                            <a id="myBtn" class="accept" href="modalAdminForum.php ?acceptUID=<?=$question_id ?>" >Approve</a>

                        </div>

                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Question ID</th>
                                <td>:</td>
                                <td><?=$question_id ?></td>
                            </tr>
                            <tr>
                                <th>Questioner </th>
                                <td>:</td>
                                <td><?=$fname ?> <?=$lname ?></td>
                            </tr>                        
                            <tr>
                                <th>Question </th>
                                <td>:</td>
                                <td><?=$content ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    
                </div>

           </div>      


        </div>
        </div>

    </div>
</div>    


        <script src="notification.js"></script>

        <?php include '../../includes/footer.view.php';?>
</body>
</html>