<?php

    if(isset($_POST["submit"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $subject = $_POST["subject"];


        // Define Gmail's smtp server

        define('MAILHOST', "smtp.gmail.com");

        // Define a username

        define('USERNAME', "SET USER(RECIPIENT) EMAIL ADDRESS");

        // Define Gmail app-password

        define('PASSWORD', "PUT PASSWORD HERE");

        // Define Gmail address from which the email is sent

        define('SEND_FROM', "$email");

        // Define the name of the website from which the email is sent

        define('SEND_FROM_NAME', "$name");

        // Define the reply-to address as the info from the form

        define('REPLY_TO', "$email");

        // Define reply-to name as the info from the form

        define('REPLY_TO_NAME', "$name");

        // Define the message content as the info from the form

        define('MESSAGE', "$message");

        // Define the subject as the info from the form

        define('SUBJECT', "$subject");



    }





?>