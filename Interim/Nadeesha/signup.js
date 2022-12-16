function radio_input(url)
{
// Re-direct the browser to the url value
window.location.href =  'http://www.site.com/'  + url 
}

<?php 
    include'config.php';
    if(isset($_POST['submit'])){
        $first_name= mysqli_real_escape_string($conn,$_POST['first_name']);
        $last_name= mysqli_real_escape_string($conn,$_POST['last_name']);
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $contact_number= mysqli_real_escape_string($conn,$_POST['contact_number']);
        $password= mysqli_real_escape_string($conn,md5($_POST['password']));
        $cpassword= mysqli_real_escape_string($conn,md5($_POST['cpassword']));
        //$name= mysqli_real_escape_string($conn,$_POST['first name']);
        //$name= mysqli_real_escape_string($conn,$_POST['first name']);
        //$name= mysqli_real_escape_string($conn,$_POST['first name']);
        $image=$_FILES['image']['name'];
        $image_size=$_FILES['image']['size'];
        $image_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder='uploaded_img/'.$image;

        $select=mysqli_query($conn,"SELECT * FROM `instructor WHERE email='$email' AND
        password='$password'")or die('query failed');

        if(mysqli_num_rows($select)>0){
            $message[]='user already exist';
        }else{
            if($password != $cpassword){
                $message[]='confirm password not matched!';
            }elseif($image_size>2000000){
                $message[]="image size is too large!";
            }else{
                $insert = mysqli_query($conn, "INSERT INTO `instructor`(first_name,last_name,email,contact_number,password,image) 
                VALUES('$first_name','$last_name','$email','$contact_number','$password','$image')") or die('query failed');

                if($insert){
                    move_uploaded_file($image_tmp_name,$image_folder);
                    $message[]="registered successfully!";
                    header('location:login.php');
                }else{
                    $message[]="registered failed!";

                }
            }
        }
    }
?>




if(mysqli_query($conn,$sql)===TRUE)
{
    echo"<script>alert('Details Added');window.location.href='signup.php';</script>";
}
else{
    echo"Error: ".$sql2. "<br>" .mysqli_error($conn);
}

mysqli_close($conn);

}