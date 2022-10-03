
                
                <?php 

include "layout\head.php";
include "layout\header.php"



?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php
require_once "backend/connection.php";
require_once "backend/functions.php";

?>

<div class="container-fluid px-4">
                        <h1 class="mt-1">Edit Product </h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
</div>


<?php 

include "./backend/Edit_products.php"

?>
                    <!-- Page Heading -->

                </div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->

            <?php 

include "layout/footer.php"



?>