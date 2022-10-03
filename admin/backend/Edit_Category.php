<?php
require_once "connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `categories` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$image = $row['image'];


if(isset($_POST ['update'])){
    $name = $_POST['name'];
    $image = ($_FILES['file']['name']);

    $sql = " UPDATE `categories` SET `Name` = '$name', `image` = '$image'  WHERE `categories`.`id` = $id ";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:../AddCategories.php");
    }else{
        echo "Data not inserted";
    }



}





?>

<h1 class="page-header">
   Edit Category
</h1>
<div class="container">
  <div class="row">
    <div class="col">
    <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="category-title">Title</label>
        <input name="name" type="text" class="form-control" style="width:75% ;"  value="<?php echo $name; ?>">
    </div>
<div><br></div>

<label>Image Preview </label><br>
	<img src=".\img\<?php echo $image;?>" height="100"><br>
	<label>Change Image </label>
    <div class="form-group">
    <label for="Category image">Category Image</label>
    <input type="file" name="file">
  
</div>

<div><br></div>


    <div class="form-group">
        
        <input name="update" type="submit" class="btn btn-primary" value="Add Category">
    </div>      
</form>
</div>