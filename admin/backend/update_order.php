<?php
require_once 'PDOConnection.php';
$id = $_GET['id'];
if (isset($_POST['update'])) {
    // Get the userid

    // Posted Values  
    
    // $user_id = $_POST['user_id'];
    // $product_id = $_POST['product_id'];
    // $bill_id = $_POST['bill_id'];
    // $fname = $_POST['f_name'];
    // $lname = $_POST['l_name'];
    // $Email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $address = $_POST['address'];
    $status = $_POST['status'];
    
   

    // Query for Query for Updation
    $sql = "UPDATE orders set status=:st where id='$id'";
    //Prepare Query for Execution
    $query = $conn->prepare($sql);
    // Bind the parameters
    // $query->bindParam(':uid', $user_id, PDO::PARAM_STR);
    // $query->bindParam(':pid', $product_id, PDO::PARAM_STR);
    // $query->bindParam(':bid', $bill_id, PDO::PARAM_STR);
    // $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    // $query->bindParam(':ln', $lname, PDO::PARAM_STR);
    // $query->bindParam(':em', $Email, PDO::PARAM_STR);
    // $query->bindParam(':ph', $phone, PDO::PARAM_STR);
    // $query->bindParam(':ad', $address, PDO::PARAM_STR);
    $query->bindParam(':st', $status, PDO::PARAM_STR);

    
    // Query Execution
    $query->execute();
    // Mesage after updation
    echo "<script>alert('Record Updated successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='Orders.php'</script>";
}
?>



    <div class="container">

        <div class="row">
            <div class="col-md-12">
            
            </div>
        </div>

        <?php
        // Get the userid
        $userid = $_GET['id'];
        $sql = "SELECT * from orders where id=:uid";
        //Prepare the query:
        $query = $conn->prepare($sql);
        //Bind the parameters
        $query->bindParam(':uid', $userid, PDO::PARAM_STR);
        //Execute the query:
        $query->execute();
        //Assign the data which you pulled from the database (in the preceding step) to a variable.
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        //In case that the query returned at least one record, we can echo the records within a foreach loop:
            // print_r($results);
        foreach ($results as $result) {

        ?>

        <form name="insertrecord" method="post">
            <div class="row">
                <div class="col-md-4"><b>status</b>
                    <select name="status" class="form-control" id="status"
                        value="<?php echo htmlentities($result->status); ?>">
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                    </select>
                </div>
            </div>

            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="update" value="Update" style="width:100%">
                </div>
            </div>

        </form>
        <?php } ?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- textaddneww -->
        <ins class="adsbygoogle" style="display:inline-block;width:728px;height:15px"
            data-ad-client="ca-pub-8906663933481361" data-ad-slot="3318815534"></ins>
    </div>
    </div>