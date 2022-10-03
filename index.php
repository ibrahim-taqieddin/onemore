<?php
require_once './config.php';
require_once './functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php
$pageName = "index";
require_once './layout/head.php';
?>

<body class="animsition">

    <!-- Header -->
    <?php require_once './layout/header.php' ?>




    <?php require_once './layout/cartsidebar.php'; ?>


    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1 rs1-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(images/slide-03.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 cl2 respon2">
                                    Men Collection 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                    New arrivals
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-202 cl2 respon2">
                                    Men New-Season
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/slide-04.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-202 cl2 respon2">
                                    Women Collection 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                    NEW SEASON
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="sec-banner bg0">
        <div class="flex-w flex-c-m">
            <?php

            // $sql = "select * from categories";
            // $query = $conn->prepare($sql);
            // $query->execute();
            // $categories = $query->fetchAll(PDO::FETCH_OBJ);
            $categories = getAllData("categories");

            ?>
            <?php foreach ($categories as $category) : ?>
                <div class="size-202 m-lr-auto respon4">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="./admin/img/<?= $category['image'] ?>" style="width:100%; height:400px" alt="IMG-BANNER">

                        <a href="./product.php?categoryid=<?= $category['id'] ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    <?= $category['name'] ?>
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Newest Arrivals
                </h3>
            </div>
            <?php

            $sql = "SELECT * FROM products ORDER BY UNIX_TIMESTAMP(date_added) DESC LIMIT 8";
            $stmt = $conn->prepare($sql);

            // Execute the prepared statement
            $stmt->execute();
            $newProducts = $stmt->fetchAll();

            // print_r($newProducts);

            ?>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        <?php foreach ($newProducts as $newProduct) : ?>
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->

                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="./admin/img/<?php echo $newProduct['image']; ?>" alt="IMG-PRODUCT">

                                        <a href="product-detail.php?productid=<?php echo $newProduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                            View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.php?productid=<?php echo $newProduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                <?php echo $newProduct['name']; ?>
                                            </a>


                                            <?php if ($newProduct['discount'] != 1) : ?>
                                                <span style="text-decoration:line-through"><?php echo $newProduct['price'] ?> JOD</span>
                                                <span class="stext-105 cl3">
                                                    <?php
                                                    $discount = $newProduct['price'] * $newProduct['discount'];
                                                    $priceAfterDiscount = $newProduct['price'] - $discount;
                                                    echo $priceAfterDiscount . " JOD"
                                                    ?>
                                                </span>
                                            <?php else : ?>
                                                <span><?php echo $newProduct['price'] ?> JOD</span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <!-- <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a> -->
                                            new
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>



            </div>
        </div>
    </section>






    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Sale Products
                </h3>
            </div>


            <!-- Tab01 -->
            <div class="tab01">
                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        <?php
                        $SaleProducts = getAllData("products");


                        foreach ($SaleProducts as $SaleProduct) :
                        ?>
                            <?php if ($SaleProduct['discount'] != 1) : ?>
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <!-- Block2 -->

                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="./admin/img/<?php echo $SaleProduct['image']; ?>" alt="IMG-PRODUCT">

                                            <a href="product-detail.php?productid=<?php echo $SaleProduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                                View
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="product-detail.php?productid=<?php echo $SaleProduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    <?php echo $SaleProduct['name']; ?>
                                                </a>


                                                <?php if ($SaleProduct['discount'] != 1) : ?>
                                                    <span style="text-decoration:line-through"><?php echo $SaleProduct['price'] ?> JOD</span>
                                                    <span class="stext-105 cl3">
                                                        <?php
                                                        $discount = $SaleProduct['price'] * $SaleProduct['discount'];
                                                        $priceAfterDiscount = $SaleProduct['price'] - $discount;
                                                        echo $priceAfterDiscount . " JOD"
                                                        ?>
                                                    </span>
                                                <?php else : ?>
                                                    <span><?php echo $SaleProduct['price'] ?> JOD</span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>



            </div>
        </div>
    </section>




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