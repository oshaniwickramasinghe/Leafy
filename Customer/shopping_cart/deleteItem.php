
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>

    function delete(){
        if(confirm("Delete this item from the cart")== true){
            <?php

             if(isset($_POST['delete'])){
                unset($_SESSION['cart']['post_id']);
             }

            ?>
        }
    }

    </script>
</body>
</html>
