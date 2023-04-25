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

    <!-- pdf -->
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js">
      </script>

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


      /* pdf css */
      .pdfcontainer {
         position: fixed;
         top: 20%;
         left: 28%;
         border-radius: 7px;
      }
      #generatePdf {
         /* box-sizing: content-box; */
         width: 300px;
         height: 100px;
         padding: 30px;
         border: 1px solid black;
         font-style: sans-serif;
         background-color: #f0f0f0;
      }
      #pdfButton {
         background-color: #4caf50;
         border-radius: 5px;
         margin-left: 300px;
         margin-bottom: 5px;
         color: white;
      }
    </style>
</head>

<body>
    <?php include 'AdminReportPHP.php';?>
    <?php include "../admin_menu.view.php"?>

<div class="pdfcontainer">
<button id="pdfButton">Generate PDF</button>
<div id="generatePdf">

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

                        <li><a style="color: gray;">
                        OrderID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;CustomerID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Payment method
                        </a></li>

                            <?php while($record1=mysqli_fetch_assoc($resultorder)){?>
                                <li><a >
                                <?= $record1['order_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;<?= $record1['customer_id']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?= $record1['payment_method']?></a></li>
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

                        <li><a style="color: gray;">
                        OrderID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;CustomerID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Payment method
                        </a></li>

                            <?php while($record2=mysqli_fetch_assoc($resultnonorder)){?>
                                <li><a>
                                <?= $record2['order_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?= $record2['customer_id']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?= $record2['payment_method']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>

           </div>

           <!-- search Users by role-->
           <div class="box">
                <div class="container_left">

                <form class="search" method="POST" action="PDFreport.php" >
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

                        <li><a style="color: gray;">
                        UserID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;First name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Role
                        </a></li>

                            <?php while($record3=mysqli_fetch_assoc($queryusers)){?>
                                <li><a >
                                <?= $record3['user_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record3['fname']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record3['role']?></a></li>
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


                <form class="search" method="POST" action="PDFreport.php" >
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

                        <li><a style="color: gray;">
                        BlogID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Blog Title&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Date created
                        </a></li>

                            <?php while($record4=mysqli_fetch_assoc($query)){?>
                                <li><a >
                                <?= $record4['blog_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record4['title']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record4['date']?></a></li>
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
                    
                <form class="search" method="POST" action="PDFreport.php" >
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

                            <li><a style="color: gray;">
                            CoursesID &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Courses Title
                            </a></li>                      

                            <?php while($record4=mysqli_fetch_assoc($querycourse)){?>
                                <li><a >
                                <?= $record4['course_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record4['title']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</a></li>
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

</div> <!-- pdf -->
</div> <!-- pdf -->

        <script src="notification.js"></script>


        <!-- pdf -->
        <script>
            var button = document.getElementById("pdfButton");
            button.addEventListener("click", function () {
                var doc = new jsPDF("p", "mm", [300, 300]);
                var makePDF = document.querySelector("#generatePdf");
                // fromHTML Method
                doc.fromHTML(makePDF);
                doc.save("output.pdf");
            });
        </script>
        <!-- pdf -->
</body>
</html>