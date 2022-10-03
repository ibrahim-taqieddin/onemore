<?php
require_once "connection.php";

$id = $_GET['id'];
$query = "DELETE FROM `categories` WHERE `id` = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location:../AddCategories.php");
} else {
    echo "Error deleting record";
}





?>

