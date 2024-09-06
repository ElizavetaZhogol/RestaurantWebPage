
<!-- Insert data into the salad table -->

<?php include 'connect.php';

    // Get data from the salad form

    if(isset($_POST['addSalad'])){
        $foodName = $_POST['foodName'];
        $foodDescription = $_POST['foodDescription'];
        $foodPrice = $_POST['foodPrice'];
        $foodImage = $_FILES['foodImage']['name'];
        $foodImage_temp_name = $_FILES['foodImage']['tmp_name'];
        $foodImage_folder = 'foodImages/'.$foodImage;

        // Insert values

        $insertQuery = mysqli_query($conn, "insert into `salad` (name, description, price, image) values('$foodName', '$foodDescription', '$foodPrice', '$foodImage')")
        or die("Insert failed");
        if($insertQuery){
            move_uploaded_file($foodImage_temp_name, $foodImage_folder);
            $displayMessage = "Food insert successful";
        }
        else {
            $displayMessage = "There is some error inserting product";
        }
    }


    // Insert data into the pizza table

    if(isset($_POST['addPizza'])){

        // Get data from the pizza form

        $foodName = $_POST['foodName'];
        $foodDescription = $_POST['foodDescription'];
        $foodPrice = $_POST['foodPrice'];
        $foodImage = $_FILES['foodImage']['name'];
        $foodImage_temp_name = $_FILES['foodImage']['tmp_name'];
        $foodImage_folder = 'foodImages/'.$foodImage;

        // Insert values

        $insertQuery = mysqli_query($conn, "insert into `pizza` (name, description, price, image) values('$foodName', '$foodDescription', '$foodPrice', '$foodImage')")
        or die("Insert failed");
        if($insertQuery){
            move_uploaded_file($foodImage_temp_name, $foodImage_folder);
            $displayMessage = "Food insert successful";
        }
        else {
            $displayMessage = "There is some error inserting product";
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
    <link rel="stylesheet" href="addFood.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

   

    <!-- Header section -->

    <?php include('header.php') ?>

    <main>
        <!-- Message display -->

        <!-- + Container in which a php message will be displayed and closed -->

        <?php

            if(isset($displayMessage)){
                echo "<section class='displayMessage'>
            <span>$displayMessage</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </section>";
            }

        ?>

        <!-- Forms to add food to differen tables -->

        <section class="addFoodContainer">

            <!-- Header that tells to which table an item can be added -->

            <h3>Add Salad</h3>

            <form action="" class="addFoodForm" method="post" enctype="multipart/form-data">
                <input type="text" name="foodName" placeholder="Enter product name" class="inputFields" required>
                <input type="text" name="foodDescription" placeholder="Enter product description" class="inputFields" required>
                <input type="number" name="foodPrice" min="0" placeholder="Enter product price" class="inputFields" required>
                <input type="file" name="foodImage" class="inputFields" required accept="image/png, image/jpg, image/jpeg, image/webp">
                <input type="submit" name="addSalad" class="submitButton" value="Add Food">
            </form>

        </section>

        <section class="addFoodContainer">
            <h3>Add Pizza</h3>

            <form action="" class="addFoodForm" method="post" enctype="multipart/form-data">
                <input type="text" name="foodName" placeholder="Enter product name" class="inputFields" required>
                <input type="text" name="foodDescription" placeholder="Enter product description" class="inputFields" required>
                <input type="number" name="foodPrice" min="0" placeholder="Enter product price" class="inputFields" required>
                <input type="file" name="foodImage" class="inputFields" required accept="image/png, image/jpg, image/jpeg, image/webp">
                <input type="submit" name="addPizza" class="submitButton" value="Add Food">
            </form>

        </section>

    </main>

    <?php include('footer.php') ?>

<script src="script.js" defer></script>
    
</body>
</html>