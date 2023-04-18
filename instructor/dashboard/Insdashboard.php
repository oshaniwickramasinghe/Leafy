<?php
//including header file to page
include '../includes/header.php';

// get user ID by using session
$user_ID = $_SESSION['USER_DATA']['user_id'];

//there is not passing session value redirect to the login page
if(!isset($user_ID)){
    header('location:../login/login.php');
};

// get the total number of blogs in blog section
$sql_1="SELECT blog_id FROM blog";
$result_1= mysqli_query($conn,$sql_1);
$num_1 = mysqli_num_rows($result_1);

// get the total number of blogs which you created
$query_1="SELECT blog_id FROM blog WHERE user_id=$user_ID";
$record_1= mysqli_query($conn,$query_1);
$num_4 = mysqli_num_rows($record_1);


// get the total number of courses in course section
$sql_2="SELECT course_id FROM course";
$result_2= mysqli_query($conn,$sql_2);
$num_2 = mysqli_num_rows($result_2);

// get the total number of courses which you created
$query_2="SELECT course_id FROM course WHERE user_id=$user_ID";
$record_2= mysqli_query($conn,$query_2);
$num_5 = mysqli_num_rows($record_2);

// get the total number of questions from your courses
$sql_3="SELECT course_forum.question_id 
        FROM course_forum
        JOIN course ON course.course_id = course_forum.course_id
        WHERE course.user_id=$user_ID";

$result_3= mysqli_query($conn,$sql_3);
$num_3 = mysqli_num_rows($result_3);

// get the total number of courses which you created
$query_3="SELECT course_forum.question_id 
            FROM course_forum
            JOIN course ON course.course_id = course_forum.course_id
            WHERE course.user_id=$user_ID AND course_forum.answered=1";
$record_3= mysqli_query($conn,$query_3);
$num_6 = mysqli_num_rows($record_3);

$num_7=$num_3-$num_6;

//course followers graph


$sql_getdata = "SELECT DATE_FORMAT(ac.date_enrolled, '%Y-%m') AS month, 
                COUNT(*) AS followers, 
                COUNT(CASE WHEN ac.date_complete IS NOT NULL THEN 1 END) AS completions, 
                COUNT(CASE WHEN MONTH(ac.date_enrolled) = MONTH(NOW()) AND YEAR(ac.date_enrolled) = YEAR(NOW()) THEN 1 END) AS new_enrollments 
                FROM agriculturalist_course as ac 
                JOIN course ON course.course_id = ac.course_id
                WHERE course.user_id=7 
                AND ac.date_enrolled >= DATE_SUB(NOW(), INTERVAL 12 MONTH) 
                GROUP BY month";


// Format the data for Morris.js
    $data = array();
    $result_getdata = mysqli_query($conn,$sql_getdata);


    while ($row = mysqli_fetch_assoc($result_getdata)) {
        
    $month = $row['month'];
    $followers = intval($row['followers']);
    $completions = intval($row['completions']);
    $new_enrollments = intval($row['new_enrollments']);
    $data[] = array(
        'month' => $month,
        'followers' => $followers,
        'completions' => $completions,
        'new_enrollments' => $new_enrollments
    );
    
    }

// get the data for create donut chart
    $sql_donut = "SELECT COUNT(*) AS total, SUM(answered) AS answered, SUM(is_read) AS is_read FROM course_forum";
    $result = $conn->query($sql_donut);
    $data_1 = $result->fetch_assoc();


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--morris.js-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" integrity="sha512-fjy4e481VEA/OTVR4+WHMlZ4wcX/+ohNWKpVfb7q+YNnOCS++4ZDn3Vi6EaA2HJ89VXARJt7VvuAKaQ/gs1CbQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Insdashboard.css">
    <title>Instructor Home</title>
    

    
