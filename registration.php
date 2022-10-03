<!DOCTYPE html>
<html lang="en">

<?php
$pageName = "Register & Login";
require_once './layout/head.php';


?>






<body>

    <?php require_once './layout/header.php';
    require_once './layout/cartsidebar.php';
    ?>


    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">

                    <form id="loginForm">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Sign In
                        </h4>
                        <label for="email-login">Email:</label>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" id="email-login" placeholder="Your Email Address">
                            <small class="text-danger"></small>
                            <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                        </div>
                        <label for="password-login">Password:</label>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" id="password-login" placeholder="Your Password">
                            <small class="text-danger"></small>
                        </div>


                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
                        </button>
                    </form>
                </div>



                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form id="registrationForm">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Create An Account
                        </h4>
                        <label for="fname-registration">First Name:</label>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="fname" id="fname-registration" placeholder="Your First Name">
                            <small class="text-danger"></small>
                        </div>
                        <label for="lname-registration">Last Name:</label>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="lname" id="lname-registration" placeholder="Your Last Name">
                            <small class="text-danger"></small>
                        </div>
                        <label for="email-registration">Email:</label>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" id="email-registration" placeholder="Your Email Address">
                            <small class="text-danger"></small>
                        </div>
                        <label for="password-registration">Password:</label>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" id="password-registration" placeholder="Your Password">
                            <small class="text-danger"></small>
                        </div>
                        <label for="password-confirm-registration">Confirm Password:</label>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password-confirm" id="password-confirm-registration" placeholder="Your Password">
                            <small class="text-danger"></small>
                        </div>



                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
                        </button>
                    </form>


                </div>

            </div>
        </div>
    </section>


    <script src="./register/javascript/app.register.js"></script>
    <script src="./register/javascript/app.login.js"></script>



    <?php

    require_once './layout/footer.php';
    require_once './layout/scripts.php';

    ?>

</body>

</html>