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
    
     <div class="container">
     <div class="heading">Create post </div>
     <form action="user.php" method="get">
        <div class="postd">
            <div class=" card-box">
            <span class="details">Category</span>
            <select name="category"  class = "select">
                        <option value="Vegetable">Vegetable</option>
                        <option value="Fruit">Fruit</option>
                        <option value="seeds">Seeds</option>
           </select>
            </div>
            <span class="details">Name</span>
            <div class=" card-box">
            <input  type="text" placeholder="Enter name" name="fname" required>
            </div>
        

            <div class=" card-box">
            <span class="details">Location</span>
            <input type="text" placeholder="Enter Your location" name="flocation" required>
            
            </div>
            
            <div class=" card-box">
            <span class="details">Quantity</span>
            <input type="text" placeholder="" name="quantity" required>
            </div>

            <div class=" card-box">
            <span class="details">Minimum Quantity</span>
            <input type="text" placeholder="" name="miniquantity" required>
            </div>

        <div class=" card-box">
            <span class="details">Expiary Date</span>
            <input type="date" placeholder="" name="exdate" required>

        </div>
        <div class=" card-box">
            <span class="details">Price</span>
            <input type="text" placeholder="" name="price" required >

        </div>

        <div class=" card-box">
            <span class="details">Images</span>
            <input type="img" placeholder="upload images" name="img" >
            
        </div>
        <div >
            <input class="button" type="submit" value="Uplaod files">

        </div>

        <div >
            <input class="button" type="submit" value="Submit">
        </div>
     </form>

     </div>

   
</body>
</html>