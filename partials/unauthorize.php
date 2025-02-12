<?php
    require "libs/variables.php";
    require "libs/functions.php";

?>
<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>
<?php
if(!isLoggedIn()){
          header("Location: login.php");
}
?>
    <div class="container my-3">

        <div class="row">
            <div class="col-12">
           <h3>Hello,<?php echo $_SESSION["username"]?></h3>
           <p>You're reaching to unauthorized area</p>
            <div>
                    <a href="logout.php">Log Out</a>
            </div>
            </div>
        </div>



    </div>

    <?php include "partials/footer.php";?>