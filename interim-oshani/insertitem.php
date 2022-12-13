<!DOCTYPE html>
<html>

<head>
	<title>Insert Item Page</title>
</head>

<body>
	<center>
		<?php
        include('connection.php');  

		$item_name = $_REQUEST['item_name'];
		$item_scientific_name = $_REQUEST['item_scientific_name'];

		//check already existing users
		$query="SELECT * FROM item where item_name='$item_name'";

		$row=mysqli_query($con, $query);

		if(mysqli_num_rows($row)>0)
		{
			echo "Item Already Exists"; 
			exit;
		}
		else
		{

			$file_tmp1=$_FILES['image']['tmp_name'];
			$file_name1= "A"."$item_name".rand(1,1000).$_FILES['image']['name'];
			$target_file1="uploads/".$file_name1;
			if($file_tmp1!="")
			{
				move_uploaded_file($file_tmp1,$target_file1);
			}
			else{
				$file_name1="";
			}

			// Performing insert query execution
			$sql = "INSERT INTO item (item_name, item_scientific_name,image) VALUES ('$item_name', '$item_scientific_name','$file_name1')";
			
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
