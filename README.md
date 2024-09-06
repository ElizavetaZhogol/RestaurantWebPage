Restaurant webpage project

1.	Index.php

Header section
The header section contains the navigation menu, logo, and shopping cart icon. The navigation menu is a list that contains links to different pages like the home page, menu page, and contact page. The shopping cart is a font awesome icon, and the quantity of items in the cart is fetched from a database using php.
Main section
The main section contains several sections that provide information about the restaurant. These sections include:
(About restaurant) This section provides a brief description of the restaurant (history/values).
(Our team) This section displays a carousel of team members with their names, roles and photos. The carousel is controlled using JavaScript, which allows users to see different slides using arrow buttons.
The JavaScript code is used to control the carousel of team members. It selects the carousel element and the arrow buttons, and defines two functions to show the next and previous slides.
(Map)This section displays a Google Maps iframe that shows the location of the restaurant.

2.	menuAndDelivery.php

PHP code
connect.php establishes a connection to a database using MySQLi.
(Add to cart function) The code checks if a form has been submitted with a addtoCart button. If so, it retrieves the item information (name, description, price, image) and checks if the item already exists in the cart table. If not, it inserts the item into the cart table with a quantity of 1. If the item already exists, it updates the quantity by 1.
(Delete from Cart) The code checks if a form has been submitted with a deleteFromCart button. If so, it retrieves the item information (name, description, price, image) and checks if the item exists in the cart table. If so, it updates the quantity by -1. If the quantity reaches 0, it deletes the item from the cart table.
Main section
(Carousel) A carousel of menu items that can be navigated using arrow buttons. Arrows in the cards can navigate users to different menu sections by id.
(Menu items) A list of menu items that can be added to the cart. Each menu item includes an image, name, description, price, and quantity input field.
3.	contact.php

Php code
sendMail.php file sends an email using the sendMail function.
config.php file contains configuration settings for the website.
The code checks if a form has been submitted with a submit button. If so, it checks if all fields are filled and sends the message using the sendMail function.
Main section
(Map) A map with the location of the restaurant.
(How to find us) A section that provides information about how to find the restaurant, including an address, phone number, email address, and social media links.
(Contact form) A form that allows users to send a message to the restaurant.
JavaScript Code
The JavaScript code is used to clear the contact form fields when the "Clear" button is clicked.

4.	sendMail.php

This PHP code is used to configure and send an email using the PHPMailer library.
(Function definition) The code defines a sendMail function that sends an email using PHPMailer.
(SMTP configuration) The code sets the SMTP configuration, including the host, username, password, encryption, and port.
The code sets the sender's email address and name, as well as the recipient's email address, sets the email subject, body, and alternative body.

5.	config.php

The code checks if a form has been submitted.
The code retrieves the form data including the name, email, message, and subject.
The code defines several constants that will be used to send the email using PHPMailer.
(MAILHOST) The SMTP host, set to "smtp.gmail.com".
(USERNAME) The SMTP username, set to "Set user(recipient email address)". Should be set to the restaurant email.
(PASSWORD) The SMTP password, which should be replaced with a valid Gmail app password.
(SEND_FROM) The sender's email address, set to the email address from the form.
(SEND_FROM_NAME) The sender's name, set to the name from the form.
(REPLY_TO) The reply-to email address, set to the email address from the form.
(REPLY_TO_NAME) The reply-to name, set to the name from the form.
(MESSAGE) The email body, set to the message from the form.
(SUBJECT) The email subject, set to the subject from the form.
6.	shoppingCart.php

This PHP code is used to manage a shopping cart system, including adding items to the cart, updating quantities, removing items, and displaying the cart contents.
(Update quantity) The code updates the quantity of a specific item in the cart when the updateQuantityButton is submitted.
(Add to cart) The code adds a new item to the cart when the addtoCart button is submitted.
(Remove item) The code removes a specific item from the cart when the remove parameter is set. The code includes a remove button for each item in the cart.
(Delete all items) The code deletes all items from the cart when the deleteAll parameter is set.
(Display cart table content) The code displays the contents of the cart, including the item name, image, description, price, quantity, and total price.
(Grand total) The code calculates the grand total of all items in the cart.
(Action options) The code displays a bottom section with action options, including a link to continue shopping, a link to proceed to checkout, and a grand total display.

7.	checkout.php

This PHP code is used to manage a checkout system, including sending an order email and clearing the cart.
(Send order) The code sends an email with the order details when the sendOrder button is submitted.
(Clear cart) The code clears the cart when the order is sent successfully.
(Form)The code includes a form to collect the delivery address information, including name, email, phone number, and address.
sendOrder.php
The code uses the sendMail function from the sendOrder.php file to send an email with the order details. The email is sent to the provided email address.

8.	addFood.php

This PHP code is used for adding food items to different tables. 
(Add food to salad table) The code adds a new food item to the salad table when the addSalad button is submitted.
(Add food to pizza table) The code adds a new food item to the pizza table when the addPizza button is submitted.
The code uploads an image file to the foodImages folder when a new food item is added.
The code displays a success or error message when a new food item is added.

9.	viewFood.php

This PHP code is used to display and manage food items.
(Display food) The code displays all food items in the salad and pizza tables using a table format.
(Fetch data) The code fetches data from the database using a while loop and displays each food item in a table row.
(Actions) The code includes action buttons for deleting and editing each food item.
(Delete button) The delete button redirects to delete.php with a delete parameter set to the food item's ID.
(Edit button) The edit button redirects to update.php with an editSalad or editPizza parameter set to the food item's ID.

10.	update.php

This PHP code is used to update food items.
(Update query) The code updates food items in the salad and pizza tables using a mysqli_query function.
(Edit form) The code displays a form for editing food items, including fields for name, description, price, and image.
(Image upload) The code allows users to upload a new image for the food item.


Tables were created manually in the phpMyAdmin server. The code is universal for all the tables that can be added to the website. Basically, I used different name for submit buttons to trigger different functions relevant to a specific table.

