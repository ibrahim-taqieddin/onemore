<?php
function query($sql) {

    global $connection;
    
    return mysqli_query($connection, $sql);
    
    
    }
    

function add_product() {

 include "connection.php";

if(isset($_POST['publish'])) {


$name           = ($_POST['name']);
$price          = ($_POST['price']);
$category_id    = ($_POST['category_id']);
$description    = ($_POST['description']);
$image          = ($_FILES['file']['name']);
$image_temp_location = ($_FILES['file']['tmp_name']);
$folder = 'img/';
$target = "img/".basename($image);
move_uploaded_file($image_temp_location , $folder.$image);




$sql = ("INSERT INTO products(`name` , `price`, `description` , `category_id`,`image`) 

VALUES('$name','$price', '$description','$category_id','$image')");

$result = mysqli_query($conn, $sql);
if($result){


    echo ("<script>location.href='allproducts.php'</script>");

}else{
    echo "Data not inserted";
}


        }


}

function show_categories_add_product_page(){

    include "connection.php";


$sql = ("SELECT * FROM categories");
$categories = mysqli_query($conn, $sql);
$results =  mysqli_fetch_all($categories,MYSQLI_ASSOC);
// print_r($results);
return $results;
// die;


?>

    <!-- <?php
    //foreach ($categories as $category) {
    ?>
        <option value="<?php //echo $category['id'] ?>"><?php //echo $category['name'] ?></option>
    <?php //} ?>
</select> -->
</div>

<?php } ?>


<?php 

function add_category() {

    global $conn;

    if(isset($_POST['submit'])) {

    $name =($_POST['name']);
    $image = ($_FILES['file']['name']);
    $image_temp_location = ($_FILES['file']['tmp_name']);
    $folder = 'img/';
    $target = "img/".basename($image);
    move_uploaded_file($image_temp_location , $folder.$image);
        
    $sql = ("INSERT INTO categories (`name` , `image`)
     VALUES('$name' , '$image' )");
    $result = mysqli_query($conn, $sql);
    if($result){
        // header('Location: .\AddCategories.php');
    }else{
        echo "Data not inserted";
    }
        
    
        }
    
    
    }



    function show_categories_in_admin() {

        global $conn ;

        $sql = ("SELECT * FROM categories");
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
        
        $id = $row['id'];
        $name = $row['name'];
        $image =$row['image'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td> <img src=img/'.$image.' style= width:50px; hieght:50px; > </td>
       <td> 
       <a href="EditCategory.php?id='.$id.'" class="btn btn-warning" >Edit</a>
       <a href="./backend/Delete_Category.php?id='.$id.'" class="btn btn-danger" >Delete</a></tr>';

        
            }
        
        
        
        }
        
        function Count_number_of_row_orders () {
            global $conn ;

        $sql = ("SELECT * FROM orders");
        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );  
            echo $rowcount  ;    
        }
    }


    function Count_number_of_completed_orders () {
        global $conn ;

    $sql = ("SELECT * FROM orders WHERE status= 'pending'");
    if ($result = mysqli_query($conn, $sql)) {

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );  
        echo $rowcount  ;    
    }
}


function Count_number_of_Pending_orders () {
    global $conn ;

$sql = ("SELECT * FROM orders WHERE status= 'completed'");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}