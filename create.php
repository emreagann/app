<?php
    require "libs/variables.php";
    require "libs/functions.php";

?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
$title = $_POST["title"];
$subtitle = $_POST["subtitle"];
$image = $_POST["image"];
$dateAdded = $_POST["dateAdded"];
kursEkle($title,$subtitle,$image,$dateAdded);
header("Location:index.php");
}
?>
<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>

    <div class="container my-3">

        <div class="row">
            <div class="col-12">
            <form action="index.php" method="post">
               <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
               </div>
               <div class="mb-3">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control">
               </div>
               <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image" class="form-control">
               </div>
               <div class="mb-3">
                    <label for="dateAdded">AddedDate</label>
                    <input type="text" name="dateAdded" id="dateAdded" class="form-control">
               </div>
               <button type="sumbit" class="btn btn-primary">Save</button>
            </form>

    
            </div>
        </div>



    </div>

    <?php include "partials/footer.php";?>