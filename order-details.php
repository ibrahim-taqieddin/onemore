<?php
session_start();
$pageName = "Order Details";
require_once './config.php';
require_once './functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<?php require_once './layout/head.php'; ?>

<body class="animsition">

    <?php require_once './layout/header.php'; ?>

    <?php require_once './layout/cartsidebar.php'; ?>


    <?php


    if ($_SESSION["email"]) {
        $activeUser = getOneByEmail('users', $_SESSION["email"]);
    } else {
        echo "<script>window.location =  './index.php'</script>";
    }

    $user_id = $activeUser['id'];
    // $userOrders = getDataByUserid('orders', $user_id);
    // $userBills = getDataByUserid('bill', $user_id);
    // print_r($userBills);
    // print_r($_GET);
    $billId = $_GET['bill_id'];
    $billNum = $_GET['bill_num'];

    $orderDetails = getBillDetails($billId);
    // print_r($orderDetails);


    ?>



    <!-- <section class="sec-product bg0 p-t-10 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1"><?php //echo $activeUser["f_name"] . " " . $activeUser['l_name'] 
                                                                ?></h3>
                <h5 class="mtext-105 cl5 txt-center respon1"><?php //echo $activeUser["email"] 
                                                                ?></h5>
            </div>
        </div>
    </section> -->


    <!-- breadcrumb -->
    <div class="container m-b-40">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="profile.php" class="stext-109 cl8 hov-cl1 trans-04">
                Profile
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                <?= $billNum ?>
            </span>
        </div>
    </div>
    <section class="sec-product bg0 p-t-10 p-b-50">
        <div class="container">
            <div class="p-b-32 p-l-25">
                <h3 class="mtext-105 cl5  respon1">Details for Order Number: <?= $billNum ?></h3>
                <h3 class="stext-105 cl5  respon1"> <b>Billed for:</b> <?= $orderDetails[0]['f_name'] . " " . $orderDetails[0]['l_name'] ?> <b>Email:</b> <?= $orderDetails[0]['email'] ?> <b>Phone:</b> <?= $orderDetails[0]['phone'] ?> <b>Billing Address:</b> <?= $orderDetails[0]['address'] ?> <b>Total Price:</b> <?= $orderDetails[0]['total_price'] ?> JOD</h3>
                <h3 class="stext-105 cl5  respon1"></h3>
                <h3 class="stext-105 cl5  respon1"></h3>
                <h3 class="stext-105 cl5  respon1"></h3>
                <h3 class="stext-105 cl5  respon1"></h3>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table">
                        <table class="table">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2">Product image</th>

                                <th class="column-3">Price</th>
                                <th class="column-4">Status</th>

                            </tr>
                            <?php foreach ($orderDetails as $order) :
                            ?>
                                <tr class="table_row">

                                    <td class="column-1">
                                        <?= $order['name'] ?>
                                    </td>
                                    <td class="column-2">
                                        <div class="how-itemcart1">
                                            <img src="./admin/img/<?= $order['image'] ?>" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-3">
                                        <?php if ($order['discount'] != 1) : ?>
                                            <span class="stext-105 cl4" style="text-decoration:line-through"><?= $order['price'] ?> </span>
                                            <span class="stext-105 cl2">
                                                <?php
                                                $discount = $order['price'] * $order['discount'];
                                                $priceAfterDiscount = $order['price'] - $discount;
                                                echo $priceAfterDiscount . " JOD"
                                                ?>
                                            </span>
                                        <?php else : ?>
                                            <span><?= $order['price'] ?> JOD</span>
                                        <?php endif; ?>


                                    </td>
                                    <td class="column-4"><?= $order['status'] ?></td>

                                </tr>
                            <?php endforeach;
                            ?>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>




    <!-- Footer -->
    <?php require_once './layout/footer.php'; ?>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <?php require_once './layout/scripts.php'; ?>



</body>

</html>