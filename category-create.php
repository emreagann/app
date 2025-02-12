<?php
    require "libs/variables.php";
    require "libs/functions.php";

?>
<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>
<?php 
 session_start();

    $categoryErr = $category = "";
if ($_SERVER ["REQUEST_METHOD"]== "POST"){
    if(empty($_POST["category"])){
        $categoryErr = "category required space.";
    }
    else{
     $category = safe_html($_POST["category"]);
    }
   if(empty($categoryErr)){
          createCategory($category);
          $_SESSION["message"] ="Added category named as ".$category;
          $_SESSION["type"] = "success";
          header('Location:admin-categories.php');
   }
}
?>
    <div class="container my-3">

        <div class="row">
            <div class="col-12">
                    <div class="card card-body">
            <form action="category-create.php" method="post">
            <div class="mb-3">
                <label for="category">Category Name</label>
                <input type="text" name="category" class="form-control" value="<?php echo $category;?>">
                <div class="text-danger"><?php echo $categoryErr; ?></div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
            
    
            </div>
        </div>



    </div>

    <?php include "partials/footer.php";?>
