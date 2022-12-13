<!-- PHP code to establish connection with the localserver -->
<?php
include('connection.php');  

// SQL query to select data from database
$sql = " SELECT * FROM users ORDER BY user_id DESC ";
//$result = $mysqli->query($con, $sql);
$result = mysqli_query($con, $sql); 
//$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>GFG User Details</title>
	<link rel = "stylesheet" type = "text/css" href = "style.css">
	
</head>

<body>
	<div class="header">
        <h1>Leafy</h1>
    </div>
	<section>
		<h1>Users of Leafy</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>User ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Contact Number</th>
				<th>Role</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['user_id'];?></td>
				<td><?php echo $rows['first_name'];?></td>
				<td><?php echo $rows['last_name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['contact_no'];?></td>
				<td><?php echo $rows['role'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>

	
    <div class="footer">
        <p>Click here to go to home page
            <a href="home.php">
                <button id="logout">Home</button>
            </a>
        </p>
    </div>
</body>

</html>
