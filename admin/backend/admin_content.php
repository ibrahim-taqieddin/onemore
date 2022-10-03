<?php
require_once "backend/connection.php";
require_once "backend/functions.php";

?>

<div class="container-fluid px-4">
                        <h1 class="mt-1">Overview</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
</div>
<div class="container text-center">
    <div class="row">
        <div class="col">
            <div class="card border-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">

                                All Orders
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                Count_number_of_row_orders()

                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
                <!-- <button type="button" class="btn btn-outline-secondary">Secondary</button> -->

            </div>
        </div>
        <div class="col">
            <div class="card border-warning shadow h-100 py-2">
            <a href="Orders.php" class="text-decoration-none">  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-warning -800"><?php Count_number_of_pending_orders() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-warning -300"></i>
                        </div>
                    </div>
                </div></a> 
            </div>
        </div>



        <div class="col">
            <div class="card border-success  shadow h-100 py-2 ">
            <a href="Orders.php" class="text-decoration-none">  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Completed Orders</div>
                          <div class="h5 mb-0 font-weight-bold text-success -800"><?php Count_number_of_completed_orders() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-success -300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div></a>
    </div>
</div>

<div class="container text-center mt-3">
  <div class="row">
    <div class="col">
    <div class="card border-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">

                                All Orders
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                Count_number_of_row_orders()

                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
                <!-- <button type="button" class="btn btn-outline-secondary">Secondary</button> -->

            </div>
    </div>
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>
