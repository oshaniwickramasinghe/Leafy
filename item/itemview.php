<!-- PHP code to establish connection with the localserver -->
<?php
require "../database/database.php";
// require "../public/Auth.php";
// include "../Customer/includes/header.php";
include '../includes/header.view.php';


// SQL query to select data from database
$sql = " SELECT * FROM available_item ORDER BY item_id DESC ";
//$result = $mysqli->query($con, $sql);
$data = mysqli_query($conn, $sql); 
//$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>User Details</title>
	<link rel="stylesheet" type = "text/css" href = "itemstyle.css">
    <link rel="stylesheet" href="../admin/notification.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
        
</head>

<body>

<?php include "../admin/menu/admin_menu.view.php"?>
	<section>
		
    <div class = "loggedhome_body">
        <div class = "home_body">
            
            <a class="add" href="itemform.php " >Add new item</a>

            <table>
                <tr>
                    <th width="100px">Item ID</th>
                    <th width="100px">Item Name</th>
                    <th width="100px">Item Category</th>
                    <th width="600px">Image</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                    // LOOP TILL END OF DATA
                    while($rows=$data->fetch_assoc())
                    {
                ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    <td><?php echo $rows['item_id'];?></td>
                    <td><?php echo $rows['item_name'];?></td>
                    <td><?php echo $rows['category'];?></td>
                    <!-- <td><?php echo $rows['item_image'];?></td> -->
                    <td> <img src="./uploads/<?php echo $rows["item_image"];?>"></td>				
                    
                </tr>
                <?php
                    }
                ?>
            </table>

        </div>
    </div>
		
	</section>

</body>

</html>
