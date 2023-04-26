
    <?php 

        require "../../database/database.php";
        require "../../public/Auth.php";
   

		$item_name = $_REQUEST['item_name'];
		$category = $_REQUEST['category'];

		//check already existing users
		$query="SELECT * FROM available_item where item_name='$item_name'";

		$row=mysqli_query($conn, $query);

		if(mysqli_num_rows($row)>0)
		{
			echo "Item Already Exists"; 
			exit;
		}
		else
		{

			$file_tmp1=$_FILES['image']['tmp_name'];
			$file_name1= "A"."$item_name".rand(1,1000).$_FILES['image']['name'];
			$target_file1="../uploads/".$file_name1;
			if($file_tmp1!="")
			{
				move_uploaded_file($file_tmp1,$target_file1);
			}
			else{
				$file_name1="";
			}

			// Performing insert query execution
			$sql = "INSERT INTO available_item (item_name, category,item_image) VALUES ('$item_name', '$category','$file_name1')";
			
			if(mysqli_query($conn, $sql)){
					
					header("Location:../../itemview.php");
					
			} else{
				echo "data not stored in database. $sql. "
					. mysqli_error($conn);
			}
		}
		
		
		// Close connection
		mysqli_close($conn);
		?>