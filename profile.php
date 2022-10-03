<?php
session_start();
$pageName = "profile";
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
    $userBills = getDataByUserid('bill', $user_id);
    // print_r($userBills);






    ?>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-color: black;">
        <h2 class="mtext-105 cl0 txt-center">
            <?php echo $activeUser["f_name"] . " " . $activeUser['l_name'] ?>
            <br>
            <?php echo $activeUser["email"] ?>
        </h2>
        <?php if ($activeUser['role'] == 'admin') : ?>
            <a href="./admin/index.php">
                Go To Dashboard
            </a>
        <?php endif ?>
    </section>
    <!-- <section class="sec-product bg0 p-t-10 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1"></h3>
                <h5 class="mtext-105 cl5 txt-center respon1"></h5>
            </div>
        </div>
    </section> -->
    <section class="sec-product bg0 p-t-10 p-b-50">
        <div class="container">
            <div class="p-t-32">
                <h3 class="mtext-105 cl5 txt-center respon1">Order History</h3>
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
                                <th class="column-1">Bill Number</th>

                                <th class="column-2">Date Ordered</th>
                                <th class="column-3">Total Price</th>
                                <th class="column-4">Order Details</th>
                            </tr>
                            <?php foreach ($userBills as $bill) : ?>
                                <tr class="table_row">

                                    <td class="column-1">
                                        <?= $bill['bill_number'] ?>
                                    </td>
                                    <td class="column-2"><?= $bill['date_ordered'] ?></td>
                                    <td class="column-3"><?= $bill['total_price'] ?> JOD </td>
                                    <td class="column-4 ">
                                        <a href="./order-details.php?bill_id=<?= $bill['id'] ?>&bill_num=<?= $bill['bill_number'] ?>">
                                            View
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

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