
if(isset($_POST['add'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $additionalInfo = $_POST['additional-info'];
    $image = $_FILES['image'];

    $imagefilename = $image['name'];
    $imagefileerror = $image['error'];
    $imagefiletemp = $image['tmp_name'];
    $filename_separate=explode('.', $imagefilename);
    $file_extension=strtolower(end($filename_separate));

    $extension = array('jpeg', 'jpg', 'png');

    if(in_array($file_extension, $extension)){

        $upload_image='images/'.$imagefilename;

        move_uploaded_file($imagefiletemp, $upload_image);

        $sql = "insert into `raw_material` (product_name, price, quantity, product_description, raw_image) values ('$name', '$price', '$quantity', '$additionalInfo', '$upload_image')";

        $result = mysqli_query($conn, $sql);
        if(!$result){
            
            die(mysqli_error($conn));

        }
    }
}
