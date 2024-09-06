<!-- php connection to database -->

<?php include 'connect.php';

    // Update items in the table

    if(isset($_POST['updateSalad'])){
        $updateId = $_POST['updateId'];
        $updateName = $_POST['updateName'];
        $updateDescription = $_POST['updateDescription'];
        $updatePrice = $_POST['updatePrice'];
        $updateImage = $_FILES['updateImage']['name'];
        $updateImage_tmp_name = $_FILES['updateImage']['tmp_name'];
        $updateImage_image_folder = 'foodImages/'.$updateImage;
    
        $updateQuery = mysqli_query($conn, "Update `salad` set name='$updateName', description='$updateDescription', price='$updatePrice', image='$updateImage' where id=$updateId");
    
        if($updateQuery){
            move_uploaded_file($updateImage_tmp_name, $updateImage_image_folder);
            header('location: viewFood.php');
        } 
        else {
            $displayMessage = "There is some error in updating product";
        }
    }

    if(isset($_POST['updatePizza'])){
        $updateId = $_POST['updateId'];
        $updateName = $_POST['updateName'];
        $updateDescription = $_POST['updateDescription'];
        $updatePrice = $_POST['updatePrice'];
        $updateImage = $_FILES['updateImage']['name'];
        $updateImage_tmp_name = $_FILES['updateImage']['tmp_name'];
        $updateImage_image_folder = 'foodImages/'.$updateImage;
    
        $updateQuery = mysqli_query($conn, "Update `pizza` set name='$updateName', description='$updateDescription', price='$updatePrice', image='$updateImage' where id=$updateId");
    
        if($updateQuery){
            move_uploaded_file($updateImage_tmp_name, $updateImage_image_folder);
            header('location: viewFood.php');
        } 
        else {
            $displayMessage = "There is some error in updating product";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestaurantName</title>
    <link rel="stylesheet" href="styleMenu.css">
    <link rel="stylesheet" href="styleUpdate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- The navigation of the website for the header section -->

    <?php include('header.php') ?>

    <main>

        <!-- Message display -->

        <!-- + Container in which a php message will be displayes and closed -->

        <?php

            if(isset($displayMessage)){
                echo "<section class='displayMessage'>
            <span>$displayMessage</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </section>";
            }

        ?>

        <!-- Form for editing files that are alredy inside a table -->
        
        <section class="updateContainer">
            <h2>Update Salad</h2>

            <?php
 
                if(isset($_GET['editSalad'])){
                    $editId = $_GET['editSalad'];
                    $editQuery = mysqli_query($conn, "Select * from `salad` where id=$editId");
                    if(mysqli_num_rows($editQuery)>0){
                        $fetchData = mysqli_fetch_assoc($editQuery);
                            
            ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <img src="foodImages/<?php echo $fetchData['image'] ?>" alt="<?php echo $fetchData['name'] ?>" style="width: 200px; height: 200px;">
                    <input type="hidden" value="<?php echo $fetchData['id'] ?>" name="updateId">
                    <input type="text" value="<?php echo $fetchData['name'] ?>" name="updateName">
                    <input type="text" value="<?php echo $fetchData['description'] ?>" name ="updateDescription">
                    <input type="number" value="<?php echo $fetchData['price'] ?>" name="updatePrice">
                    <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp" name="updateImage">
                    <div class="containerButtons">
                        <input type="submit" value="Update" name="updateSalad">
                    </div>
                </form>

            <?php
                    }
                }

            ?>

        </section>


        <section class="updateContainer">
            <h2>Update Pizza</h2>

            <?php
 
                if(isset($_GET['editPizza'])){
                    $editId = $_GET['editPizza'];
                    $editQuery = mysqli_query($conn, "Select * from `pizza` where id=$editId");
                    if(mysqli_num_rows($editQuery)>0){
                        $fetchData = mysqli_fetch_assoc($editQuery);
                            
            ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <img src="foodImages/<?php echo $fetchData['image'] ?>" alt="<?php echo $fetchData['name'] ?>" style="width: 200px; height: 200px;">
                    <input type="hidden" value="<?php echo $fetchData['id'] ?>" name="updateId">
                    <input type="text" value="<?php echo $fetchData['name'] ?>" name="updateName">
                    <input type="text" value="<?php echo $fetchData['description'] ?>" name ="updateDescription">
                    <input type="number" value="<?php echo $fetchData['price'] ?>" name="updatePrice">
                    <input type="file" accept="image/png, image/jpg, image/jpeg, image/webp" name="updateImage">
                    <div class="containerButtons">
                        <input type="submit" value="Update" name="updatePizza">
                    </div>
                </form>

            <?php
                    }
                }

            ?>

        </section>

    </main>
    
    <?php include('footer.php') ?>

    <script src="script.js" defer></script>
    
</body>
</html>