<?php
include "connection.php";

$id = $_GET['id'];
$query = "DELETE FROM `products` WHERE `id` = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location:../AllProducts.php");
} else {
    echo "Error deleting record";
}





?>