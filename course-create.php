<?php
    require "libs/variables.php";
    require "libs/functions.php";

?>
<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>
<?php 

    $baslikErr = $baslik = "";
    $altBaslikErr = $altBaslik = "";
    $resimErr = $resim = "";
    $aciklamaErr = $aciklama = "";
if ($_SERVER ["REQUEST_METHOD"]== "POST"){
    if(empty($_POST["baslik"])){
        $baslikErr = "title required space.";
    }
    else{
     $baslik = safe_html($_POST["baslik"]);
    }
    if(empty($_POST["altBaslik"])){
        $altBaslikErr = "subtitle required space.";
    }
    else{
     $altBaslik = safe_html($_POST["altBaslik"]);
    }
    if(empty($_POST["aciklama"])){
        $aciklamaErr = "description required space.";
    }
    else{
     $aciklama = safe_html($_POST["aciklama"]);
    }
    if(empty($_FILES["imageFile"]["name"])){
        $resimErr = "image required space.";
    }
    else{
        uploadImage($_FILES["imageFile"]);
        $resim = $_FILES["imageFile"]["name"];
    }
   if(empty($baslikErr) && empty($altBaslikErr) && empty($resimErr)){
          createCourse($baslik,$altBaslik,$resim,$aciklama);
          $_SESSION["message"] ="Added course named as ".$course;
          $_SESSION["type"] = "success";
          header('Location:admin-courses.php');
   }
}
?>
    <div class="container my-3">

        <div class="row">
            <div class="col-12">
                    <div class="card card-body">
            <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $baslik;?>">
                <div class="text-danger"><?php echo $baslikErr; ?></div>
                <div class="mb-3">
                <label for="subtitle">Subtitle</label>
                <input name="subtitle" class="form-control" ></input>
                <input type="text" name="title"  value="<?php echo $altBaslik;?>">
                <div class="text-danger"><?php echo $altBaslikErr; ?></div>
                <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" ></textarea>
                <input type="text" name="title"  value="<?php echo $aciklama;?>">
                <div class="text-danger"><?php echo $aciklamaErr; ?></div>
            </div>
            <div class="input group mb-3">
                <input type="file" name="imageFile" id="imageFile" class="form-control">
                <label for="image-file" class="input-group-text"></label>
            </div>
            <div class="text-danger"><?php echo $resimErr ?></div>
          
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
            
    
            </div>
        </div>



    </div>
    <?php include "partials/editor.php";?>
    <?php include "partials/footer.php";?>