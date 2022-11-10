<!DOCTYPE html>
<html>

<head>
	<title>Insert Page</title>
</head>

<body>
	<center>
		<?php
        include('connection.php');  
		
		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$email = $_REQUEST['email'];
		$contactNo = $_REQUEST['contactNo'];
		$passward = $_REQUEST['passward'];
		$role = $_REQUEST['role'];
		
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO users (first_name, last_name, email,contact_no,passward,role)
		VALUES ('$first_name', '$last_name', '$email','$contactNo','$passward','$role')	";
		
		if(mysqli_query($con, $sql)){
				
				header("Location:insert_successful.php");
				
		} else{
			echo "data not stored in database. $sql. "
				. mysqli_error($con);
		}
		
		// Close connection
		mysqli_close($con);
		?>
	</center>
</body>

</html>
