<!DOCTYPE html>
<html>

<head>
	<title>Insert Item Page</title>
</head>

<body>
	<center>
		<?php
        include('connection.php');  

		$itemname = $_REQUEST['item_name'];

		//check already existing users
		$query="SELECT * FROM item where item_name='$itemname'";

		$row=mysqli_query($con, $query);

		if(mysqli_num_rows($row)>0)
		{
			echo "Item Already Exists"; 
			exit;
		}
		else
		{
			// Taking all 5 values from the form data(input)
			$item_name = $_REQUEST['item_name'];
			$item_scientific_name = $_REQUEST['item_scientific_name'];
			$item_image = $_REQUEST['item_image'];
			
			
			// Performing insert query execution
			// here our table name is college
			$sql = "INSERT INTO item (item_name, item_scientific_name, item_image)
			VALUES ('$item_name', '$item_scientific_name', '$item_image')";
			
			if(mysqli_query($con, $sql)){
					
					header("Location:ItemInsertSuccessful.php");
					
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
