<!DOCTYPE html>
<html lang="en">
<?php
$pageName = "product";
require_once './layout/head.php';
require_once 'config.php';
require_once 'functions.php';
$categories = getAllData("categories");

$products = getAllData('products');



?>

<body class="animsition">

	<?php require_once './layout/header.php'; ?>

	<?php require_once './layout/cartsidebar.php'; ?>


	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<?php if (isset($_GET['categoryid'])) : ?>
						<?php $categoryid = $_GET['categoryid'];
						// $productbycategory = filterBySelectedCategory('products', 'categories', $categoryid);
						$productbycategory = getDataByForeignKey('products',  $categoryid);
						// print_r($productbycategory);
						// die;
						?>

						<a href="./product.php?categoryid=all" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($categoryid == 'all') echo 'how-active1' ?>" data-filter="*">
							All Products
						</a>

						<?php foreach ($categories as $category) : ?>

							<a href="./product.php?categoryid=<?php echo $category['id'] ?>" name="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($categoryid == $category['id']) echo 'how-active1' ?>">
								<?= $category["name"] ?>
							</a>

						<?php endforeach; ?>
					<?php else : ?>
						<a href="./product.php?categoryid=all" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 ?>" data-filter="*">
							All Products
						</a>

						<?php foreach ($categories as $category) : ?>

							<a href="./product.php?categoryid=<?php echo $category['id'] ?>" name="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 ">
								<?= $category["name"] ?>
							</a>

						<?php endforeach; ?>
					<?php endif; ?>

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form action="" method="post">
						<div class="bor8 dis-flex p-l-15">
							<button type="submit" name="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
						</div>
					</form>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter p-l-250  w-50 p-t-10">
					<div class="wrap-filter flex-w bg6 w-full  p-lr-40 p-t-27 p-lr-15-sm" style="margin-left: 600px !important;">

						<div class="filter-col p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<?php if (isset($_GET['lowprice'])) : ?>
								<?php $lowprice = $_GET['lowprice'];



								if (isset($_GET['topprice'])) {
									$topprice = $_GET['topprice'];
									$sql = "SELECT * FROM products WHERE price >= $lowprice AND price <= $topprice";
								} else {
									$sql = "SELECT * FROM products WHERE price >= $lowprice ";
								}
								$stmt = $conn->prepare($sql);
								$stmt->execute();

								$filterPrice = $stmt->fetchAll();
								?>



								<ul>

									<li class="p-b-6">
										<a href="./product.php?lowprice=0" class="filter-link stext-106 trans-04 ">
											All
										</a>
									</li>



									<li class="p-b-6">
										<a href="./product.php?topprice=50&lowprice=0.1" class="filter-link stext-106 trans-04  <?php if ($lowprice == 0.1) echo 'filter-link-active' ?>">
											0.00 - 50.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=100&lowprice=50" class="filter-link stext-106 trans-04 <?php if ($lowprice == 50) echo 'filter-link-active' ?>">
											50.00 - 100.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=150&lowprice=100" class="filter-link stext-106 trans-04 <?php if ($lowprice == 100) echo 'filter-link-active' ?>">
											100.00 - 150.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=200&lowprice=150" class="filter-link stext-106 trans-04 <?php if ($lowprice == 150) echo 'filter-link-active' ?>">
											150.00 - 200.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?lowprice=200" class="filter-link stext-106 trans-04 <?php if ($lowprice == 200) echo 'filter-link-active' ?>">
											200.00+ JOD
										</a>
									</li>

								</ul>

							<?php else : ?>
								<ul>

									<li class="p-b-6">
										<a href="./product.php?lowprice=0" class="filter-link stext-106 trans-04  filter-link-active">
											All
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=50&lowprice=0.1" class="filter-link stext-106 trans-04  ">
											0.00 - 50.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?topprice=100&lowprice=50" class="filter-link stext-106 trans-04 ">
											50.00 - 100.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?topprice=150&lowprice=100" class="filter-link stext-106 trans-04 ">
											100.00 - 150.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?topprice=200&lowprice=150" class="filter-link stext-106 trans-04 ">
											150.00 - 200.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?lowprice=200" class="filter-link stext-106 trans-04 ">
											200.00+ JOD
										</a>
									</li>

								</ul>

							<?php endif; ?>
						</div>



					</div>
				</div>
			</div>


			<div class="row isotope-grid">

				<?php if (isset($filterPrice)) :  ?>
					<?php if (isset($_POST['submit'])) : ?>
						<?php $searchName = $_POST['search-product']; ?>
						<?php foreach ($filterPrice as $filterproduct) : ?>
							<?php if ($searchName == $filterproduct['name']) : ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="./admin/img/<?php echo $filterproduct['image'] ?>" alt="IMG-PRODUCT">

											<a href="./product-detail.php?productid=<?php echo $filterproduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
												View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="./product-detail.php?productid=<?php echo $filterproduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $filterproduct['name'] ?>
												</a>
												<?php if ($filterproduct['discount'] != 1) : ?>
													<span style="text-decoration:line-through"><?php echo $filterproduct['price'] ?> JOD</span>
													<span class="stext-105 cl3">
														<?php
														$discount = $filterproduct['price'] * $filterproduct['discount'];
														$priceAfterDiscount = $filterproduct['price'] - $discount;
														echo $priceAfterDiscount . " JOD"
														?>
													</span>
												<?php else : ?>
													<span><?php echo $filterproduct['price'] ?> JOD</span>
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
								<?php echo "<script>
								if ( window.history.replaceState ) {
									window.history.replaceState( null, null, window.location.href );
								}
							</script>" ?>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else : ?>
						<?php foreach ($filterPrice as $filterproduct) : ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="./admin/img/<?php echo $filterproduct['image'] ?>" alt="IMG-PRODUCT">

										<a href="./product-detail.php?productid=<?php echo $filterproduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="./product-detail.php?productid=<?php echo $filterproduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $filterproduct['name'] ?>
											</a>
											<?php if ($filterproduct['discount'] != 1) : ?>
												<span style="text-decoration:line-through"><?php echo $filterproduct['price'] ?> JOD</span>
												<span class="stext-105 cl3">
													<?php
													$discount = $filterproduct['price'] * $filterproduct['discount'];
													$priceAfterDiscount = $filterproduct['price'] - $discount;
													echo $priceAfterDiscount . " JOD"
													?>
												</span>
											<?php else : ?>
												<span><?php echo $filterproduct['price'] ?> JOD</span>
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
						<?php endforeach ?>
					<?php endif ?>
				<?php elseif (isset($categoryid) && $categoryid != 'all') : ?>
					<?php if (isset($_POST['submit'])) : ?>
						<?php $searchName = $_POST['search-product']; ?>
						<?php foreach ($productbycategory as $catproduct) : ?>
							<?php if ($searchName == $catproduct['name']) : ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="./admin/img/<?php echo $catproduct['image'] ?>" alt="IMG-PRODUCT">

											<a href="./product-detail.php?productid=<?php echo $catproduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
												View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="./product-detail.php?productid=<?php echo $catproduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $catproduct['name'] ?>
												</a>
												<?php if ($catproduct['discount'] != 1) : ?>
													<span style="text-decoration:line-through"><?php echo $catproduct['price'] ?> JOD</span>
													<span class="stext-105 cl3">
														<?php
														$discount = $catproduct['price'] * $catproduct['discount'];
														$priceAfterDiscount = $catproduct['price'] - $discount;
														echo $priceAfterDiscount . " JOD"
														?>
													</span>
												<?php else : ?>
													<span><?php echo $catproduct['price'] ?> JOD</span>
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
								<?php echo "<script>
								if ( window.history.replaceState ) {
									window.history.replaceState( null, null, window.location.href );
								}
							</script>" ?>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else : ?>
						<?php foreach ($productbycategory as $catproduct) : ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="./admin/img/<?php echo $catproduct['image'] ?>" alt="IMG-PRODUCT">

										<a href="./product-detail.php?productid=<?php echo $catproduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="./product-detail.php?productid=<?php echo $catproduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $catproduct['name'] ?>
											</a>
											<?php if ($catproduct['discount'] != 1) : ?>
												<span style="text-decoration:line-through"><?php echo $catproduct['price'] ?> JOD</span>
												<span class="stext-105 cl3">
													<?php
													$discount = $catproduct['price'] * $catproduct['discount'];
													$priceAfterDiscount = $catproduct['price'] - $discount;
													echo $priceAfterDiscount . " JOD"
													?>
												</span>
											<?php else : ?>
												<span><?php echo $catproduct['price'] ?> JOD</span>
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
						<?php endforeach; ?>
					<?php endif; ?>
				<?php else : ?>
					<?php foreach ($products as $product) : ?>
						<?php if (isset($_POST['submit'])) : ?>
							<?php $searchName = $_POST['search-product']; ?>
							<?php if ($searchName == $product['name']) : ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="./admin/img/<?php echo $product['image'] ?>" alt="IMG-PRODUCT">

											<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
												View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $product['name'] ?>
												</a>
												<?php if ($product['discount'] != 1) : ?>
													<span style="text-decoration:line-through"><?php echo $product['price'] ?> JOD</span>
													<span class="stext-105 cl3">
														<?php
														$discount = $product['price'] * $product['discount'];
														$priceAfterDiscount = $product['price'] - $discount;
														echo $priceAfterDiscount . " JOD"
														?>
													</span>
												<?php else : ?>
													<span><?php echo $product['price'] ?> JOD</span>
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
								<?php echo "<script>
								if ( window.history.replaceState ) {
									window.history.replaceState( null, null, window.location.href );
								}
							</script>" ?>
							<?php endif; ?>
						<?php else : ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="./admin/img/<?php echo $product['image'] ?>" alt="IMG-PRODUCT">

										<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $product['name'] ?>
											</a>
											<?php if ($product['discount'] != 1) : ?>
												<span style="text-decoration:line-through"><?php echo $product['price'] ?> JOD</span>
												<span class="stext-105 cl3">
													<?php
													$discount = $product['price'] * $product['discount'];
													$priceAfterDiscount = $product['price'] - $discount;
													echo $priceAfterDiscount . " JOD"
													?>
												</span>
											<?php else : ?>
												<span><?php echo $product['price'] ?> JOD</span>
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

						<?php endif ?>
					<?php endforeach; ?>
				<?php endif; ?>

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