<?php

    if(isset($_POST["sendOrder"])){

        // Get information from the form

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $selectCartItems = mysqli_query($conn, "Select * from `cart`");

        // Compose a mail body/message with a necessary data

        ob_start();
        $text = "Customer Information:<br>";
        $text .= "Name: $name, Email: $email, Phone: $phone, Address: $address<br><br>";
        $text .= "Order Details:<br>";

        // Get order from cart table

        while ($fetchCartItems = mysqli_fetch_assoc($selectCartItems)) {
            $dishName = $fetchCartItems['name'];
            $price = $fetchCartItems['price'];
            $quantity = $fetchCartItems['quantity'];

            $text .= "Name: $dishName, Price: $price, Quantity: $quantity<br>";

            $grandTotal += ($fetchCartItems['price'] * $fetchCartItems['quantity']);
        }

        // Get total price

        $text .= "Total price: $grandTotal";

        $message = $text;
        ob_end_clean();

        // Define Gmail's smtp server

        define('MAILHOST', "smtp.gmail.com");

        // Define a username

        define('USERNAME', "elizaveta.practiceweb@gmail.com");

        // Define Gmail app-password

        define('PASSWORD', "PUT PASSSWORD HERE");

        // Define Gmail address from which the email is sent

        define('SEND_FROM', "$email");

        // Define the name of the website from which the email is sent

        define('SEND_FROM_NAME', "$name");

        // Define the reply-to address 

        define('REPLY_TO', "$email");

        // Define reply-to name

        define('REPLY_TO_NAME', "$name");

        // Define the content of the message

        define('MESSAGE', "$message");

    }





?>