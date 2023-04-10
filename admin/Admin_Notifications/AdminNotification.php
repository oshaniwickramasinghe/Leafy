<?php 

require "../../public/Auth.php";
include "../../public/includes/header.view.php";

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
    <?php include "../admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="instructor_wrapper">
        
        <div class="content">
            <h2>Notifications</h2>

        <section id='customer'>;
            <!-- users-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Users</p>
                    <div class="card_left">
                        <ul>

                        
                            <li><a>
                            <table>
                                <!-- <td>UserID</td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;First Name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Role -->
                                <td>UserID</td><td>First Name</td><td>Role</td>
                                </a>
                            </table>
                            </li>

                            <?php while($record1=mysqli_fetch_assoc($resultcustomer)){?>
                                <li><a onclick="myFunction()" href="../Admin_Users/AdminUserView.php ?UID=<?= $record1['user_id']; ?> ">
                                <table>
                                <!-- <?= $record1['user_id'   ]?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <?=$record1['fname']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <?=$record1['role']?></a></li> -->
                                <td><?= $record1['user_id']?></td><td> <?=$record1['fname']?></td> <td><?=$record1['role']?></td></a>
                            </table>
                            </li>

                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                

           </div>
        </section>

           <!-- Blog -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New blogs</p>
                    <div class="card_left">
                        <ul>

                        <li><a>
                        <table>
                            <td>BlogID</td><td>Blog Title</td>
                        </table>
                        </a></li>

                            <?php while($record2=mysqli_fetch_assoc($resultblog)){?>
                                <li>
                                    <a href="../AdminBlogView.php ? viewblog=<?= $record2['blog_id']; ?> ">
                                    <table>
                                    <td><?= $record2['blog_id']?></td> <td> <?=$record2['title']?></td> </a>
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
                            <td>CourseID</td><td>Course Title</td>
                        </table>
                        </a></li>

                            <?php while($record3=mysqli_fetch_assoc($resultcourse)){?>
                                <li><a href="../AdminCourseView.php ? viewcourse=<?= $record3['course_id']; ?> ">
                                <table>
                                <td><?= $record3['course_id']?> </td><td><?=$record3['title']?> </td>
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