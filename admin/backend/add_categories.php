<?php 
require_once "connection.php";
include_once "functions.php";

?>



<?php add_category(); ?>


<div class="container">
  <div class="row">
    <div class="col">
    <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="category-title">Title</label>
        <input name="name" type="text" class="form-control" style="width:75% ;">
    </div>
<div><br></div>
    <div class="form-group">
    <label for="Category image">Category Image</label>
    <input type="file" name="file">
  
</div>

<div><br></div>


    <div class="form-group">
        
        <input name="submit" type="submit" class="btn btn-primary" value="Add Category">
    </div>      
</form>
</div>

    <div class="col">
    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
       <?php show_categories_in_admin(); ?>
    </tbody>

        </table>    </div>
  </div>


