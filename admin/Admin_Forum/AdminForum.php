<?php 

require "../../database/database.php";
require "../../public/Auth.php";
include '../includes/header.php';

?>

<?php   

//discussion
  if(isset($_GET['deleteUID']))
  {
      
      $Q_id = $_GET['deleteUID'];
      $sql2 = "UPDATE discussion SET approved=2 WHERE id=$Q_id";
      $result2=mysqli_query($conn,$sql2);

  }


  if(isset($_GET['acceptUID']))
  {

      $Q_id = $_GET['acceptUID'];
      $sql2 = "UPDATE discussion SET approved=1 WHERE id=$Q_id";
      $result2=mysqli_query($conn,$sql2);

  }

  //course forum
  if(isset($_GET['CdeleteUID']))
  {
      
      $Q_id = $_GET['CdeleteUID'];
      $sql2 = "UPDATE course_forum SET approved=2 WHERE question_id=$Q_id";
      $result2=mysqli_query($conn,$sql2);

  }


  if(isset($_GET['CacceptUID']))
  {

      $Q_id = $_GET['CacceptUID'];
      $sql2 = "UPDATE course_forum SET approved=1 WHERE question_id=$Q_id";
      $result2=mysqli_query($conn,$sql2);

  }

?>

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

            <!-- Course forum-->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Questions from Course forum</p>
                    <div class="card_left">
                        <ul>

                            <?php while($Crecord=mysqli_fetch_assoc($Cresult)){?>
                                <li><a onclick="myFunction()" href="AdminForum.php?view_1=<?= $Crecord['question_id']; ?> ">
                                <table>
                                <td>Question ID <?= $Crecord['question_id']?></td>
                                </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>

                </div>
                <div class="container_right" id="view_more">
                    <h3> Question <?= $Cquestion_id ?></h3>

                    <div class="container_button">

                        <div align="right">
                            <a class="delete" href="AdminForum.php ?CdeleteUID=<?=$Cquestion_id ?>" onclick="CshowModal(); return false;">Remove</a>
                            <a class="accept" href="AdminForum.php ?CacceptUID=<?=$Cquestion_id ?>" onclick="CacceptModal(); return false;">Approve</a>

                        </div>

                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Question ID</th>
                                <td>:</td>
                                <td><?=$Cquestion_id ?></td>
                            </tr>
                            <tr>
                                <th>Questioner </th>
                                <td>:</td>
                                <td><?=$Cfname ?></td>
                            </tr>                        
                            <tr>
                                <th>Question </th>
                                <td>:</td>
                                <td><?=$Ccontent ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    
                </div>

                
           </div>

            <!-- discussion forum-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Questions from Discussion forum</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($result)){?>
                                <li><a onclick="myFunction()" href="AdminForum.php?view=<?= $record1['id']; ?> ">
                                <table>
                                <td>Question ID <?= $record1['id']?></td>
                                </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>

                </div>
                <div class="container_right" id="view_more">
                    <h3> Question <?= $question_id ?></h3>

                    <div class="container_button">

                        <div align="right">
                            <a class="delete" href="AdminForum.php ?deleteUID=<?=$question_id ?>" onclick="showModal(); return false;">Remove</a>
                            <a class="accept" href="AdminForum.php ?acceptUID=<?=$question_id ?>" onclick="acceptModal(); return false;">Approve</a>

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
                                <td><?=$fname ?></td>
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

            <div id="id01" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <h1>Are you sure you want to remove this question</h1>
                            <div class="clearfix_delete">
                            <a class="delete" href="AdminForum.php ?deleteUID=<?=$question_id ?>">Remove</a>
                                <button type="button" class="cancelbtn" onclick="hideModal();">Cancel</button>
                            </div>
                            </div>
                            </div>
            </div>

            <div id="id02" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <h1>The question is approved</h1>

                            <div class="clearfix_delete">

                            <a  href="AdminForum.php ?acceptUID=<?=$question_id ?>">OK</a>
                            
                            </div>
                            
                            </div>
                            </div>
            </div>


            <!-- course forum  -->
            <div id="id03" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <h1>Are you sure you want to remove this question</h1>
                            <div class="clearfix_delete">
                                <a class="delete" href="AdminForum.php ?CdeleteUID=<?=$Cquestion_id ?>">Remove</a>
                                <button type="button" class="cancelbtn" onclick="ChideModal();">Cancel</button>
                            </div>
                            </div>
                            </div>
            </div>

            <div id="id04" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <h1>The question is approved</h1>

                            <div class="clearfix_delete">

                            <a  href="AdminForum.php ?CacceptUID=<?=$Cquestion_id ?>">OK</a>
                            
                            </div>
                            
                            </div>
                            </div>
            </div>

        <script src="notification.js"></script>

        <footer>
        <?php include '../../includes/footer.view.php';?>
        </footer>

        <script src="../modal.js"></script>
</body>
</html>