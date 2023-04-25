<?php
 include '../includes/header.php';
 $user_ID = $_SESSION['USER_DATA']['user_id'];
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../course/session.css">
    <title>Session Page</title>
 </head>
 <body>
    <div class="container">
        <?php include "../includes/instructorMenu.php"; ?>
        <div class="create_form_wrapper">
            <div class="title">
                <h1>Create Session</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="view">
                    <div class="block">
                            <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        ?>
                                        <div class="message"> 
                                            <p><?php  echo $message;?></p>
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                        </div>
                                        
                            <?php
                                    }
                                }
                            ?>
                        <div class="forum" id="forum">
                            <form action="" method="post" enctype="multipart/form-data" id="step-form">
                                <div class="field">
                                    <div>
                                        <input type="hidden" name="course_id" value="<?= $course_ID;?>">
                                        <input type="hidden" name="date" value="<?= $date;?>">
                                        <input type="hidden" name="time" value="<?= $time;?>">
                                    </div>
                                    <div>
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" placeholder="Title of the session..." class="text_input" value="<?= $title; ?>" required><br>
                                    </div>
                                    <div class="description">
                                        <label for="description">Description about session</label><br><br>
                                        <textarea for="description" id="description" placeholder="Short description about the session..." name="description" class="text_input"  value=""  required><?= $description; ?></textarea><br>
                                    </div>
                                    <div class="content">
                                        <label for="content">Content</label><br><br>
                                        <div for="content1" class="content1" id="content1" name="content1"><?= $content1; ?></div>
                                    </div>
                                    <div class="quiz">
                                        <label for="mcq">MCQ question about the session</label><br><br>
                                        <textarea for="description" id="description" placeholder="Add a question for check course follwers knowledge..." name="description" class="text_input"  value=""  required><?= $description; ?></textarea><br>
                                        <label for="option_1">Add 4 options for the answer</label><br><br>
                                        <label for="asnwer">Answer for the question</label><br><br>
                                    </div> 
                                    <div class="images">
                                        <label for="image" >Image for the cover page of session</label><br><br>
                                    <div class="image">
                                    <?php 
                                    if($image == ''){
                                        echo '<img src="../images/placeholde.png" align="middle" width="60%" border-radius:50%>';
                                    }else{
                                        echo '<img src="../images/'.$image.'" align="middle" width="60%" border-radius:50%;>';
                                    }
                                    
                                    ?>
                                        <input type="hidden" name="oldimage1" value="<?= $image;?>">
                                        <input type="file" name="image" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>
                                        
                                    
                                    </div>
                                    </div>
                                </div>
                                    <div class="button-section">
                                 <!--   <button onclick="createTextAreas()" type="submit" class="btn" id="continue">Continue</button> -->
                                        <?php if($update == true) {?>
                                            <button type="submit" value="update" name="update" class="btn">Update</button>
                                        <?php } else {?>     
                                            <button type="submit" value="Save" name="save" class="btn" id="save-btn">Save</button>
                                        <?php } ?>   
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <footer>
           <?php include "../includes/footer.php";?>
    </footer>
 </body>
 </html>