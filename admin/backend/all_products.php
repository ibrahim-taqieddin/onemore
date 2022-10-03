<?php 
require_once "connection.php"
?>


<table id="example" class="table">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">category_id</th>
      <th scope="col">image</th>
      <th scope="col">Name</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
      <th scope="col">discount</th>
      <th scope="col">date added</th>

    </tr>
  </thead>

<?php

$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
$num= mysqli_num_rows($result);
$numberpages=10;
$totalpages=ceil($num/$numberpages);
if(isset($_GET['page'])){
    $page=$_GET['page'];
  }else{
    $page=1;
  }
  $firstpage=($page-1)*$numberpages;
  $sql = "SELECT * FROM `products` LIMIT $firstpage,$numberpages";
  $result = mysqli_query($conn, $sql);
  
  if ($result){

    while($row = mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $category_id=$row['category_id'];
        $image=$row['image'];      
        $name=$row['name'];
        $description=$row['description'];
        $price=$row['price'];
        $discount=$row['discount'];
        $date_added=$row['date_added'];


        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$category_id.'</td>
        <td> <img src=./img/'.$image.' style= width:75px; > </td>
        <td>'.$name.'</td>
        <td>'.$description.'</td>
        <td>'.$price.'</td>
        <td>'.$discount.'</td>
        <td>'.$date_added.'</td>


        <td>
        <a href="./EditProduct.php?id='.$id.'" class="btn btn-warning" >Edit</a>
        <a href="./backend/Delete_product.php?id='.$id.'" class="btn btn-danger" >Delete</a>


      </tr>';









}
  }

  ?>

</tbody>
</table>

<div class="pagenation" style="margin-left:225px ;">
<?php

for($btn=1;$btn<=$totalpages;$btn++){

echo '<a href="allproducts.php?page='.$btn.'" class="btn btn-light my-5 mx-1 " >'.$btn.'</a>';

}
?>
</div>