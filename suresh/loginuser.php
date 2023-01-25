<?php

include "connect.php";

?>

<?php 

if (isset($_REQUEST["log"])) {
	$uname=$_REQUEST["uname"];
	$passw=$_REQUEST["passw"];

	$login_check=0;
	
	$sql = "SELECT * FROM `loginuser` WHERE uname = '$uname' && passw = '$passw'";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		$login_check=1;
		$uid=$row["uid"];
	}

	if($login_check==1)
	{
		$_SESSION["user"]=$uid;
        header("Location:createpost.php"); exit;
	}
	else
	{
		echo "<script>alert('Invalid login!'); window.location.href='login.php' ;</script>";
	}
}

?>


// if (isset($_SESSION['userid'])) {
//     header("Location: createpost.php");

// }



// if(isset($_POST['uname']) && isset($_POST['passw'])){
    // function validate($data){
    //     $data = trim($data);
    //     $data = stripcslashes($data);
    //     $data= htmlspecialchars($data);

    //     return $data;
    // }

//      $uname = $_POST['uname'];
//      $passw = $_POST['passw'];


//        if(empty($uname)){

//        }else if(empty($passw)){
        
//        }else{
//         $sql = "SELECT * FROM `loginuser` WHERE uname = '$uname' && passw = '$passw'";
//          $result = mysqli_query($conn,$sql);

//          if(mysqli_num_rows($result)=== 1){

//         $row_data = mysqli_fetch_assoc($result);
//         $_SESSION['user_id'] = $row_data['userid'];
       

//             header("Location:createpost.php");
//             exit();
//          }else{
//             header("Location: login.php?error=Incorrect username or password");
           

//             exit();
//          }
//        }
       
// }else{
//     header("Location:login.php");
//     exit();
// }

// 




