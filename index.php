<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About the restaurant</title>
 
    <link rel="stylesheet" href="style.css">

    <style>
        <?php include "style.css" ?>
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
</head>
<body>
    <!-- The header of the website  -->
    <header>  

          <!-- Code to display the quantity of items in the shopping cart in the header section -->

        <?php include('connect.php');

            $selectCartNumber = mysqli_query($conn, "Select sum(quantity) as total from `cart`") or die('query failed');
            $fetchQuantityCart = mysqli_fetch_assoc($selectCartNumber);
            $allQuantityCart = $fetchQuantityCart['total'];

    ?>

        <!-- Navigation for the website in the header section -->
        <nav class="mainNavigation">
            <ul>
                <li class="logo"><a href="index.php">Home</a></li>
                <li><a href="index.php">Home</a></li>
                <li class="dropDownMenu"><a href="menuAndDelivery.php"><p>Menu</p> <p>and</p> <p>Delivery</p></a><i class="fa-solid fa-chevron-down fa-sm dropDownArrow" id="dropDownArrow" style="color: #ffffff;"></i></li>

                    <!-- Dropdown menu with more options -->

                    <ul class="subMenu">
                        <li><a href="contact.php">Fish</a></li>
                        <li><a href="contact.php">Meat</a></li>
                        <li><a href="contact.php">Vegan</a></li>
                    </ul>
                <li><a href="contact.php">Contact</a></li>
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

        <!-- Off screen menu that appears when the hammenu is clicked -->

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


        <!-- The background picture under the header with the opening info -->
        <section class="openingHours">
            <h1>Restaurant name</h1>
            <h3>Opening hours</h3>
             <h5>We are open:</h5> 
             <p>Mon – Sat 17:00 – 00:00</p>
             <h5>We are closed:</h5>
             <p>Sunday</p>
        </section>
    </header>

    <!-- The main part of the home page -->

    <main>
        <!-- The text description of the restaurant, plus the image -->
        <section class="aboutRestaurant">
                <section class="restaurantDescription">
                    <h2>About our restaurant</h2>
                    <p>What wo cook</p>
                    <p>Our history</p>
                    <p>What we would like people to know</p>

                    <!-- A button that will transport a visitor of the website to the menu page -->

                    <a href="menuAndDelivery.php"><button type="button" class="seeMenu">See the menu</button></a>
                </section> 
            
                <figure>
                    <img class="aboutImage" src="ImagesForRestaurant/restaurantInfoPhoto.webp" alt="restaurantInfoPhoto" style="width: 500px; height: 600px;"/>
                </figure>
        </section>

        <!-- A section where the visitor of the webpage can learn about the restaurant’s team -->

        <section class="ourTeam">
            <section class="ourTeamText">
                <h2>Our Team</h2>
                <p>
                    Some text Some text Some text Some text<br>
                    Some text Some text Some text Some text
                </p>
            </section>

            <!-- A slider with the team members -->

           <section class="wrapper">

                <!-- Arrow to scroll left -->

                <i id="leftArrow" class="fa-solid fa-circle-chevron-left fa-3x slideButton" style="color: #000000;"></i>

                <!-- Carousel that contains cards with team cards -->

                <ul class="carousel">
                    <li class="card card1">
                        <figure>
                            <img src="ImagesForRestaurant/secondWorker.webp" alt="restaurantWorker" style="width: 165px; height: 240px;"/>
                        </figure> 
                        <h4>Executive Chef</h4>
                        <h6>AAAAAAAAAAaAA</h6>
                        <p>Skills text</p>
                        <p>Experience text</p> 
                    </li>

                    <li class="card card2">
                        <figure>
                            <img src="ImagesForRestaurant/secondWorker.webp" alt="restaurantWorker" style="width: 165px; height: 240px;"/>
                        </figure> 
                        <h4>Executive Chef</h4>
                        <h6>BBBBBBBBBBBB<br></h6>
                        <p>Skills text<br></p>
                        <p>Experience text</p> 
                    </li>

                    <li class="card card3">
                        <figure>
                            <img src="ImagesForRestaurant/secondWorker.webp" alt="restaurantWorker" style="width: 165px; height: 240px;"/>
                        </figure> 
                        <h4>Executive Chef</h4>
                        <h6>CCCCCCCCCCCCCC</h6>
                        <p>Skills text</p>
                        <p>Experience text</p> 
                    </li>

                    <li class="card card4">
                        <figure>
                            <img src="ImagesForRestaurant/secondWorker.webp" alt="restaurantWorker" style="width: 165px; height: 240px;"/>
                        </figure> 
                        <h4>Executive Chef</h4>
                        <h6>DDDDDDDDDDDD</h6>
                        <p>Skills text</p>
                        <p>Experience text</p> 
                    </li>

                    <li class="card card5">
                        <figure>
                            <img src="ImagesForRestaurant/secondWorker.webp" alt="restaurantWorker" style="width: 165px; height: 240px;"/>
                        </figure> 
                        <h4>Executive Chef</h4>
                        <h6>EEEEEEEEEEEEE</h6>
                        <p>Skills text</p>
                        <p>Experience text</p> 
                    </li>

                    <li class="card card6">
                        <figure>
                            <img src="ImagesForRestaurant/secondWorker.webp" alt="restaurantWorker" style="width: 165px; height: 240px;"/>
                        </figure> 
                        <h4>Executive Chef</h4>
                        <h6>FFFFFFFFFFFFF</h6>
                        <p>Skills text</p>
                        <p>Experience text</p> 
                    </li>
                </ul>
                <i id="rightArrow" class="fa-solid fa-circle-chevron-right fa-3x slideButton" style="color: #000000;"></i>
            </section>

            <script>

                // Get the carousel and the arrow buttons
                const carousel = document.querySelector('.carousel');
                const leftArrow = document.getElementById('leftArrow');
                const rightArrow = document.getElementById('rightArrow');

                // Set the initial slide index
                let slideIndex = 0;

                // Set the number of slides
                const numSlides = carousel.children.length;

                // Function to show the next slide
                function showNextSlide() {
                // Hide the current slide
                carousel.children[slideIndex].style.display = 'none';

                // Increment the slide index
                slideIndex = (slideIndex + 1) % numSlides;

                // Show the next slide
                carousel.children[slideIndex].style.display = 'block';
                }

                // Function to show the previous slide
                function showPrevSlide() {
                // Hide the current slide
                carousel.children[slideIndex].style.display = 'none';

                // Decrement the slide index
                slideIndex = (slideIndex - 1 + numSlides) % numSlides;

                // Show the previous slide
                carousel.children[slideIndex].style.display = 'block';
                }

                // Add event listeners to the arrow buttons
                leftArrow.addEventListener('click', showPrevSlide);
                rightArrow.addEventListener('click', showNextSlide);

                // Show the first slide
                carousel.children[0].style.display = 'block';
            </script>


        </section>

        <!-- The map with a location of the restaurant -->

        <section class="mapContainer">
            <map name="restaurantLocation">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.5402901807117!2d24.937794477075524!3d60.18834107504166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469209874401d469%3A0x5992a2a22448083a!2sLinnanm%C3%A4ki!5e0!3m2!1sfi!2sru!4v1718836654024!5m2!1sfi!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </map>
        </section>

    </main>
    
    <!-- The footer section of the website  -->
    
    <?php include('footer.php') ?>

    <script src="script.js" defer></script>

</body>
</html>