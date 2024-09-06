<!-- php connection to database -->

<?php include 'connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestaurantName</title>
    <link rel="stylesheet" href="styleMenu.css">
    <link rel="stylesheet" href="viewFood.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- The navigation of the website for the header section -->

    <?php include('header.php') ?>

    <main>

        <h2>Edit Salad</h2>

        <section class="displayFood">

                <!-- php code to display all items in the table -->

                    <?php

                        $displayFood = mysqli_query($conn, "Select * from `salad`");
                        $num = 1;
                        
                        if(mysqli_num_rows($displayFood)>0){

                            // display table header if there is data in the table

                            echo"<table>
                                    <thead>
                                        <th>Sl No</th>
                                        <th>Food image</th>
                                        <th>Food name</th>
                                        <th>Food description</th>
                                        <th>Foodprice</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>";
                            // fetch data

                            while($row=mysqli_fetch_assoc($displayFood)){
                                $foodId = $row['id'];
                                $foodName = $row['name'];
                                $foodDescription = $row['description'];
                                $foodPrice = $row['price'];
                                $foodImage = $row['image']
                    ?>

                    <!-- display table -->

                                <tr>
                                    <td><?php echo $num ?></td>
                                    <td><img src="foodImages/<?php echo $foodImage ?>" alt="<?php echo $foodName ?>" style="width: 200px; height: 200px;"></td>
                                    <td><?php echo $foodName ?></td>
                                    <td><?php echo $foodDescription ?></td>
                                    <td><?php echo $foodPrice ?></td>
                                    <td>
                                        <a href="delete.php?delete=<?php echo $foodId ?>" class="deleteTrash" onclick = "return confirm('Are you sure you want to delte this item?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="update.php?editSalad=<?php echo $foodId ?>" class="editIcon"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                    <?php
                        $num++;
                            }
                        }
                        else {
                            echo "<h2>No food available</h2>";
                        }

                    ?>
                
                </tbody>
            </table>
        </section>

        <h2>Edit Pizza</h2>

        <section class="displayFood">

                <!-- php code to display all items in the table -->

                    <?php

                        $displayFood = mysqli_query($conn, "Select * from `pizza`");
                        $num = 1;
                        
                        if(mysqli_num_rows($displayFood)>0){

                            // display table header if there is data in the table

                            echo"<table>
                                    <thead>
                                        <th>Sl No</th>
                                        <th>Food image</th>
                                        <th>Food name</th>
                                        <th>Food description</th>
                                        <th>Foodprice</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>";
                            // fetch data

                            while($row=mysqli_fetch_assoc($displayFood)){
                                $foodId = $row['id'];
                                $foodName = $row['name'];
                                $foodDescription = $row['description'];
                                $foodPrice = $row['price'];
                                $foodImage = $row['image']
                    ?>

                    <!-- display table -->

                                <tr>
                                    <td><?php echo $num ?></td>
                                    <td><img src="foodImages/<?php echo $foodImage ?>" alt="<?php echo $foodName ?>" style="width: 200px; height: 200px;"></td>
                                    <td><?php echo $foodName ?></td>
                                    <td><?php echo $foodDescription ?></td>
                                    <td><?php echo $foodPrice ?></td>
                                    <td>
                                        <a href="delete.php?delete=<?php echo $foodId ?>" class="deleteTrash" onclick = "return confirm('Are you sure you want to delte this item?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="update.php?editPizza=<?php echo $foodId ?>" class="editIcon"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                    <?php
                        $num++;
                            }
                        }
                        else {
                            echo "<h2>No food available</h2>";
                        }

                    ?>
                
                </tbody>
            </table>
        </section>

    </main>

    <?php include('footer.php') ?>

    <script src="script.js" defer></script>
    
</body>
</html>