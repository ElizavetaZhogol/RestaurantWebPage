
<?php include 'connect.php'; ?>

<?php require("sendOrder.php"); ?>

<?php require("configCheckout.php"); ?>


<?php

    if(isset($_POST['sendOrder'])){

        $response = sendMail($email, $subject, $message);

    if($response == "Success"){
        echo "<script>alert('Email sent successfully!');</script>";

        // Clear cart when the order is sent

        mysqli_query($conn, "Delete from `cart`");
        header('location:index.php');

    }
    else{
        echo "<script>alert('Email not sent. Please try again!');</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- Header section -->

    <?php include('header.php') ?>

    <!-- Form that needs to be filled to place an order -->

    <main>

        <form method="post" action="" enctype="multipart/form-data">

            <h2>Please, provide us with the delivery address information</h2>

            <div>
                <label for="name">Name</label>
                <br>
                <input type="text" name="name" id="name" required placeholder="Enter your name...">
            </div>

            <br>

            <div>
                <label for="email">Email</label>
                <br>
                <input type="text" name="email" id="email" placeholder="Enter your email address...">
            </div>

            <br>

            <div>
                <label for="phone">Enter your phone number:*</label>
                <br>
                <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number...">
            </div>

            <br>

            <div class="messageContainer">
                <label for="address">Address</label>
                <br>
                <textarea name="address" id="address" placeholder="Enter your address..."></textarea>
            </div>

            <br>

            <div class="formButtons">
                <button type="submit">Clear</button>
                <button type="submit" name="sendOrder">Send order</button>
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
                const phoneField = document.getElementById('phone');
                const addressField = document.getElementById('address');

                // Clear the fields
                nameField.value = '';
                emailField.value = '';
                phoneField.value = '';
                addressField.value = '';
                });
            </script>

    </main>

<!-- The footer section of the website  -->

<?php include('footer.php') ?>

<script src="script.js" defer></script>