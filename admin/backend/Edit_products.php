<?php
require_once "connection.php";
include_once "functions.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `products` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$image = $row['image'];
$category_id=$row['category_id'];
$description=$row['description'];
$price=$row['price'];
$discount=$row['discount'];
$date_added=$row['date_added'];



if(isset($_POST ['update'])){
    $name           = ($_POST['name']);
    $price          = ($_POST['price']);
    $category_id    = ($_POST['category_id']);
    $description    = ($_POST['description']);
    $discount        = ($_POST['discount']);
    $image = ($_FILES['file']['name']);
    $sql = " UPDATE `products` SET `name` = '$name', `price` = '$price' , `category_id` = '$category_id' , `description` = '$description', `discount` = '$discount',`image` = '$image'
     WHERE `products`.`id` = $id ";
    $result = mysqli_query($conn, $sql);
    if($result){
echo ("<script>location.href='allproducts.php'</script>");


    }else{
        echo "Data not inserted";
    }

}





?>

               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-6">

<div class="col-xs-3">
    <label for="product-title">Product Name </label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" >
    </div>


    <div class="col-xs-3">
           <label for="product-title">Product Description</label>

      <textarea  name="description" id="" cols="30" rows="10" class="form-control"><?php echo $description; ?></textarea>
    </div>




      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="price" class="form-control" size="60" value="<?php echo $price; ?>" >
      </div>

      <div class="col-xs-3">
        <label for="product-discount">Product Discount</label>
        <input type="text" name="discount" class="form-control" value="<?php echo $discount; ?>" >
      </div>

      <div class="col-xs-3">
         <label for="name">Product Category</label>

         <?php 
         $categories = show_categories_add_product_page(); 
     
         ?>

        <select name="category_id" id="" class="form-control" >
            <?php foreach($categories as $category): ?>
            
            <option value="<?php echo $category['id'] ?>"
            <?php
            if($category_id == $category['id']): ?> 
              selected <?php endif;?> ><?php echo $category['name'] ?></option>
            <?php endforeach;?>
           
        </select>
    </div>

<div><br></div>

    <!-- Product Image -->
    <label>Image Preview </label><br>
	<img src=".\img\<?php echo $image;?>" height="100"><br>
	<label>Change Image </label>
    <div class="form-group">
    <label for="Product image">Product Image</label>
    <input type="file" name="file">


</div>
     
     <div class="col-xs-3">
       <!-- <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft"> -->
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>
    
</form>


</div>

</div>
