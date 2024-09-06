<header>

        <!-- Query to show number of items in the cart -->

        <?php include('connect.php');

            $selectCartNumber = mysqli_query($conn, "Select sum(quantity) as total from `cart`") or die('query failed');
            $fetchQuantityCart = mysqli_fetch_assoc($selectCartNumber);
            $allQuantityCart = $fetchQuantityCart['total'];
            
        ?>

        <!-- Navigation bar for the big screen -->

        <nav class="mainNavigation">
            <ul>

                <!-- Link for the home page covered by a logo image -->

                <li class="logo"><a href="index.php">Home</a></li>

                <!-- Link for the home page -->

                <li><a href="index.php">Home</a></li>

                <!-- Link for the menu page with a dropdown arrow -->

                <li class="dropDownMenu"><a href="menuAndDelivery.php"><p>Menu</p> <p>and</p> <p>Delivery</p></a><i class="fa-solid fa-chevron-down fa-sm dropDownArrow" id="dropDownArrow" style="color: #ffffff;"></i></li>
                <ul class="subMenu">

                        <!-- Dropdown menu -->

                        <li><a href="contact.php">Fish</a></li>
                        <li><a href="contact.php">Meat</a></li>
                        <li><a href="contact.php">Vegan</a></li>
                        <li><a href="addFood.php">Add Food</a></li>
                        <li><a href="viewFood.php">View Food</a></li>
                    </ul>

                <!-- Link to the contact page -->

                <li><a href="contact.php">Contact</a></li>

                <!-- Link to the shopping cart with a shopping cart logo -->

                <li class ="cart"><a href="shoppingCart.php"><i class="fas fa-shopping-cart "></i> <span style="color: red;">
                    <?php 

                        if($allQuantityCart == 0){
                            echo 0;
                        }
                        else {
                            echo "$allQuantityCart";
                        }

                    ?>
                </span></a></li>
            </ul>
        </nav>


        <!-- Hamburger menu for a smaller screen and two other links which are displayed in the header section -->


        <nav class="hamNavigation">
            <div class="ham-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li class="logo"><a href="index.php">Home</a></li>
                <li class ="cart"><a href="shoppingCart.php"><i class="fas fa-shopping-cart "></i> <span style="color: red;">
                    <?php 

                         if($allQuantityCart == 0){
                            echo 0;
                        }
                        else {
                            echo "$allQuantityCart";
                        }
                        
                    ?>
                </span></a></li>
            </ul>
        </nav>

        <div class="off-screen-menu">
        <ul>
                <li><a href="index.php">Home</a></li>
                <li class="dropDownMenuOffScreen"><a href="menuAndDelivery.php"><p>Menu</p> <p>and</p> <p>Delivery</p></a><i class="fa-solid fa-chevron-down fa-sm dropDownArrowOffScreen" id="dropDownArrowOffScreen" style="color: #ffffff;"></i></li>
                <ul class="subMenuOffScreen">

                    <!-- Dropdown menu -->

                    <li><a href="contact.php">Fish</a></li>
                    <li><a href="contact.php">Meat</a></li>
                    <li><a href="contact.php">Vegan</a></li>
                </ul>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="addFood.php">Add Food</a></li>
                <li><a href="viewFood.php">View Food</a></li>
            </ul>
        </div>
    </header>