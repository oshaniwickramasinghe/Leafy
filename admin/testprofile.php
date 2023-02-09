    
        <div class="profile">
            <div class="profile-text">
                <h1>Profile</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="profile-image">
                    <!-- <div class="image">
                    <?php

                    // if($fetch['image'] == ''){
                    //     echo '<img src="images/profile-img.jpg" align="middle" width="100%" border-radius:50%>';
                    // }else{
                    //     echo '<img src="./images/'.$fetch['image'].'" align="middle" width="100%" border-radius:50%;>';
                    // }
            
                    ?> -->
                    <!--</div> -->
                    <!--<h3><?php //echo $fetch['first_name']." ".$fetch['last_name']; ?></h3>-->
                    
                </div>
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
                        <div class="view-div" id="view-div">
                            <form action="" method="post" enctype="multipart/form-data">
                                        <span>User ID :</span>
                                        <input type="text" name="user_ID" value="<?=$user_id ?>" class="box"  readonly><br>
                                        <span>First Name :</span>
                                        <input type="text" name="first_name" value="<?=$first_name ?>" class="box"  readonly><br>
                                        <span>Last Name :</span>
                                        <input type="text" name="last_name" value="<?=$email ?>" class="box"  readonly><br>
                                        <span>Email :</span>
                                        <input type="text" name="email" value="<?=$role ?>" class="box"  readonly><br>
                                        <span>Contact Number :</span>
                                        <input type="text" name="cnumber" value="<?=$house_no ?>" class="box"  readonly><br>
                                        <span>Occupation:</span>
                                        <input type="text" name="occupation" value="<?=$lane ?>" class="box"  readonly><br>
                                        <span>Specialized Area :</span>
                                        <input type="text" name="specialized_area" value="<?=$city ?>" class="box"  readonly><br>
                                        
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>