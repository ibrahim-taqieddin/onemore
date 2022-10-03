<?php

if (!isset($_SESSION)) {

    session_start();
}


$pageName = "profile";
require_once './config.php';
require_once './functions.php';


?>





<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>


    <?php


    if (isset($_SESSION["email"])) :
        $activeUser = getOneByEmail('users', $_SESSION["email"]);
        $user_id = $activeUser['id'];
        // $userOrders = getDataByUserid('orders', $user_id);
        $userCart = getCartDetails($user_id);
        // print_r($userCart);


    ?>


        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>


            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">

                    <?php for ($i = 0; $i < count($userCart) && $i < 3; $i++) : ?>
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="./admin/img/<?= $userCart[$i]['image']; ?>" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    <?= $userCart[$i]['name']; ?>
                                </a>

                                <span class="header-cart-item-info">
                                    <?= $userCart[$i]['quantity']; ?> x


                                    <?php if ($userCart[$i]['discount'] != 1) : ?>
                                        <span style="text-decoration:line-through"><?= $userCart[$i]['price']; ?> </span>
                                        <span>
                                            <?php
                                            $discount = $userCart[$i]['price'] * $userCart[$i]['discount'];
                                            $priceAfterDiscount = $userCart[$i]['price'] - $discount;
                                            echo $priceAfterDiscount;
                                            ?>

                                        </span>
                                    <?php else : ?>
                                        <?= $userCart[$i]['price']; ?>
                                    <?php endif; ?>




                                    JOD
                                </span>
                            </div>
                        </li>
                    <?php endfor; ?>

                </ul>

                <?php if (count($userCart) > 3) : ?>


                    <div class="w-full">
                        <div class="header-cart-total w-full p-tb-40 cl4">
                            You have <?= count($userCart) ?> items in your cart. Click view cart to view all items.
                        </div>
                    </div>


                <?php endif; ?>
                <div class="w-full">
                    <?php
                    $total = 0;
                    foreach ($userCart as $item) {
                        if ($item['discount'] != 1) {
                            $discount = $item['price'] * $item['discount'];
                            $priceAfterDiscount = $item['price'] - $discount;
                            $total += ($priceAfterDiscount * $item['quantity']);
                        } else {

                            $total += ($item['price'] * $item['quantity']);
                        }
                    }

                    ?>

                    <div class="header-cart-total w-full p-tb-40">
                        Total: <?= $total ?> JOD
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>

        <!-- Cart -->
        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: 0 JOD
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="./checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>


    <?php endif; ?>
</div>
</div>