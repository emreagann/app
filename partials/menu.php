<?php
if(isset($_GET["categoryid"])&& is_numeric($_GET["categoryid"])){
    $selectedCategory = $_GET["categoryid"]; 
}
?>
<div class="list-group">
    <a href="courses.php" class="list-group-item list-group-item-action">Tüm Kurslar</a>
<?php 
$sonuc = getCatergories();
while($kategori = mysqli_fetch_assoc($sonuc))
?>

    <a 
        href="<?php echo "courses.php?categoryid=".$kategori["id"]?>" 
        class="list-group-item list-group-item-action
        <?php
if($kategori["id"] == $selectedCategory){
    echo "active";
}
        ?>
        ">
        <?php echo $kategoriler[$i]["kategori_adi"]; ?>
    </a>

<?php endwhile; ?>
</div>
