<?php
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM item ORDER BY item_id DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["item_image"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>