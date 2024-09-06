<?php include 'connect.php';

    // Update query for item quantity of the cart

    


    // Delete a specific item from the cart

    if(isset($_GET['remove'])){
        $removeId = $_GET['remove'];
        mysqli_query($conn, "Delete from `cart` where id = $removeId");
        header('location:shoppingCart.php');
    }

    // Delete all items from the cart

    if(isset($_GET['deleteAll'])){
        mysqli_query($conn, "Delete from `cart`");
        header('location:shoppingCart.php');
    }


    

    if(isset($_POST['addtoCart'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $quantity = 1;

        // Select cart data based on condition

        $selectCart = mysqli_query($conn, "Select * from `cart` where name='$name'");
        if(mysqli_num_rows($selectCart)>0){
            echo"product already in the cart";
        }
        else{

            // Insert data into cart table

            $insertFood = mysqli_query($conn, "Insert into `cart` (name, description, price, image, quantity)
            values ('$name', ' $description', '$price', '$image', $quantity)");
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="styleShoppingCart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- Header section -->

    <?php include('header.php') ?>

    <?php

    // Query to update quantity for a specific item

    if(isset($_POST['updateQuantityButton'])){
        $updateValue = $_POST['updateQuantity'];
        $updateId = $_POST['updateQuantityId'];

        $rowCount = $rowCount + $updateValue;

        $updateQuantityQuery = mysqli_query($conn, "Update `cart` set quantity=$updateValue where id=$updateId");


        if($updateQuantityQuery){
            header('location: shoppingCart.php');
        }

    }

    ?>

    <main>

        <h1>Your order</h1>

        <table>

            <!-- Get and display all items in the cart table -->

            <?php

                $selectCartItems = mysqli_query($conn, "Select * from `cart`");
                $num = 1;
                $grandTotal = 0;
                if(mysqli_num_rows($selectCartItems)>0){
                    echo "
                    
            <thead>
                <th>Sl No</th>
                <th>Dish Name</th>
                <th>Dish Image</th>
                <th>Ingredients</th>
                <th>Dish price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                    ";

                    while($fetchCartItems = mysqli_fetch_assoc($selectCartItems)){
            
            ?>

                <tr>
                    <td><?php echo $num ?></td>

                    <!-- Name of the dish -->

                    <td><?php echo $fetchCartItems['name'] ?></td>

                    <!-- Dish image -->

                    <td>
                        <img src="foodImages/<?php echo $fetchCartItems['image'] ?>" alt="<?php echo $fetchCartItems['name'] ?>" style="width: 200px; height: 200px;">
                    </td>

                    <!-- Dish ingredients -->

                    <td><?php echo $fetchCartItems['description'] ?></td>

                    <!-- Dish price -->

                    <td><?php echo $fetchCartItems['price'] ?></td>
                    <td>

                        <!-- Dish quantity -->

                        <form action="" method="post">
                            <input type="hidden" value="<?php echo $fetchCartItems['id'] ?>" name="updateQuantityId">
                            <input type="number" min="1" value="<?php echo $fetchCartItems['quantity'] ?>" name="updateQuantity">
                            <input type="submit" value="Update" name="updateQuantityButton">
                        </form>
                    </td>

                    <!-- Dish total price -->

                    <td><?php echo $subtotal = number_format($fetchCartItems['price'] * $fetchCartItems['quantity']) ?></td>

                    <!-- Remove button for a specific dish type -->

                    <td>
                        <a href="shoppingCart.php?remove=<?php echo $fetchCartItems['id'] ?>" onclick="return confirm('Are you sure you want to delete this item')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

            <?php

                // Get total price for all cart items

                $grandTotal += ($fetchCartItems['price'] * $fetchCartItems['quantity']);
                $num++;
                    }

                }
                else{
                    echo "
                    
                        <h2>Your cart is empty</h2>
                    
                    ";
                }

            ?>

            </tbody>
        </table>

        <!-- Display the bottom section only when there are products in the cart -->

        <?php

                if($grandTotal > 0){
                    echo "
                     
                        <!-- Bottom area with more action options -->

                        <section class='actionOptions'>

                            <a href='menuAndDelivery.php'>Continue Shopping</a>

                            <a class='checkoutLink' href='checkout.php'>Proceed to checkout</a>

                            <h3>Grand total: <span> $grandTotal </span> &#8364;</h3>
                        </section>                    
                    ";

                    ?>

                    <!-- Delete all items from the cart button -->

                    <a class="clearCartButton" href="shoppingCart.php?deleteAll"><i class="fas fa-trash"></i>Clear cart</a>

                    <?php
                }
                else{
                    echo"";
                }

        ?>

    </main>

    <?php include('footer.php') ?>

<script src="script.js" defer></script>

</body>
</html>