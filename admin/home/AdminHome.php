<?php 
require "../../public/Auth.php";
include '../includes/header.php';
?>

<html>
   <head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="../../public/CSS/style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Home</title> 

   </head>

   <body>

   <?php include "../menu/admin_menu.view.php"?>

      <div class = "loggedhome_body">
         <div class = "home_body">

            <xul>
               <li>
                  <a href="post/Vegetable.php?page=1" >
                     <div class  = "container ">
                        <Button class = "btn">Products </Button>
                        <img src = "../../public/images/items.png" width = "300px" height = "300px" class = "responsive">
                     </div>
                  </a>
               </li>

               <li>
                  <a href="post/Vegetable.php?page=1" >
                     <div class  = "container ">
                        <Button class = "btn">Posts </Button>
                        <img src = "../../public/images/posts.png" width = "300px" height = "300px" class = "responsive">
                     </div>
                  </a>
               </li>

               <li>
                  <a href="post/Vegetable.php?page=1" >
                     <div class  = "container ">
                        <Button class = "btn">Courses </Button>
                        <img src = "../../public/images/course.png" width = "300px" height = "300px" class = "responsive">
                     </div>
                  </a>
               </li>

               <li>
                  <a href="post/Vegetable.php?page=1" >
                     <div class  = "container ">
                        <Button class = "btn">Blogs </Button>
                        <img src = "../../public/images/blogs.png" width = "300px" height = "300px" class = "responsive">
                     </div>
                  </a>
               </li>

            </xul>
         
         </div>
      </div>

   </body>


   <?php include '../../includes/footer.view.php'?>
</html>