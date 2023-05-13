<?php
include"../database/database.php";

if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
  // Handle the upload error
}

$image_folder = "../images/";
$image_name = $_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_path = $image_folder . $image_name;

$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];
$image_allowed_types = ['image/jpeg', 'image/png'];

if (!in_array($image_type, $image_allowed_types)) {
  // Handle the file type error
}

if ($image_size > 10 * 1024 * 1024) {
  // Handle the file size error
}

if (move_uploaded_file($image_tmp_name, $image_path)) {
  // File was uploaded successfully

  $sql = "UPDATE `instructor` SET image = '$image_name'";
  $result = mysqli_query($conn, $sql);
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="image.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="image" />
  <input type="submit" value="Upload" />
</form>
</body>
</html>