<?php

require_once './config.php';
require_once './functions.php';
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["email"]) {
    $activeUser = getOneByEmail('users', $_SESSION["email"]);
} else {
    echo "<script>window.location =  './index.php'</script>";
}

$user_id = $activeUser['id'];
$userOrders = getDataByUserid('orders', $user_id);
$userCart = getCartDetails($user_id);

if (isset($_POST['submit'])) {
    // print_r($_POST);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $total = $_POST["total"];
    $invoiceNum = (int)strtok((string)date(microtime(20)), ".");

    $sql = "INSERT INTO bill (user_id, total_price,bill_number)
      VALUES ($user_id, $total,$invoiceNum)";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    $lastId = $conn->lastInsertId();

    foreach ($userCart as $cart) {
        $product_id = $cart["product_id"];
        $sql = "INSERT into orders (user_id, product_id, bill_id,f_name,l_name,email,phone,address) values (:user_id,:product_id,:bill_id,:f_name,:l_name,:email,:phone,:address)";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute([
            ":user_id" => $user_id,
            ":product_id" => $product_id,
            ":bill_id" => $lastId,
            ":f_name" => $fname,
            "l_name" => $lname,
            ":email" => $email,
            ":phone" => $phone,
            ":address" => $address
        ]);
    }


    $sql = "DELETE FROM  cart where user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute([
        ":user_id" => $user_id
    ]);

    // header("location : ./product.php");
    echo "<script>window.location = './product.php'</script>";
}
