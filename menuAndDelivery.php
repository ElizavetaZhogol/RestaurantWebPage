<?php include 'connect.php';

    // Get information about the item

    if(isset($_POST['addtoCart'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $quantity = 1;
        $quantityVisible = 0;

        // Select cart data based on condition

        $selectCart = mysqli_query($conn, "Select * from `cart` where name='$name'");
        if(mysqli_num_rows($selectCart)<1){

            // Insert data into cart table

            $insertFood = mysqli_query($conn, "Insert into `cart` (name, description, price, image, quantity)
            values ('$name', ' $description', '$price', '$image', $quantity)");         
            $quantityVisible = 1;
        }
        
        if(mysqli_num_rows($selectCart)>0){
            $selctQuantity = mysqli_query($conn, "Select quantity from `cart` where name='$name'");
            $fetchSelectQuantity = mysqli_fetch_assoc($selctQuantity);
            $quantityVisible = $fetchSelectQuantity['quantity'];
            $quantityVisible = $quantityVisible + 1;
            $updateQuantityQuery = mysqli_query($conn, "Update `cart` set quantity=$quantityVisible where name='$name'");
        }
    }


    // Delte from cart or decrease quantity

    if(isset($_POST['deleteFromCart'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $quantity = 1;
        $quantityVisible = 0;

        // Select cart data based on condition

        $selectCart = mysqli_query($conn, "Select * from `cart` where name='$name'");

        $selctQuantity = mysqli_query($conn, "Select quantity from `cart` where name='$name'");
        $fetchSelectQuantity = mysqli_fetch_assoc($selctQuantity);
        $quantityVisible = $fetchSelectQuantity['quantity'];

        // Update item quantity in the cart table if the quantity is more than one
        
        if($quantityVisible > 1){
            $quantityVisible = $quantityVisible - 1;
            $updateQuantityQuery = mysqli_query($conn, "Update `cart` set quantity=$quantityVisible where name='$name'");
        }

        if($quantityVisible == 1){  
            
            // Delete from cart table

            mysqli_query($conn, "Delete from `cart` where name='$name'");
            $quantityVisible = 0;
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu and Delivery</title>
    <link rel="stylesheet" href="styleMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- Header section -->

    <?php include('header.php') ?>

    <main>

        <!-- A slider with the sections of the menu that will transport users to a specific dish type -->

        <section class="wrapper">

            <!-- Arrow to slide left -->

            <i id="leftArrow" class="fa-solid fa-circle-chevron-left fa-3x slideButton" style="color: #000000;"></i>
            <ul class="carousel">
                <li class="card card1">
                    <h4>Salad</h4>
                    <h6><a href='#salad'>See on the menu<i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></a></h6>
                </li>

                <li class="card card2">
                    <h4>Pizza</h4>
                    <h6><a href='#pizza'>See on the menu<i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></a></h6>
                </li>

                <li class="card card3">
                    <h4>Pasta</h4>
                    <h6>See on the menu<i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></h6>
                </li>

                <li class="card card1">
                    <h4>Salad</h4>
                    <h6>See on the menu<i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></h6>
                </li>

                <li class="card card2">
                    <h4>Pizza</h4>
                    <h6>See on the menu<i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i><br></h6>
                </li>

                <li class="card card3">
                    <h4>Pasta</h4>
                    <h6>See on the menu<i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></h6>
                </li>
            </ul>

            <!-- Arrow to slide right -->

            <i id="rightArrow" class="fa-solid fa-circle-chevron-right fa-3x slideButton" style="color: #000000;"></i>
        </section>

        <!-- Script to move the carousel items -->

        <script>
            // Get the carousel and the arrows
            const carousel = document.querySelector('.carousel');
            const leftArrow = document.getElementById('leftArrow');
            const rightArrow = document.getElementById('rightArrow');

            // Get the width of the carousel
            const carouselWidth = carousel.offsetWidth;

            // Get the number of cards
            const cards = document.querySelectorAll('.card');
            const numCards = cards.length;

            // Set the current index
            let currentIndex = 0;

            // Function to move the carousel to the left
            function moveLeft() {
                if (currentIndex > 0) {
                    currentIndex--;
                    carousel.scrollLeft -= carouselWidth / 3;
                }
            }

            // Function to move the carousel to the right
            function moveRight() {
                if (currentIndex < numCards - 3) {
                    currentIndex++;
                    carousel.scrollLeft += carouselWidth / 3;
                }
            }

            // Add event listeners to the arrows
            leftArrow.addEventListener('click', moveLeft);
            rightArrow.addEventListener('click', moveRight);
        </script>

        <!-- The menu part of the website where people can both see what’s on the menu and add items to the shopping cart  -->

        <!-- Added a header to salad table to mark this section -->

        <section class="saladHeader">
            <h2 id='salad'>Salad</h2>
        </section>

        <!-- Display items from a required table -->

        <section class="saladWrapper">
            <ul class="saladCarousel">

                    <?php
                
                        $selectFood = mysqli_query($conn, "Select * from `salad`");
                        if(mysqli_num_rows($selectFood)>0){
                            while($fetchFood=mysqli_fetch_assoc($selectFood)){

                                // Set quantity in the cart for each item

                                $name = $fetchFood['name'];

                                $selctQuantity = mysqli_query($conn, "Select quantity from `cart` where name='$name'");
                                if(mysqli_num_rows($selctQuantity)<1){
                                    $quantityVisible = 0;
                                }
                                if(mysqli_num_rows($selctQuantity)>0){
                                    $fetchSelectQuantity = mysqli_fetch_assoc($selctQuantity);
                                    $quantityVisible = $fetchSelectQuantity['quantity'];  
                                }
                                  
                    ?>

                <li class="saladCard saladCard1">
                    <form action="" method="post">

                        <!-- An image of the dish -->

                        <figure>
                            <img src="foodImages/<?php echo $fetchFood['image'] ?>" alt="<?php echo $fetchFood['name'] ?>" style="width: 400px; height: 400px;"/>
                        </figure>

                        <!-- A dish name and the ingredients  -->

                        <h4><?php echo $fetchFood['name'] ?></h4>
                        <p>Ingredients:  <?php echo $fetchFood['description'] ?></p> 

                        <!-- The price and shopping cart button to add items to the wish list -->

                        <section class="priceAndQuantity">
                            <span class="price">Price: <b><?php echo $fetchFood['price'] ?> &#8364;</b></span>
                            <section>
                                <input type="hidden" name="name" value="<?php echo $fetchFood['name'] ?>">
                                <input type="hidden" name="description" value="<?php echo $fetchFood['description'] ?>">
                                <input type="hidden" name="price" value="<?php echo $fetchFood['price'] ?>">
                                <input type="hidden" name="image" value="<?php echo $fetchFood['image'] ?>">
                                <button type="submit" name="deleteFromCart"><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i> <span>-</span></button>


                                <input type="text" min="0" value="<?php echo $quantityVisible ?>">


                                <button type="submit" name="addtoCart"><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i> <span>+</span></button>
                            </section>
                        </section>
                    </form>
                </li>

                    <?php
                            }
                        }
                        else{
                            echo"no products";
                        }

                    ?>
            </ul>
        </section>

        <!-- Header for a section to display items from another table -->

        <section class="saladHeader">
            <h2 id='pizza'>Pizza</h2>
        </section>

        <section class="saladWrapper">
            <ul class="saladCarousel">

                    <?php
                
                        $selectFood = mysqli_query($conn, "Select * from `pizza`");
                        if(mysqli_num_rows($selectFood)>0){
                            while($fetchFood=mysqli_fetch_assoc($selectFood)){

                                // Set quantity in the cart for each item

                                $name = $fetchFood['name'];

                                $selctQuantity = mysqli_query($conn, "Select quantity from `cart` where name='$name'");
                                if(mysqli_num_rows($selctQuantity)<1){
                                    $quantityVisible = 0;
                                }
                                if(mysqli_num_rows($selctQuantity)>0){
                                    $fetchSelectQuantity = mysqli_fetch_assoc($selctQuantity);
                                    $quantityVisible = $fetchSelectQuantity['quantity'];  
                                }
                                  
                    ?>

                <li class="saladCard saladCard1">
                    <form action="" method="post">

                        <!-- An image of the dish -->

                        <figure>
                            <img src="foodImages/<?php echo $fetchFood['image'] ?>" alt="<?php echo $fetchFood['name'] ?>" style="width: 400px; height: 400px;"/>
                        </figure>

                        <!-- A dish name and the ingredients  -->

                        <h4><?php echo $fetchFood['name'] ?></h4>
                        <p>Ingredients:  <?php echo $fetchFood['description'] ?></p> 

                        <!-- The price and shopping cart button to add items to the wish list -->

                        <section class="priceAndQuantity">
                            <span class="price">Price: <b><?php echo $fetchFood['price'] ?> &#8364;</b></span>
                            <section>
                                <input type="hidden" name="name" value="<?php echo $fetchFood['name'] ?>">
                                <input type="hidden" name="description" value="<?php echo $fetchFood['description'] ?>">
                                <input type="hidden" name="price" value="<?php echo $fetchFood['price'] ?>">
                                <input type="hidden" name="image" value="<?php echo $fetchFood['image'] ?>">
                                <button type="submit" name="deleteFromCart"><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i> <span>-</span></button>


                                <input type="text" min="0" value="<?php echo $quantityVisible ?>">


                                <button type="submit" name="addtoCart"><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i> <span>+</span></button>
                            </section>
                        </section>
                    </form>
                </li>

                    <?php
                            }
                        }
                        else{
                            echo"no products";
                        }

                    ?>
            </ul>
        </section>

    </main>

     <!-- The footer section of the website  -->

    <?php include('footer.php') ?>

    <script src="script.js" defer></script>

</body>
</html>