</head>
<body>
    <div class="main-container">
        <?php include "../includes/instructorMenu.php";  ?>
        <div class="details-container">
            <div class="first-part">
                <h1>Dashboard</h1S>
                <h3> Welcome <?php echo $fetch['fname']." ".$fetch['lname']; ?> </h3>
            </div> 
            <div class="view-wrap"> 
                   <div class="card-section">
                        <div class="num-course">
                            <div class="wrapper">
                                <h2>Courses</h2>
                                <div class="icon_course">
                                    <i class="fa-brands fa-readme" style="font-size:40px;color:black;"></i>
                                </div>
                            </div> 
                                <div class="table">
                                    <table>
                                        <tr>
                                        <th>Total</th>
                                        <td>:</td>
                                        <td><?=$num_2;?></td>  
                                        </tr>

                                        <tr>
                                        <th>My courses</th>
                                        <td>:</td>
                                        <td><?=$num_5;?></td>  
                                        </tr>
                                    </table>
                                </div>
                                
                        </div>
                        <div class="num-blog">
                            <div class="wrapper">
                                <h2>Blogs</h2>
                                <div class="icon_blog">
                                    <i class="fa-brands fa-blogger" style="font-size:45px;color:black;"></i>
                                </div>
                            </div>    
                                <div class="table">
                                    <table>
                                        <tr>
                                        <th>Total</th>
                                        <td>:</td>
                                        <td><?=$num_1;?></td>  
                                        </tr>

                                        <tr>
                                        <th>My blogs</th>
                                        <td>:</td>
                                        <td><?=$num_4;?></td>  
                                        </tr>
                                    </table>
                                </div>
                        </div>
                        <div class="num-question"> 
                            <div class="wrapper">
                                <h2>Questions</h2>

                                <div class="icon_question">
                                <i class="fa-solid fa-circle-question" style="font-size:40px;color:black;"></i>
                                </div>
                            </div>    
                                <div class="table">
                                    <table>
                                        <tr>
                                        <th>Total</th>
                                        <td>:</td>
                                        <td><?=$num_3;?></td>  
                                        </tr>

                                        <tr>
                                        <th>Answered </th>
                                        <td>:</td>
                                        <td><?=$num_6;?></td>  
                                        </tr>

                                        <tr>
                                        <th>Remaning</th>
                                        <td>:</td>
                                        <td><?=$num_7;?></td>  
                                        </tr>
                                    </table>
                                </div>        
                        </div>
                   </div>
                    <div class="graph-div">
                        <div class="course-graph" id="course-graph">
                            <h2>Reports about course follwers</h2>
                            <div id="bar_graph"></div>
                        </div>
                        <div class="question-graph" id="question-graph">
                            <h2>Report recieved questions</h2>
                            <div id="horizantal_bar_graph"></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
 
    <footer>
           <?php include "../includes/footer.php";?>
    </footer>
    <!--Jquery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" integrity="sha512-6Cwk0kyyPu8pyO9DdwyN+jcGzvZQbUzQNLI0PadCY3ikWFXW9Jkat+yrnloE63dzAKmJ1WNeryPd1yszfj7kqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js" integrity="sha512-tBzZQxySO5q5lqwLWfu8Q+o4VkTcRGOeQGVQ0ueJga4A1RKuzmAu5HXDOXLEjpbKyV7ow9ympVoa6wZLEzRzDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Morris.Bar({
            element: 'bar_graph',
            data: <?php echo json_encode($data); ?>,
            xkey: 'month',
            ykeys: ['followers', 'completions', 'new_enrollments'],
            labels: ['Followers', 'Completions', 'New Enrollments'],
            barColors: ['#6FB1FC', '#FFCE54', '#4ECDC4'],
            hideHover: 'auto',
            resize: true
            
        });  

        Morris.Donut({
        element: 'horizantal_bar_graph',
        data: [
        { label: "Answered", value: <?php echo $data_1['answered']; ?> },
        { label: "Not Answered", value: <?php echo $data_1['total'] - $data_1['answered']; ?> },
        { label: "Read", value: <?php echo $data_1['is_read']; ?> },
        { label: "Not Read", value: <?php echo $data_1['total'] - $data_1['is_read']; ?> }
        ]
     });
    </script>
</body>
</html>