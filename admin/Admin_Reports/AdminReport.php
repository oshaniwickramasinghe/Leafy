<?php 
require "../../database/database.php";
require "../../public/Auth.php";
include '../includes/header.php';
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

                                <li>
                                    <a class="report">
                                        <table class="report">
                                            <col width="50px">
                                            <col width="50px">
                                            <col width="50px">
                                            <tr>
                                            <td>OrderID</td>
                                            <td>CustomerID</td>
                                            <td>Payment method</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>

                                <?php while($record1=mysqli_fetch_assoc($resultorder)){?>
                                <li>
                                    <a class="report">
                                        <table class="report">
                                            <col width="50px">
                                            <col width="50px">
                                            <col width="50px">
                                            <tr>
                                            <td><?= $record1['order_id']?> </td>
                                            <td><?= $record1['customer_id']?></td>
                                            <td><?= $record1['payment_method']?></td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
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
                                    <li>
                                        <a class="report">
                                            <table class="report">
                                                <col width="50px">
                                                <col width="50px">
                                                <col width="50px">
                                                <tr>
                                                <td>OrderID</td>
                                                <td>CustomerID</td>
                                                <td>Payment method</td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>

                                    <?php while($record2=mysqli_fetch_assoc($resultnonorder)){?>
                                    <li>
                                        <a class="report">
                                            <table class="report">
                                                <col width="50px">
                                                <col width="50px">
                                                <col width="50px">
                                                <tr>
                                                <td><?= $record2['order_id']?> </td>
                                                <td><?= $record2['customer_id']?></td>
                                                <td><?= $record2['payment_method']?></td>
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

            <!-- search Users by role-->
            <div class="box">
                <div class="container_left">

                    <form class="search" method="POST" action="AdminReport.php" >
                        <input type="text" id="start1" placeholder="search by role or name..." name="start1" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/> 
                        
                        <span >
                            <button name="search" class="fa-solid fa-magnifying-glass"></button>
                        </span>
                    </form>

                    <br />

                    <div class="main_card">
                        <p>Users</p>
                        <div class="card_left">
                                <ul>
                                    <li>
                                        <a class="report">
                                            <table class="report">
                                                <col width="50px">
                                                <col width="50px">
                                                <col width="50px">
                                                <tr>
                                                <td>UserID</td>
                                                <td>First name</td>
                                                <td>Role</td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <?php while($record3=mysqli_fetch_assoc($queryusers)){?>
                                    <li>
                                        <a class="report">
                                            <table class="report">
                                                <col width="50px">
                                                <col width="50px">
                                                <col width="50px">
                                                <tr>
                                                <td><?= $record3['user_id']?></td>
                                                <td><?=$record3['fname']?></td>
                                                <td><?=$record3['role']?></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                <?php }?>
                                </ul>
                        </div>
                    </div>
                </div> 
                <div class="center">
                    <h2>Total number of Users registered</h2>
                    <div class="chartCard">
                        <div class="chartBox">
                        <?php include '../../admin/charts/users_report.php';?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- select blog by month-->
            <div class="box">
                <div class="container_left">
                    <form class="search" method="POST" action="AdminReport.php" >     
                        <input type="month" id="start2" placeholder="date..." name="start2" min="2023-01" value="2023-05" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/> 
                        
                        <span >
                            <button name="search" class="fa-solid fa-magnifying-glass"></button>
                        </span>
                    </form>
                <br/>
                    <div class="main_card">
                        <p>Blogs</p>
                        <div class="card_left">
                                <ul>
                                    <li>
                                        <a class="report">
                                            <table class="report">
                                                <col width="50px">
                                                <col width="50px">
                                                <col width="50px">
                                                <tr>
                                                <td>BlogID</td>
                                                <td>Blog Title</td>
                                                <td>Date created</td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <?php while($record4=mysqli_fetch_assoc($query)){?>
                                    <li>
                                        <a class="report">
                                            <table class="report">
                                                <col width="50px">
                                                <col width="50px">
                                                <col width="50px">
                                                <tr>
                                                <td><?= $record4['blog_id']?></td>
                                                <td><?=$record4['title']?></td>
                                                <td><?=$record4['date']?></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                <?php }?>
                                </ul>
                        </div>
                    </div>
                </div>

                <div class="center">
                <h2>Blogs created within last 12 months</h2>
                    <div class="chartCard">
                        <div class="chartBox">
                            <?php include '../../admin/charts/blog_report.php';?>
                        </div>
                    </div>
                </div>
            </div>

           <!-- select course by id -->
           <div class="box">
                <div class="container_left"> 
                    
                <form class="search" method="POST" action="AdminReport.php" >
                    <input type="text" id="start3" placeholder="instructor id or course title..." name="start3"  value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/> 

					<span >
                        <button name="search" class="fa-solid fa-magnifying-glass"></button>
                	</span>

                </form>
			<br />

                    <div class="main_card">
                    <p>Courses</p>
                    <div class="card_left">
                        <ul>

                            <li><a class="report">
                            <table class="report">
                                            <col width="50px">
                                            <col width="50px">
                                            <col width="50px">
                                <tr>
                            <td>CoursesID </td><td> Courses Title</td>
                                    </tr>
                            </table>
                            </a></li>                      

                            <?php while($record4=mysqli_fetch_assoc($querycourse)){?>
                                <li><a class="report">
                                    <table class="report">
                                            <col width="50px">
                                            <col width="50px">
                                            <col width="50px">
                                        <tr>
                                    <td><?= $record4['course_id']?> </td><td><?=$record4['title']?></td>
                                    </tr>    
                                </table>
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                    <div class="center">
                    <h2>Courses created within last 12 months</h2>
                    <div class="chartCard">
                        <div class="chartBox">
                        <?php include '../../admin/charts/course_report.php';?>
                        </div>
                        </div>
                    
                </div>
            
        </div>

                <div class="container_right" id="view_more">
                    <div align="center">
                    <h2>Number of items sold in last 12 months</h2>
                        <div class="chartBox">
                        <?php include '../../admin/charts/item_analysis.php';?>
                        
                        </div>
                    </div>                    
                </div>
<br><br><br><br><br>
                <div class="container_right" id="view_more">
                    <div align="center">
                    <h2 style="padding-left: -100px;">Total income of each month in last 12 months</h2>

                        <div class="chartBox">
                        <?php include '../../admin/charts/order_income_chart.php';?>
                        </div>
                    </div>                    
                </div>

    <!-- </div> -->
</div> 
</div>
</div>  
</div>    

        <script src="notification.js"></script>
</body>
</html>