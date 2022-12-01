<?php
include 'connect.php';

echo "getting user details";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = "SELECT * FROM users WHERE user_id=$id";

    $result= mysqli_query($conn,$query1);

    if($result)
    {
        include 'NotificationView.php';
    }
    else{
        echo "unsuccessful";
    }

}
else{
    echo "value not found";
}

//$user_id=$_REQUEST["ID"];
//$sql="SELECT * FROM users WHERE user_id='user_id'";

// make query & get result2




?> 