<?php 

//require "connect.php";
include 'connect.php';      
      

  if(isset($_GET['deleteUID']))
  {
      
      $blog_id = $_GET['deleteUID'];
      $sql2 = "DELETE FROM blog WHERE blog_id=$blog_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'deleted';

      // $sql1 = "SELECT * FROM blog WHERE blog_id=$blog_id ";
      // //DELETE FROM `blog` WHERE blog_id=1;
      // $result1=mysqli_query($conn,$sql1);
      
      // if($result1)
      // { 
                     
      //     while($recordcustomer = mysqli_fetch_assoc($result1))
      //     {
      //         $user_id=$recordcustomer['user_id'];
      //         echo $user_id;
              
 
      //     }

      // }

      // $blog_id = $_GET['UID'];
      // $sql2 = "DELETE FROM blog WHERE blog_id=$blog_id";
      
      // $function = "CREATE FUNCTION DeleteBlog()
      // RETURNS FLOAT
      // AS
      // BEGIN
        
      //   $result2=mysqli_query($conn,$sql2);
      // END";

      // $result2=mysqli_query($conn,$sql2);



      

  }


  if(isset($_GET['acceptUID']))
  {

      $blog_id = $_GET['acceptUID'];
      $sql2 = "UPDATE blog SET Verified=1 WHERE blog_id=$blog_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'updated';

  }

    

?>

<?php
    if(isset($_GET['UID']))
    {?>
      <a href="AdminBlogView.php ?deleteUID=<?=$_GET['UID'] ?>" >Delete</a>
      <!-- <button onclick="AdminBlogView.php ?deleteUID=<?=$_GET['UID'] ?>"  type="button" id="Delete">Delete</button> -->
      <!-- <button type="button" id="Accept">Accept</button> -->
      <a href="AdminBlogView.php ?acceptUID=<?=$_GET['UID'] ?>" >Accept</a>

      <?php 
    }
?>





