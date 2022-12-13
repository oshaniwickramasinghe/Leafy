
<?php 

include "connect.php";

session_start();

if (isset($_POST['submit'])) {

	$uname = $_POST['uname'];
	$crpass= $_POST['crpass'];
    $newpass= $_POST['newpass'];
    $cpass= $_POST['cpass'];


    $query = mysqli_query($conn,"SELECT uname,passw from loginguser where uname='$uname' AND
     passw='$crpass'");

     $num = mysqli_fetch_array($query);

     if($num>0){
     $conn = mysqli_query($conn,"UPDATE loginguser set passw ='$newpass' where uname ='$uname'");

     $_SESSION['msg1'] ="Password Change Successfully";
     }else{
    $_SESSION['msg1'] ="Password does not match";

     }
     
     }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
</head>
<body>
<h1>   </h1>
<link rel = "stylesheet" href = "change.css">
<p style="color: red;"> <?php echo $_SESSION['msg1'];?><?php $_SESSION['msg1'] ="";?> </p>
    <form action = "change.php" method="post">
   

    
            <label for = "uname">Username</label><br>
             <input type = "text" placeholder = "Enter your email" id = "uname"   name = "uname" required><br>
             <label for = "password">current Password</label><br>
             <input type = "password" placeholder = "Enter current Password" id = "crpass"    name = "crpass" required><br>
             <label for = "password">New password</label><br>
             <input type = "password" placeholder = "Enter your new Password" id = "newpass"   name = "newpass" required><br>
             <label for = "password">conform Password</label><br>
             <input type = "password" placeholder = "Enter new Password" id = "cpass"    name = "cpass" required><br>
             <br>
              
            
             
             <input type = "submit" class = "btn btn-primary w-100 " value = "Change Password" name = ""></input>
          </div>
         

    </form>
    
</body>
</html>