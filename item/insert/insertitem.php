<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/CSS/style.css">
        <link rel="stylesheet" href="../../admin/notification.css">
        <!-- <link rel="stylesheet" href="../../instructor/profile/InstructorProfile.css"> -->
        <title>Admin view for profile</title>
        
        
</head>
    
	
	<?php 

        require "../../database/database.php";
        require "../../public/Auth.php";
		// include '../includes/header.php';
   

		$item_name = $_REQUEST['item_name'];
		$category = $_REQUEST['category'];

		//check already existing users
		$query="SELECT * FROM available_item where item_name='$item_name'";

		$row=mysqli_query($conn, $query);

		//call modal if item already exists
		if(mysqli_num_rows($row)>0)
		{

			?>

		<div class="container">
			<div id="id01" class="modal_delete" style="display: none;">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                
                <div class="modal_content_delete" action="">
                    <div class="container_delete">
                        <h1>Item already exists</h1>
                        <div class="clearfix_delete">
                            <button type="button" class="cancelbtn" onclick="hideModal()">Go back</button>
                        </div>
                    </div>
                </div>
            </div>   
		</div>

		<script >

			function showModal() {
				document.getElementById("id01").style.display = "flex";
				// retrieves the div element with the ID of id01 and sets its display style property to flex. This makes the modal box visible on the web page.
			}
			
			function hideModal() {
				document.getElementById("id01").style.display = "none";
				window.location.href = "../view/itemview.php";
				// retrieves the div element with the ID of id01 and sets its display style property to none. This makes the modal box hidden on the web page.
			}
		</script>

			<?php

			echo '<script>';
			echo 'showModal();'; 
			echo '</script>';
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