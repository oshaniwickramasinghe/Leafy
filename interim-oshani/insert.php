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
		$passward = md5($_POST['passward']);
		$conpassward = md5($_POST['conpassward']);
		//$passward = $_REQUEST['passward'];
		//$conpassward = $_REQUEST['conpassward'];
		$role = $_REQUEST['role'];
		
		

		//check already existing users
		$query="SELECT * FROM users where email='$email'";

		$row=mysqli_query($con, $query);

		if(mysqli_num_rows($row)>0)
		{
			echo "Email Id Already Exists"; 
			exit;
		}
		elseif($passward!=$conpassward)
		{
			echo "Password do not match"; 
			exit;
		}
		else
		{
			$passward = md5($passward);
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
		}
		
		
		// Close connection
		mysqli_close($con);
		?>
	</center>
</body>

</html>
