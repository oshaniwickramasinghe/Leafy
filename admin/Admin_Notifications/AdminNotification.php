<?php 

require "../../public/Auth.php";
include '../includes/header.php';


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
          
    <title>Admin Notification page</title>
</head>
<body>
    <?php include 'AdminNotificationPHP.php';?>
    <?php //include '../../instructor/Blog/userblog.php';?>
    <?php include "../menu/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="main_wrapper">
        
        <div class="content">
            <h2>Notifications</h2>

            <!-- users-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Users</p>
                    <div class="card_left">
                        <ul>
  
                            <li><a>
                            <table>
                            <col width="50">
                            <col width="150">
                            <col width="150">
                            <col width="100">
                                <tr>
                                    <td>UserID</td>
                                    <td>First Name</td>
                                    <td>Role</td>
                                    <td>Email</td>
                                </tr>
                                
                            </table>
                            </a></li>

                            <?php while($record1=mysqli_fetch_assoc($resultuser)){?>
                                <li>
                                    <a onclick="myFunction()" href="../Admin_Users/AdminUserView.php ?UID=<?= $record1['user_id']; ?> ">
                                        <table>
                                            <col width="50">
                                            <col width="150">
                                            <col width="150">
                                            <col width="100">
                                            <tr>
                                                <td><?= $record1['user_id']?></td>
                                                <td> <?=$record1['fname']?><?=$record1['lname']?></td> 
                                                <td><?=$record1['role']?></td> 
                                                <td><?=$record1['email']?></td>
                                            </tr>                                                                       
                                        </table>
                                    </a>
                                </li>

                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                

           </div>

           <!-- Blog -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New blogs</p>
                    <div class="card_left">
                        <ul>

                        <li><a>
                        <table>
                            <col width="50">
                            <col width="150">
                            <col width="150">
                            <col width="100">
                            <tr>
                            <td>BlogID</td>
                            <td>Blog Title</td>
                            <td>Author</td>
                            <td>Contact details of the author</td>
                            </tr>
                        </table>
                        </a></li>

                            <?php while($record2=mysqli_fetch_assoc($resultblog)){?>
                                <li>
                                    <a href="../../instructor/Blog/userblog.php ? view_blog=<?= $record2['blog_id']; ?> ">
                                    <table>
                                    <col width="50">
                                    <col width="150">
                                    <col width="150">
                                    <col width="100">
                                    <tr>
                                    <td><?= $record2['blog_id']?></td> 
                                    <td> <?=$record2['title']?></td> 
                                    <td> <?=$record2['fname']?> <?=$record2['lname']?></td> 
                                    <td> <?=$record2['email']?></td> 
                                    </tr>
                                </a>
                                </table>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
            

           </div>

           <!-- Courses -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New Courses</p>
                    <div class="card_left">
                        <ul>

                        <li><a>
                        <table>
                            <col width="50">
                            <col width="150">
                            <col width="150">
                            <col width="100">
                            <col width="100">
                            <tr>
                            <td>CourseID</td>
                            <td>Course Title</td>
                            <td>Description</td>
                            <td>Instructor</td>
                            <td>Instructor contact details</td>
                            </tr>
                        </table>
                        </a></li>

                            <?php while($record3=mysqli_fetch_assoc($resultcourse)){?>
                                <li><a href="../../instructor/course/userCourseContent.php?view_course=<?= $record3['course_id']; ?> ">
                                <table>
                                <col width="50">
                                <col width="150">
                                <col width="150">
                                <col width="100">
                                <col width="100">
                                <tr>
                                <td><?= $record3['course_id']?> </td>
                                <td><?=$record3['title']?> </td>
                                <td><?=$record3['description']?> </td>
                                <td><?= $record3['fname']?> <?= $record3['lname']?> </td>
                                <td><?=$record3['email']?> </td>
                                </tr>
                            </table>
                                </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
               

           </div>
            
            
        </div>
        </div>

    </div>
</div>    

        <script src="notification.js"></script>
</body>
</html>