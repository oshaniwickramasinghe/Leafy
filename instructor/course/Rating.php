<?php
include "../includes/header.php";

$course_id=$_GET['course'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Rating.css">
    <title>Course Ratings</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
  <!-- for the rating and review of the customer -->
    <div class="rateReview">
        <h1>Rate The Course</h1><br>
        <div class="form">
            <form action="Ratedb.php" method="POST">  
                <div class="centerr">
                    <label for="rating">Rating:</label><br>
                        <fieldset class="rating">
                            <input type="radio"  class  ="star"id="star5" name="rating" value="5"/><label for="star5" class="full" title="Awesome"></label>
                            <input type="radio" class  ="star"id="star4.5" name="rating" value="4.5"/><label for="star4.5" class="half"></label>
                            <input type="radio" class  ="star"id="star4" name="rating" value="4"/><label for="star4" class="full"></label>
                            <input type="radio" class  ="star"id="star3.5" name="rating" value="3.5"/><label for="star3.5" class="half"></label>
                            <input type="radio" class  ="star"id="star3" name="rating" value="3"/><label for="star3" class="full"></label>
                            <input type="radio" class  ="star"id="star2.5" name="rating" value="2.5"/><label for="star2.5" class="half"></label>
                            <input type="radio" class  ="star"id="star2" name="rating" value="2"/><label for="star2" class="full"></label>
                            <input type="radio" class  ="star"id="star1.5" name="rating" value="1.5"/><label for="star1.5" class="half"></label>
                            <input type="radio" class  ="star"id="star1" name="rating" value="1"/><label for="star1" class="full"></label>
                            <input type="radio" class  ="star"id="star0.5" name="rating" value="0.5"/><label for="star0.5" class="half"></label>
                        </fieldset><br><br>

                    <label for="comment">Your Review:</label><br><br>
                    <textarea id="comment" name="comment" rows="5" required></textarea><br>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
<footer><?php include "../includes/footer.php"?></footer>  
</body>
</html>