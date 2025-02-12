<?php
    require "libs/variables.php";
    require "libs/functions.php";

?>
<?php
session_start();
if(empty($_GET["id"])){
   header("Location:admin-courses.php");

}
$id = $_GET["id"];
$result = getCourseById($id);
$course = mysqli_fetch_assoc($result);
if($_SERVER["REQUEST_METHOD"] == "POST"){
   if(deleteCourse(($id))){
      $_SESSION["message"] = "Deleted course numerated as".$id;
      $_SESSION["type"] = "danger";
      header("Location:admin-courses.php");
      
      }
      else{
             echo "hata";
      }
}

?>
<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>

    <div class="container my-3">

        <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body"></div>
               </div>
           <form method="POST">
            <b><?php echo $course["baslik"]?></b> do you wanna remove this course?
               <button type="submit" class="btn btn-danger">Delete</button>
           </form>

    
            </div>
        </div>



    </div>

    <?php include "partials/footer.php";?>

