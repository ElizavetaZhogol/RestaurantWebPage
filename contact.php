<?php include 'connect.php'; ?>

<?php require("sendMail.php"); ?>

<?php require("config.php"); ?>

<?php

    if(isset($_POST['submit'])){

        // Check if all fields are filed and send the message

        if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])){

            $response = "All fields are required";

        }
        else{

            $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);

        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
    <link rel="stylesheet" href="styleContact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- Header section -->

    <?php include('header.php') ?>

    <main>

        <!-- The map with the location of the restaurant  -->

        <section class="howToFind">
            <h2 class="delHeader">How can you find us</h2>
            <map name="restaurantLocation">

                <!-- Link to the map with address -->

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.5402901807117!2d24.937794477075524!3d60.18834107504166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469209874401d469%3A0x5992a2a22448083a!2sLinnanm%C3%A4ki!5e0!3m2!1sfi!2sru!4v1718836654024!5m2!1sfi!2sru" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </map>
            <section class="findWritten">
                <h2>How can you find us</h2>

                <!-- Section that contains address of the restaurant media links, phone and email address -->

                <section class="adressAndMedia">
                    <address class="restaurantAddress">

                        <!-- Address written -->

                        <p><i class="fa-solid fa-location-dot" style="color: #000000;"></i> <span>Adress: xxxxx</span></p>
                    </address>
                    <address class="media">
                        <ul class="mediaLogo">

                            <!-- Link to restaurant Instagram -->

                            <li class="insta"><a href="#"><i class="fa-brands fa-instagram fa-3x" style="color: #000000;"></i></a></li>

                            <!-- Link to the faceebook page -->

                            <li class="facebook"><a href="#"><i class="fa-brands fa-facebook fa-3x" style="color: #000000;"></i></a></li>
                        </ul>
                    </address>

                    <!-- Section with phone number and email address -->

                    <address class="phoneAndMail">
                        <a href="tel:0000000000"><i class="fa-solid fa-phone" style="color: #000000;"></i> <span>00000000<br></span></a>
                        <a href="mailto:recipient@example.com"><i class="fa-solid fa-envelope" style="color: #000000;"></i> <span>rest@gmail.com</span></a>
                    </address>
                </section>
            </section>
        </section>

        <!-- Contact form where people can ask questions via email -->

        <h2>Contact us</h2>

        <section class="contactContainer">
            <form method="post" action="" enctype="multipart/form-data">
                <div>
                    <label for="name">Name</label>
                    <br>
                    <input type="text" name="name" id="name" required placeholder="Enter your name...">
                </div>

                <br>

                <div>
                    <label for="email">Email</label>
                    <br>
                    <input type="text" name="email" id="email" required placeholder="Enter your email address...">
                </div>

                <br>

                <div>
                    <label for="subject">Subject</label>
                    <br>
                    <input type="text" name="subject" id="subject" required placeholder="Enter letter subject...">
                </div>

                <br>

                <div class="messageContainer">
                    <label for="message">Message</label>
                    <br>
                    <textarea name="message" id="message" placeholder="Enter a message..."></textarea>
                </div>

                <br>

                <div class="formButtons">
                    <button>Clear</button>
                    <button type="submit" name="submit">Send message</button>
                </div>
            </form>

            <script>
                // Get the clear button
                const clearButton = document.querySelector('.formButtons button:first-child');

                // Add an event listener to the clear button
                clearButton.addEventListener('click', (e) => {
                // Prevent the default form submission behavior
                e.preventDefault();

                // Get all the form fields
                const nameField = document.getElementById('name');
                const emailField = document.getElementById('email');
                const subjectField = document.getElementById('subject');
                const messageField = document.getElementById('message');

                // Clear the fields
                nameField.value = '';
                emailField.value = '';
                subjectField.value = '';
                messageField.value = '';
                });
            </script>
            
        </section>
    </main>

        <!-- The footer section of the website  -->

        <?php include('footer.php') ?>

        <script src="script.js" defer></script>

</body>
</html>