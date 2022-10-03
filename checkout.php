<?php
if (!isset($_SESSION)) {

    session_start();
}
$pageName = "Checkout";


require_once './config.php';
require_once './functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once './layout/head.php'; ?>


<body class="animsition">

    <?php require_once './layout/header.php'; ?>


    <?php require_once './layout/cartsidebar.php'; ?>


    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <a href="cart.php" class="stext-109 cl8 hov-cl1 trans-04">
                Cart
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Checkout
            </span>
        </div>
    </div>

    <?php


    if ($_SESSION["email"]) {
        $activeUser = getOneByEmail('users', $_SESSION["email"]);
    } else {
        echo "<script>window.location =  './registration.php'</script>";
    }

    $user_id = $activeUser['id'];
    // $userOrders = getDataByUserid('orders', $user_id);
    $userCart = getCartDetails($user_id);
    // print_r($userCart);


    ?>


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
    <div class="container p-b-50 p-t-100">
        <div class="row">
            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <form id="billingForm" method="post" action="./placeorder.php">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Billing information
                    </h4>
                    <input type="hidden" value="<?= $total ?>" name="total">
                    <label for="fname-billing">First Name:</label>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="<?= $activeUser['f_name'] ?>" type="text" name="fname" id="fname-billing" placeholder="Your First Name" required pattern="^[A-Za-z]*">

                    </div>
                    <label for="lname-billing">Last Name:</label>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="<?= $activeUser['l_name'] ?>" type="text" name="lname" id="lname-billing" placeholder="Your Last Name" required pattern="^[A-Za-z]*">

                    </div>
                    <label for="email-billing">Email:</label>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" value="<?= $activeUser['email'] ?>" type="text" name="email" id="email-billing" placeholder="Your Email Address" required>

                    </div>
                    <label for="phone-billing">Phone:</label>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="tel" name="phone" id="phone-billing" placeholder="Your Phone" required>

                    </div>
                    <label for="address-confirm-billing">Address:</label>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" id="address-confirm-billing" placeholder="Your address" required>

                    </div>



                    <button type="submit" name="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Place Order
                    </button>
                </form>
            </div>


            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>
                    <div>
                        <ul>
                            <?php foreach ($userCart as $item) : ?>

                                <li>
                                    <?= $item['name'] ?>


                                    <?php if ($item['discount'] != 1) : ?>
                                        <span style="text-decoration:line-through"><?= $item['price']; ?> </span>
                                        <span>
                                            <?php
                                            $discount = $item['price'] * $item['discount'];
                                            $priceAfterDiscount = $item['price'] - $discount;
                                            echo $priceAfterDiscount;
                                            ?>

                                        </span>
                                    <?php else : ?>
                                        <?= $item['price']; ?>
                                    <?php endif; ?>




                                    JOD X <?= $item['quantity']  ?>

                                </li>
                                <br>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                <?= $total ?> JOD
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Payment Method:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                Cash On Delivery
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php require_once './layout/footer.php' ?>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>