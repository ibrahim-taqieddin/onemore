<?php
require_once 'PDOConnection.php';

if (isset($_POST['update'])) {
    // Get the userid
    $userid = $_GET['id'];
    // Posted Values  
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $role = $_POST['role'];
    
   

    // Query for Query for Updation
    $sql = "UPDATE users set f_name=:fn,l_name=:ln,email=:em,password=:pas,role=:ro where id='$userid'";
    //Prepare Query for Execution
    $query = $conn->prepare($sql);
    // Bind the parameters
    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':ln', $lname, PDO::PARAM_STR);
    $query->bindParam(':em', $Email, PDO::PARAM_STR);
    $query->bindParam(':pas', $Password, PDO::PARAM_STR);
    $query->bindParam(':ro', $role, PDO::PARAM_STR);

    
    // Query Execution
    $query->execute();
    // Mesage after updation
    echo "<script>alert('Record Updated successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='allusers.php'</script>";
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
        $sql = "SELECT * from users where id=:uid";
        //Prepare the query:
        $query = $conn->prepare($sql);
        //Bind the parameters
        $query->bindParam(':uid', $userid, PDO::PARAM_STR);
        //Execute the query:
        $query->execute();
        //Assign the data which you pulled from the database (in the preceding step) to a variable.
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        //In case that the query returned at least one record, we can echo the records within a foreach loop:
        foreach ($results as $result) {

        ?>

        <form name="insertrecord" method="post">
            <div class="row">
                <div class="col-md-4"><b>First Name</b>
                    <input type="text" name="f_name" value="<?php echo htmlentities($result->f_name); ?>"
                        class="form-control" required>
                </div>
                <div class="col-md-4"><b>Last Name</b>
                    <input type="text" name="l_name" class="form-control"
                        value="<?php echo htmlentities($result->l_name); ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Email</b>
                    <input type="email" name="email" class="form-control"
                        value="<?php echo htmlentities($result->email); ?>" required>
                </div>


                <div class="col-md-4"><b>Password</b>
                    <input type="text" name="password" class="form-control"
                        value="<?php echo htmlentities($result->password); ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"><b>role</b>
                    <select name="role" class="form-control" id="role"
                        value="<?php echo htmlentities($result->role); ?>">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
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
