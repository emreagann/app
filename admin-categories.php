<?php
    require "libs/variables.php";
    require "libs/functions.php";
    if(!isAdmin()){
        header("Location: unauthorize.php");
    }
?>
<?php include "partials/message.php";?>
<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>

    <div class="container my-3">

    <div class="row">
            <div class="col-12">
                    <div class="border p-2 mb-2">
                              <a href="category-create.php" class="btn btn-primary">Add Category</a>
                    </div>
                    <table class="table table-bordered">
                              <thead>
                                        <tr>
                                                  <th style="width: 50px;">Id</th>
                                                  <th>Kategori Adı</th>
                                                  <th style ="width:130px;"></th>
                                        </tr>
                              </thead>
                    </table>
                    <><?php $sonuc = getCatergories();
                    while($category = mysqli_fetch_assoc($sonuc)):
                    ?>
                    <tr>
                              <td><?php echo $category["id"] ?></td>
                              <td><?php echo $category["kategori_adi"] ?></td>
                              <td><a href="category-edit.php?id=<?php echo $category["id"]?>" class="btn btn-primary btn-sm">Edit</a>
                              <td><a href="category-delete.php?id=<?php echo $category["id"]?>" class="btn btn-primary btn-sm">Delete</a>

                    </td>

                    </tr>
                    <?php endwhile ?>
                    </tbody>
            </div>
        </div>

    </div>

    <?php include "partials/footer.php";?>
