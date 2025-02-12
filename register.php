<?php
    require "libs/variables.php";
    require "libs/functions.php";
    include "libs/ayar.php";
?>
<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>
<?php 
    $usernameErr = $emailErr = $passwordErr = $repasswordErr = "";
    $username = $email = $password = $repassword = "";
if ($_SERVER ["REQUEST_METHOD"]== "POST"){
    if(empty($_POST["username"])){
        $usernameErr = "username required space.";
    }
    elseif(strlen($_POST["username"] < 5 or strlen($_POST["username"])) > 20 ){
        $usernameErr = "username should be between 5-20 characters ";

    }
    else if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["username"])){
        $usernameErr = "username only includes digit,letter and underline characters.";
    }
    else{
        $sql = "SELECT id from kullanicilar WHERE username=?";
        if($stmt = mysqli_prepare($baglanti,$sql)){
          $param_username = trim($_POST["username"]);
          mysqli_stmt_bind_param($stmt,"s",$param_password);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) > 0 ){
              $usernameErr = "Username is taken";
            }
            else{
                $username = safe_html($_POST["username"]);
            }
        else{
                echo mysqli_error($baglanti);
                echo "hata oluştu";
        }
          }
        }
     $email = safe_html($_POST["email"]);
    }
    if(empty($_POST["email"])){
        $emailErr = "email required space.";
    }
    else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
     $emailErr = "email is invalid";
    }
    else{
        $sql = "SELECT id from kullanicilar WHERE email=?";
        if($stmt = mysqli_prepare($baglanti,$sql)){
          $param_email = trim($_POST["email"]);
          mysqli_stmt_bind_param($stmt,"s",$param_email);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) > 0 ){
              $emailErr = "email name is taken";
            }
            else{
                $email = safe_html($_POST["email"]);
            }
        else{
                echo mysqli_error($baglanti);
                echo "hata oluştu";
        }
          }
    }
    if(empty($_POST["password"])){
        $passwordErr = "password required space.";
    }
    else{
     $password = safe_html($_POST["password"]);
    }
    if($_POST["password"] != $_POST["repassword"]){
        $repasswordErr = "Password repeating space are not matching.";
    }
    else{
     $repassword = safe_html($_POST["repassword"]);
    }
    if(empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($repasswordErr)  ){
        
        $sql = "INSERT INTO kullanicilar(username,email,password) VALUES(?,?,?)";
        if($stmt = mysqli_prepare($baglanti,$sql)){
         $param_username = $username;
         $param_email = $email;
         $param_password = password_hash($password,PASSWORD_DEFAULT);
         mysqli_stmt_bind_param($stmt,"sss",$param_username,$param_username,$param_email,$param_password);
         if(mysqli_stmt_execute($stmt)){
            header("Location: login.php");
         }
         else{
            echo mysqli_error($baglanti);
            echo "<br>";
            echo "hata oluştu";
         }
        }

    }
echo $username;
}
?>
    <div class="container my-3">

        <div class="row">
            <div class="col-12">
            <form action="register.php" method="post" novalidate>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                <div class="text-danger"><?php echo $usernameErr; ?></div>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                <div class="text-danger"><?php echo $emailErr; ?></div>

            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password;?>">
                <div class="text-danger"><?php echo $passwordErr; ?></div>

            </div>
            <div class="mb-3">
                <label for="repassword">Password Again</label>
                <input type="password" name="repassword" class="form-control">
                <div class="text-danger"><?php echo $repasswordErr; ?></div>

            </div>
            </form>
             <button type="submit" class="btn btn-primary">Sign Up</button>
    
            </div>
        </div>



    </div>

    <?php include "partials/footer.php";?>
