<!-- Delete items from table -->

<?php include 'connect.php';

    if(isset($_GET['delete'])){
        $deleteId = $_GET['delete'];
        $deleteQuery = mysqli_query($conn, "Delete from `salad` where id=$deleteId") or die("Delete failed");

        if($deleteQuery){
            echo "Delete successfull";
            header('location: viewFood.php');
        }
        else {
            echo "Delete failed again";
            header('location: viewFood.php');
        }
    }

?>