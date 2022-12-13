<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>create post</title>
     <link rel="stylesheet" href="createpost.css">
</head>




<body>

     <h2>Create Post</h2>

     <form action="user.php" method="post" enctype="multipart/form-data">


          <!-- <h1>Create Post</h1> -->

          <span class="details">Category</span><br>
          <select class="select" name="category" class="select">
               <option value="Vegetable">Vegetable</option>
               <option value="Fruit">Fruit</option>
               <option value="seeds">Seeds</option>
          </select><br>


          <label for="uname">Name</label><br>
          <input type="text" placeholder="Enter item name" id="fname" name="fname" required><br>

          <label for="uname">Location</label><br>
          <input type="text" placeholder="Enter Your location" id="flocation" name="flocation" required><br>

          <label for="uname">Quantity</label><br>
          <input type="text" placeholder="Quantity" id="quantity" name="quantity" required><br>


          <label for="uname">Minimum Quantity</label><br>
          <input type="text" placeholder="Enter Minimum Quantity" id="miniquantity" name="miniquantity" required><br>


          <label for="uname">Expiary Date</label><br>
          <input class="select" type="date" placeholder="Enter Expiary Date" id="exdate" name="exdate" required><br>


          <label for="uname">Price</label><br>
          <input type="text" placeholder="price" id="price" name="price" required><br>


          <label for="uname">Images</label><br>
          <input type="file" placeholder="upload images" id="image" name="img" accept="images/jpg,images.jpeg,images/png" required><br>


          <!-- <input class="button" type="submit" value="Uplaod files"><br><br> -->


          <input type="submit" class="btn btn-primary w-100 " value="Submit" name=""></input>

     </form>




</body>

</html>