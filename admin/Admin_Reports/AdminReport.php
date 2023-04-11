<?php 

require "../../database/database.php";
require "../../public/Auth.php";
include "../../Customer/includes/header.php";

?>

<?php 
    $username= "root";
    $password= "";
    $database = "leafy";

    try{
        $pdo = new PDO("mysql:host=localhost;database=$database",$username,$password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("Error: not connected.".$e->getMessage());
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
          
    <title>Admin Report page</title>

    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      
      .chartCard {
        /* width: 100vw; */
        width: 500px;
        /* height: calc(100vh - 40px); */
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 500px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }
    </style>
</head>

<body>
    <?php include 'AdminReportPHP.php';?>
    <?php include "../menu/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="main_wrapper">
        
        <div class="content">
            <h2>Reports</h2>

            <!-- not delivered orders-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Orders to be delivered</p>
                    <div class="card_left">
                        <ul>

                        <li><a>
                        <table>
                        <td>OrderID</td><td>CustomerID</td><td>Payment method</td>
                        </table>
                        </a></li>

                            <?php while($record1=mysqli_fetch_assoc($resultorder)){?>
                                <li><a >
                                    <table>
                                    <td><?= $record1['order_id']?> </td><td><?= $record1['customer_id']?></td><td><?= $record1['payment_method']?></td>
                                    </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>

                <!-- delivered orders-->
                <div class="container_left">
                    <div class="main_card">
                    <p>Delivered orders</p>
                    <div class="card_left">
                        <ul>

                        <li><a>
                        <table>
                        <td>OrderID</td><td>CustomerID</td><td>Payment method<td>
                        </table>
                        </a></li>

                            <?php while($record2=mysqli_fetch_assoc($resultnonorder)){?>
                                <li><a>
                                    <table>
                                    <td><?= $record2['order_id']?> </td><td><?= $record2['customer_id']?></td><td><?= $record2['payment_method']?></td>
                                    </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>

           </div>

           <!-- search Users by role-->
           <div class="box">
                <div class="container_left">

                <form class="search" method="POST" action="AdminReport.php" >
                    <input type="text" id="start1" placeholder="search by role..." name="start1" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/> 

					<span >
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button>
					</span>

                </form>
			<br />

                    <div class="main_card">
                    <p>Users</p>
                    <div class="card_left">
                        <ul>

                        <li><a>
                        <table>
                        <td>UserID</td><td>First name</td><td>Role<td>
                        </table>
                        </a></li>

                            <?php while($record3=mysqli_fetch_assoc($queryusers)){?>
                                <li><a >
                                    <table>
                                    <td><?= $record3['user_id']?> </td><td><?=$record3['fname']?></td><td><?=$record3['role']?></td>
                                    </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <!-- <div class="center"> -->
                    <div align="center">
                    <div class="chartCard">
                        <div class="chartBox">
                        <?php include '../../admin/charts/users_report.php';?>
                        
                        </div>
                    </div>
                    </div>
                    <!-- </div> -->
                    
                </div>

           </div>

           <!-- select blog by month-->
           <div class="box">
                <div class="container_left">


                <form class="search" method="POST" action="AdminReport.php" >
                    <input type="month" id="start2" placeholder="date..." name="start2" min="2023-01" value="2023-05" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/> 

					<span >
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button>
					</span>

                </form>
			<br />
			

                    <div class="main_card">
                    <p>Blogs</p>
                    <div class="card_left">
                        <ul>

                        <li><a>
                        <table>
                        <td>BlogID</td><td>Blog Title</td><td>Date created<td>
                        </table>
                        </a></li>

                            <?php while($record4=mysqli_fetch_assoc($query)){?>
                                <li><a >
                                    <table>
                                    <td><?= $record4['blog_id']?> </td><td><?=$record4['title']?></td><td><?=$record4['date']?></td>
                                    </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <!-- <div class="center"> -->
                    <div align="center">
                    <div class="chartCard">
                        <div class="chartBox">
                        <?php include '../../admin/charts/blog_report.php';?>
                        </div>
                    <!-- </div> -->
                    </div>
                    </div>
                    
                </div>

           </div>

           <!-- select course by id -->
           <div class="box">
                <div class="container_left"> 
                    
                <form class="search" method="POST" action="AdminReport.php" >
                    <input type="text" id="start3" placeholder="instructor id..." name="start3"  value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/> 

					<span >
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button>
					</span>

                </form>
			<br />

                    <div class="main_card">
                    <p>Courses</p>
                    <div class="card_left">
                        <ul>

                            <li><a>
                            <table>
                            <td>CoursesID </td><td> Courses Title</td>
                            </table>
                            </a></li>                      

                            <?php while($record4=mysqli_fetch_assoc($querycourse)){?>
                                <li><a >
                                    <table>
                                    <td><?= $record4['course_id']?> </td><td><?=$record4['title']?></td>
                                    </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <!-- <div class="center"> -->
                    <div align="center">
                    <div class="chartCard">
                        <div class="chartBox">
                        <?php include '../../admin/charts/course_report.php';?>
                        </div>
                        </div>
                    <!-- </div> -->
                    
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