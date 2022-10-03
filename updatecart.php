<?php

require_once './config.php';

if (isset($_POST['submit'])) {
    // print_r($_POST);
    $user_id = $_POST['user_id'];
    foreach ($_POST as $key => $value) {
        if (str_contains($key, "num-product")) {
            $product_id =  (int)trim($key, "num-product");
            if ($value == 0) {
                $sql = "DELETE FROM cart WHERE product_id= $product_id AND user_id= $user_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            } else {

                $sql = "UPDATE cart SET quantity = $value WHERE product_id= $product_id AND user_id= $user_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }
        }
    }


    header("location: cart.php");
}
